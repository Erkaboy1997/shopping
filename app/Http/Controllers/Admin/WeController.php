<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\We;

class WeController extends Controller
{
    public function index(){
        return view('admin.we.index') -> with('we',We::paginate(20));
    }

    public function create(){
        return view('admin.we.create');
    }

    public function store(Request $request){
        $we = new We();
        $name_left =  rand(1,10).".".date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
        $upload1 =  $request->image->move(public_path('uploads/'), $name_left);
        $image_left = $name_left;
        $name_right =  date('Y_m_d_H-i-s') . "." . $request->image_mobile->getClientOriginalExtension();
        $upload2 =  $request->image_mobile->move(public_path('uploads/'), $name_right);
        $image_right = $name_right;

        if($upload1 and $upload2){
            $we -> title = $request -> title;
            $we -> image = $image_left;
            $we -> image_mobile = $image_right;
            $we -> alt = $request -> alt;

            $we->save();
            return redirect()->route('admin.we.index')->with('success','Cозданы успешно!');
        }
    }

    public function destroy($id){
        $we = We::findOrFail($id);
        if(!empty($we->image))
            if(file_exists('uploads'."/".$we->image)){
                unlink('uploads'."/".$we->image);
            }
        $we -> delete();
        return redirect()->route('admin.we.index')->with('success',"Удалено успешно!");
    }
}
