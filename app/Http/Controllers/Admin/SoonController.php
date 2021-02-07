<?php

namespace App\Http\Controllers\Admin;

use App\Soon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SoonController extends Controller{
    public function index(){
        return view('admin.soon.index') -> with('soon',Soon::orderBy('id','DESC')->paginate(20));
    }

    public function create(){
        return view('admin.soon.create');
    }

    public function store(Request $request){
        $soon = new Soon();
        $name_left =  rand(1,10).".".date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
        $upload1 =  $request->image->move(public_path('uploads/'), $name_left);
        $image_left = $name_left;

        if($upload1){
            $soon -> image = $image_left;
            $soon -> button = $request -> button;
            $soon -> alt = $request -> alt;
            $soon -> save();
            return redirect()->route('admin.soon.index')->with('success','Cозданы успешно!');
        }
    }

    public function destroy($id){
        $soon = Soon::findOrFail($id);
        if(!empty($soon->image))
            if(file_exists('uploads'."/".$soon->image)){
                unlink('uploads'."/".$soon->image);
            }
        $soon -> delete();
        return redirect()->route('admin.soon.index')->with('success',"Удалено успешно!");
    }
}
