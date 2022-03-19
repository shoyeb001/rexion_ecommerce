<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\MultiImg;
use App\Models\Offlineorder;
use App\Models\Pickupcenter;
use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{
    public function ManageProduct()
    {
        $products = Product::latest()->get();
        return view('backend.product.product_view', compact('products'));
    }

    public function AddProduct()
    {
        $categories = Category::latest()->get();
        $pickup_centers = Pickupcenter::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add', compact('categories', 'brands','pickup_centers'));
    }

    public function StoreProduct(Request $request)
    {
        $request->validate([
           
            "product_thambnail" => "required | mimes:jpg,png | max: 9000",
        ]);


        $image = $request->file('product_thambnail');
        $name_gen = uniqid() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/' . $name_gen);
        $save_url = 'upload/products/thambnail/' . $name_gen;
        if ($request->product_code == "") {
            $product_code = IdGenerator::generate(['table' => 'products', 'field' => 'product_code', 'length' => 13, 'prefix' => 2]);
        }else {
            $product_code = $request->product_code;
        }


        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'pickup_center'=>$request->pickup_center,
            'product_name' => $request->product_name,
            'product_slug' =>  strtolower(str_replace(' ', '-', $request->product_name)),
            'product_code' => $product_code,

            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'selling_price' => $request->selling_price,
            'purchase_price' => $request->purchase_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thambnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

        ////////// Multiple Image Upload Start ///////////

        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = uniqid() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
                'created_at' => Carbon::now(),

            ]);
        }

        ////////// Een Multiple Image Upload Start ///////////


        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);
    }

    public function EditProduct($id)
    {
        $multiImgs = MultiImg::where('product_id', $id)->get();

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $pickup_center = Pickupcenter::latest()->get();
        $products = Product::findOrFail($id);


        return view('backend.product.product_edit', compact('categories', 'brands', 'subcategory', 'subsubcategory', 'products', 'multiImgs','pickup_center'));
    }

    public function UpdateProduct(Request $request)
    {
        $product_id = $request->id;
        $product_code = IdGenerator::generate(['table' => 'products', 'field' => 'product_code', 'length' => 12, 'prefix' =>  2]);

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name' => $request->product_name,
            'product_slug' =>  strtolower(str_replace(' ', '-', $request->product_name)),
            'product_code' => $product_code,
            'pickup_center'=>$request->pickup_center,

            'product_qty' => $request->product_qty,
            'product_tags' => $request->product_tags,
            'product_size' => $request->product_size,
            'product_color' => $request->product_color,

            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-product')->with($notification);
    }

    public function MultiImageDelete($id)
    {
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ThambnailImageUpdate(Request $request)
    {
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('product_thambnail');
        $name_gen = uniqid() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thambnail/' . $name_gen);
        $save_url = 'upload/products/thambnail/' . $name_gen;

        Product::findOrFail($pro_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Image Thambnail Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function UpdateProductImage(Request $request)
    {
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = uniqid() . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('upload/products/multi-image/' . $make_name);
            $uploadPath = 'upload/products/multi-image/' . $make_name;

            MultiImg::where('id', $id)->update([
                'photo_name' => $uploadPath,
                'updated_at' => Carbon::now(),

            ]);
        } // end foreach

        $notification = array(
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function DeleteProduct($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id', $id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function StockProduct(Request $request)
    {
        if (session()->has("PICKUP_CENTER_ID")) {

            $products = Product::where("pickup_center", NULL)->orWhere("pickup_center", session("PICKUP_CENTER_ID"))->get();
        }else {
            $products = Product::latest()->get();
        }
        return view('backend.product.product_stock', compact('products'));
    }

    // product scan
    public function ScanProduct()
    {
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        // $product_id = $request->id;
        // $product_code = IdGenerator::generate(['table' => 'products', 'field' => 'product_code', 'length' => 12, 'prefix' =>  2]);
         return view('backend.product.product_scanner', compact("categories","brands"));
    }

    public function Scandata($p_code){
        $data = Product::where("product_code",$p_code)->get();
        return json_encode($data);

    }

    public function BarcodeDownload($product_code){
        $pdf = PDF::loadView('backend.pdf.barcode', compact("product_code"));
        return $pdf->stream();
    }

    public function AddInvoice(Request $request){
        $request->validate([
           "product_code"=>"required",
           "product_name"=>"required",
           "product_qty"=>"required",
           "selling_price"=>"required",
           "discount_price"=>"required",
           "customer_name"=>"required",
        ]);

        $product_code = $request->input("product_code");
        $product_name = $request->input("product_name");
        $qty = $request->input("product_qty");
        $selling_price = $request->input("selling_price");
        $discount_price = $request->input("discount_price");
        $customer_name = $request->input("customer_name");
        $gst = $request->gst;


        if ($discount_price == "") {
            $price = $selling_price;
        }else{
            $price = $discount_price;
        }

        if($gst == ""){
            $total_amount = $price * $qty;
        }else{
            $gst_amount = ($price * $qty) * ($gst/100);
            $total_amount = ($price * $qty) + $gst_amount;

        }


        Offlineorder::insert([
           "product_name"=>$product_name,
           "product_id"=>$product_code,
           "quantity"=>$qty,
           "price"=>$price,
           "total_price"=>$total_amount,
           "customer_name"=>$customer_name,
           "gst"=>$gst,
           "status"=>"active",
        ]);

        $notification = array(
            'message' => 'Product added to invoice',
            'alert-type' => 'success'
        );

        $product = Product::where("product_code",$product_code)->get();
        $p_qty = $product[0]->product_qty; 
        $new_qty = $p_qty - $qty;
        $data = array(
            "product_qty"=>$new_qty
        );

        Product::where("product_code",$product_code)->update($data);

        return redirect()->back()->with($notification);
    }

    public function ViewInvoice(){
        $custom = array(0,0,300,600);
        $data = Offlineorder::where("status","active")->get();
        $pdf = PDF::loadView('backend.pdf.invoice', compact("data"))->setPaper($custom);
        $new = array(
            "status"=>"inactive",
        );
        Offlineorder::where("status","active")->update($new);
        return $pdf->stream();

    }



}
