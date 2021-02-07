<?php

namespace App\Http\Controllers\Admin;

use App\Discount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountController extends Controller{
    public function index(){
        return view('admin.discount.index') -> with('discount',Discount::orderBy('id','DESC')->paginate(20));
    }

    public function create(){
        return view('admin.discount.create');
    }

    public function store(Request $request){
        $discount = new Discount();
        $name_left =  rand(1,10).".".date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
        $upload1 =  $request->image->move(public_path('uploads/'), $name_left);
        $image_left = $name_left;

        if($upload1){
            $discount -> image = $image_left;
            $discount -> title = $request -> title;
            $discount -> description = $request -> description;
            $discount -> name = $request -> name;
            $discount -> info = $request -> info;
            $discount -> type = $request -> type;
            $discount -> lifetime = $request -> lifetime;
            $discount -> button = $request -> button;
            $discount -> status = $request -> status;
            $discount -> alt = $request -> alt;
            $discount -> save();
            return redirect()->route('admin.discount.index')->with('success','Cозданы успешно!');
        }
    }

    public function destroy($id){
        $discount = Discount::findOrFail($id);
        if(file_exists('uploads'."/".$discount->image)){
            unlink('uploads'."/".$discount->image);
        }
        $discount -> delete();
        return redirect()->route('admin.discount.index')->with('success',"Удалено успешно!");
    }
}
