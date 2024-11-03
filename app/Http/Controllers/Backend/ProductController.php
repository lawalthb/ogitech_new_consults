<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\MultiImg;
use App\Models\Brand;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Stock;
use App\Models\User;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function AllProduct()
    {
        $term = $_GET['term'] ?? 'Second';
        $products = Product::with('vendor')->where('term', $term)->latest()->get();
        //  dd($products);
        return view('backend.product.product_all', compact('products'));
    } // End Method


    public function AddProduct()
    {
        $activeVendor = User::where('status', 'active')->where('role', 'vendor')->orderBy('name', 'ASC')->get();
        $brands = Brand::latest()->get();
        $categories = Category::orderBy('category_name', 'ASC')->get();
        @$last_product_code = Product::latest()->first()->id;


        return view('backend.product.product_add', compact('brands', 'categories', 'activeVendor', 'last_product_code'));
    } // End Method



    public function StoreProduct(Request $request)
    {

        $request->validate([
            'term' => 'required|in:First,Second',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'product_name' => 'required|string|max:255',
            'product_code' => 'required|unique:products,product_code',
            'product_qty' => 'required|integer|min:1',
            'product_tags' => 'nullable|string|max:255',
            'product_size' => 'nullable|string|max:255',
            'product_color' => 'nullable|string|max:255',
            'selling_price' => 'required|numeric|min:0',
            'purchase_price' => 'required|numeric|min:0',
            'short_descp' => 'nullable|string',
            'unit' => 'required|string|max:50',
            'hot_deals' => 'nullable|boolean',
            'featured' => 'nullable|boolean',
            'special_offer' => 'nullable|boolean',
            'special_deals' => 'nullable|boolean',
            'product_thambnail' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'vendor_id' => 'nullable|exists:vendors,id',
        ]);


        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(800, 800)->save('upload/products/thambnail/' . $name_gen);
        $save_url = 'upload/products/thambnail/' . $name_gen;

        $product_id = Product::insertGetId([

            'term' => $request->term,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),

            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'selling_price' => $request->selling_price,
            'purchase_price' => $request->purchase_price,
            'short_descp' => $request->short_descp,
            'unit' => $request->unit,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thambnail' => $save_url,
            'vendor_id' => $request->vendor_id,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);



        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.product')->with($notification);
    } // End Method


    public function EditProduct($id)
    {

        $multiImgs = MultiImg::where('product_id', $id)->get();
        $activeVendor = User::where('status', 'active')->where('role', 'vendor')->latest()->get();
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $products = Product::findOrFail($id);
        return view('backend.product.product_edit', compact('brands', 'categories', 'activeVendor', 'products', 'subcategory', 'multiImgs'));
    } // End Method


    public function UpdateProduct(Request $request)
    {

        $product_id = $request->id;

        Product::findOrFail($product_id)->update([

            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),

            'product_code' => $request->product_code,
            'unit' => $request->unit,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'selling_price' => $request->selling_price,
            'purchase_price' => $request->purchase_price,
            'short_descp' => $request->short_descp,

            'unit' => $request->unit,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,


            'vendor_id' => $request->vendor_id,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);


        $notification = array(
            'message' => 'Product Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.product')->with($notification);
    } // End Method




    public function UpdateProductThambnail(Request $request)
    {

        $pro_id = $request->id;
        $oldImage = $request->old_img;

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(800, 800)->save('upload/products/thambnail/' . $name_gen);
        $save_url = 'upload/products/thambnail/' . $name_gen;

        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        Product::findOrFail($pro_id)->update([

            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Image Thambnail Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

    // Multi Image Update
    public function UpdateProductMultiimage(Request $request)
    {

        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(800, 800)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;

            MultiImg::where('id', $id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),

            ]);
        } // end foreach

        $notification = array(
            'message' => 'Product Multi Image Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method



    public function MulitImageDelelte($id)
    {
        $oldImg = MultiImg::findOrFail($id);
        unlink($oldImg->photo_name);

        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Multi Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method


    public function ProductInactive($id)
    {

        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method


    public function ProductActive($id)
    {

        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method


    public function ProductDelete($id)
    {
        $orders_have_product = OrderItem::where('product_id', $id)->count();
        //dd($orders_have_product);

        if ($orders_have_product < 1) {
            $product = Product::findOrFail($id);
            unlink($product->product_thambnail);
            Product::findOrFail($id)->delete();

            $imges = MultiImg::where('product_id', $id)->get();
            foreach ($imges as $img) {
                unlink($img->photo_name);
                MultiImg::where('product_id', $id)->delete();
            }

            $notification = array(
                'message' => 'Product Deleted Successfully',
                'alert-type' => 'success'
            );
        } else {

            $notification = array(
                'message' => 'You can not delete product, it has order',
                'alert-type' => 'info'
            );
        }

        return redirect()->back()->with($notification);
    } // End Method

    public function ProductStock()
    {

        $products = Product::latest()->get();
        return view('backend.product.product_stock', compact('products'));
    } // End Method


    public function AddProductStock()
    {
        $activeVendor = User::where('status', 'active')->where('role', 'vendor')->latest()->get();
        $products = Product::latest()->get();
        return view('backend.product.add_product_stock', compact('products', 'activeVendor'));
    } // End Method

    public function AdminBinCard($id)
    {

        $product_name = Product::where('id', $id)->value('product_name');
        $stocks = Stock::where('item_id', $id)->orderBy('id', 'ASC')->get();
        return view('backend.product.bincard_admin', compact('stocks', 'product_name'));
    } // End Method



    public function BulkUploadProducts(Request $request)
    {
        // Enable query logging at the start
        DB::enableQueryLog();

        $request->validate([
            'file' => 'required|file|mimes:csv,xlsx,xls',
        ]);

        $file = $request->file('file');
        $data = Excel::toArray([], $file);

        Log::info('Excel Headers and First Row', [
            'headers' => $data[0][0] ?? 'No headers',
            'first_row' => $data[0][1] ?? 'No data'
        ]);

        $lastProductId = Product::max('id') ?? 0;
        $productCodeCounter = $lastProductId + 1;
        $errors = [];

        foreach ($data[0] as $index => $row) {
            if ($index === 0) continue;

            // Clear the query log for each iteration
            DB::flushQueryLog();

            // Log the current row being processed
            Log::info("Processing row {$index}", ['row_data' => $row]);

            $validator = Validator::make([
                'term' => $row[0],
                'brand_id' => $row[1],
                'category_id' => $row[2],
                'subcategory_id' => $row[3],
                'product_name' => "$row[4]",
                'product_slug' => strtolower(str_replace(' ', '-', $row[4])),
                'product_code' => $productCodeCounter,
                'product_tags' => $row[5],
                'product_size' => $row[6],
                'unit' => $row[7],
                'selling_price' => $row[8],
                'purchase_price' => $row[9],
                'short_descp' => $row[10],
                'vendor_id' => $row[11] ?? null,
            ], [
                // Your validation rules here...
            ]);

            if ($validator->fails()) {
                Log::warning("Validation failed for row {$index}", [
                    'row_data' => $row,
                    'validation_errors' => $validator->errors()->toArray()
                ]);

                $errors[] = [
                    'row' => $index + 1,
                    'errors' => $validator->errors()->all(),
                ];
                continue;
            }

            try {
                $productCode = str_pad($productCodeCounter, 5, '0', STR_PAD_LEFT);
                $productCodeCounter++;

                $product = Product::create([
                    'term' => $row[0],
                    'brand_id' => $row[1],
                    'category_id' => $row[2],
                    'subcategory_id' => $row[3],
                    'product_name' => $row[4],
                    'product_slug' => strtolower(str_replace(' ', '-', $row[4])),
                    'product_code' => $productCode,
                    'product_tags' => $row[5],
                    'product_size' => $row[6],
                    'unit' => $row[7],
                    'selling_price' => $row[8],
                    'purchase_price' => $row[9],
                    'short_descp' => $row[10],
                    'vendor_id' => $row[11],
                    'status' => 1,
                    'created_at' => Carbon::now(),
                ]);

                // Log successful creation and the queries that were executed
                Log::info("Successfully created product for row {$index}", [
                    'product_id' => $product->id,
                    'queries' => DB::getQueryLog()
                ]);
            } catch (\Exception $e) {
                Log::error("Error processing row {$index}", [
                    'row_data' => $row,
                    'error_message' => $e->getMessage(),
                    'queries' => DB::getQueryLog(),
                    'stack_trace' => $e->getTraceAsString()
                ]);

                $errors[] = [
                    'row' => $index + 1,
                    'errors' => [$e->getMessage()]
                ];
            }
        }

        if (empty($errors)) {
            $notification = [
                'message' => 'Products uploaded successfully.',
                'alert-type' => 'success',
            ];
        } else {
            session()->flash('errors', $errors);
            $notification = [
                'message' => 'Some rows failed to upload. Please review the errors.',
                'alert-type' => 'error',
                'errors' => $errors,
            ];
        }

        return redirect()->back()->with($notification);
    }



    public function downloadTemplate()
    {
        $headers = [
            'term',
            'book_type', //brand_id
            'department_id', // category_id id
            'level_id', //subcategory_id
            'product_name',
            'product_tags',
            'product_size',
            'unit',
            'selling_price',
            'purchase_price',
            'short_descp',
            'vendor_id'
        ];

        $callback = function () use ($headers) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $headers);
            fclose($file);
        };

        return response()->stream($callback, 200, [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=product_template.csv",
        ]);
    }


    public function updateCurrentTerm(Request $request)
    {
        // Validate that the term is either "First" or "Second"
        $request->validate([
            'term' => 'required|in:First,Second',
        ]);

        // Update the record with id=1 in the `current_term` table
        $updated = DB::table('current_term')
            ->where('id', 1)
            ->update(['term' => $request->term]);

        // Return a JSON response indicating success or failure
        if ($updated) {
            return response()->json(['success' => true, 'message' => 'Current semester updated successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to update current semester.']);
        }
    }
}
