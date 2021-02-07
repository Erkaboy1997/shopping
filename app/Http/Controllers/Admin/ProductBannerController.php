<?php

namespace App\Http\Controllers\Admin;

use App\ProductBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductBannerController extends Controller
{
    public function index(){
        return view('admin.productbanner.index') -> with('productbanner',ProductBanner::orderBy('id','DESC')->paginate(20));
    }

    public function create(){
        $product = DB::table('product') -> orderByDesc('id') -> get();
        return view('admin.productbanner.create',[
            'product' => $product,
        ]);
    }

    public function store(Request $request){
        $productbanner = new ProductBanner();
        $name_left =  rand(1,10).".".date('Y_m_d_H-i-s') . "." . $request->image_left->getClientOriginalExtension();
        $upload1 =  $request->image_left->move(public_path('uploads/'), $name_left);
        $image_left = $name_left;

        $name_right =  date('Y_m_d_H-i-s') . "." . $request->image_right->getClientOriginalExtension();
        $upload2 =  $request->image_right->move(public_path('uploads/'), $name_right);
        $image_right = $name_right;

        if($upload1 and $upload2){
            $productbanner -> image_left = $image_left;
            $productbanner -> product_id = $request -> product_id;
            $productbanner -> title = $request -> title;
            $productbanner -> product2_id = $request -> product2_id;
            $productbanner -> image_right = $image_right;
            $productbanner -> status = $request -> status;
            $productbanner -> alt = $request -> alt;
            $productbanner->save();
            return redirect()->route('admin.productbanner.index')->with('success','Cозданы успешно!');
        }
    }

    public function destroy($id){
        $product = ProductBanner::findOrFail($id);
        if(file_exists('uploads'."/".$product->image_left)){
            unlink('uploads'."/".$product->image_left);
        }

        if(file_exists('uploads'."/".$product->image_right)){
            unlink('uploads'."/".$product->image_right);
        }

        $product -> delete();
        return redirect()->route('admin.productbanner.index')->with('success',"Удалено успешно!");
    }
}
