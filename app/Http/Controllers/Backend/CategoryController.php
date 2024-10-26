<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Image;

class CategoryController extends Controller
{
    public function AllCategory()
    {
        $categories = Category::latest()->get();
        return view('backend.category.category_all', compact('categories'));
    } // End Method


    public function AddCategory()
    {
        return view('backend.category.category_add');
    } // End Method



    public function StoreCategory(Request $request)
    {



        $cat_id =   Category::create([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'category_image' => 'none',
        ]);
        // to create sub category in category name
        if ($cat_id) {
            SubCategory::create([
                'category_id' => $cat_id->id,
                'subcategory_name' => 'ND1',
                'subcategory_slug' => strtolower(str_replace(' ', '-', 'ND1-' . $request->category_name)),
            ]);

            SubCategory::create([
                'category_id' => $cat_id->id,
                'subcategory_name' => 'ND2',
                'subcategory_slug' => strtolower(str_replace(' ', '-', 'ND2-' . $request->category_name)),
            ]);

            SubCategory::create([
                'category_id' => $cat_id->id,
                'subcategory_name' => 'ND3',
                'subcategory_slug' => strtolower(str_replace(' ', '-', 'ND3-' . $request->category_name)),
            ]);

            SubCategory::create([
                'category_id' => $cat_id->id,
                'subcategory_name' => 'HND1',
                'subcategory_slug' => strtolower(str_replace(' ', '-', 'HND1-' . $request->category_name)),
            ]);


            SubCategory::create([
                'category_id' => $cat_id->id,
                'subcategory_name' => 'HND2',
                'subcategory_slug' => strtolower(str_replace(' ', '-', 'HND2-' . $request->category_name)),
            ]);

            SubCategory::create([
                'category_id' => $cat_id->id,
                'subcategory_name' => 'HND3',
                'subcategory_slug' => strtolower(str_replace(' ', '-', 'HND3-' . $request->category_name)),
            ]);
        }

        $notification = array(
            'message' => 'Department Inserted Successfully',
            'alert-type' => 'success'
        );

        //  return redirect()->route('add.category')->with($notification);
        return redirect()->route('all.category')->with($notification);
    } // End Method



    public function EditCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    } // End Method


    public function UpdateCategory(Request $request)
    {

        $cat_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('category_image')) {

            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(120, 120)->save('upload/category/' . $name_gen);
            $save_url = 'upload/category/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Category::findOrFail($cat_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
                'category_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Category Updated with image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.category')->with($notification);
        } else {

            Category::findOrFail($cat_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            ]);

            $notification = array(
                'message' => 'Category Updated without image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.category')->with($notification);
        } // end else

    } // End Method


    public function DeleteCategory($id)
    {

        $category_have_product = Product::where('category_id', $id)->count();
        $category_have_subcat = SubCategory::where('category_id', $id)->count();
        $cat_is_related = $category_have_product + $category_have_subcat;
        //dd($cat_is_related);

        if ($cat_is_related < 1) {
            $category = Category::findOrFail($id);
            $img = $category->category_image;
            unlink($img);

            Category::findOrFail($id)->delete();

            $notification = array(
                'message' => 'Category Deleted Successfully',
                'alert-type' => 'success'
            );
        } else {

            $notification = array(
                'message' => 'You can not delete category, it has product',
                'alert-type' => 'info'
            );
        }
        return redirect()->back()->with($notification);
    } // End Method






}
