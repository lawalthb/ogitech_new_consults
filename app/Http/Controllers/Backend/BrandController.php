<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use Image;

class BrandController extends Controller
{
    public function AllBrand()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_all', compact('brands'));
    } // End Method


    public function AddBrand()
    {
        return view('backend.brand.brand_add');
    } // End Method


    public function StoreBrand(Request $request)
    {



        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
            'brand_image' => "none",
        ]);

        $notification = array(
            'message' => 'Bookt Type Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.brand')->with($notification);
    } // End Method


    public function EditBrand($id)
    {
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brand'));
    } // End Method


    public function UpdateBrand(Request $request)
    {

        $brand_id = $request->id;



        Brand::findOrFail($brand_id)->update([
            'brand_name' => $request->brand_name,
            'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
        ]);

        $notification = array(
            'message' => 'Type Updated without image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.brand')->with($notification);
    } // End Method


    public function DeleteBrand($id)
    {

        $brand_have_product = Product::where('brand_id', $id)->count();
        //dd($brand_have_product);

        if ($brand_have_product < 1) {
            $brand = Brand::findOrFail($id);
            $img = $brand->brand_image;
            unlink($img);



            Brand::findOrFail($id)->delete();

            $notification = array(
                'message' => 'Brand Deleted Successfully',
                'alert-type' => 'success'
            );
        } else {

            $notification = array(
                'message' => 'You can not delete brand, it has product',
                'alert-type' => 'info'
            );
        }


        return redirect()->back()->with($notification);
    } // End Method


}
