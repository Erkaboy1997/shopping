<?php

namespace App\Http\Controllers\Admin;

use App\Forget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForgetController extends Controller
{
    public function index(){
        return view('admin.forget.index') -> with('forget',Forget::paginate(20));
    }

    public function create(){
        return view('admin.forget.create');
    }

    public function store(Request $request){
        $forget = new Forget();
        $name_left =  rand(1,10).".".date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
        $upload1 =  $request->image->move(public_path('uploads/'), $name_left);
        $image_left = $name_left;

        if($upload1){
            $forget -> image = $image_left;
            $forget -> alt = $request -> alt;
            $forget -> save();
            return redirect()->route('admin.forget.index')->with('success','Cозданы успешно!');
        }
    }

    public function destroy($id){
        $forget = Forget::findOrFail($id);
        if(file_exists('uploads'."/".$forget->image)){
            unlink('uploads'."/".$forget->image);
        }
        $forget -> delete();
        return redirect()->route('admin.forget.index')->with('success',"Удалено успешно!");
    }
}
