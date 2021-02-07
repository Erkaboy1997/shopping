<?php

namespace App\Http\Controllers\Admin;

use App\Register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index(){
        return view('admin.register.index') -> with('register',Register::paginate(20));
    }

    public function create(){
        return view('admin.register.create');
    }

    public function store(Request $request){
        $register = new Register();
        $name_left =  rand(1,10).".".date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
        $upload1 =  $request->image->move(public_path('uploads/'), $name_left);
        $image_left = $name_left;

        if($upload1){
            $register -> image = $image_left;
            $register -> alt = $request -> alt;
            $register -> save();
            return redirect()->route('admin.register.index')->with('success','Cозданы успешно!');
        }
    }

    public function destroy($id){
        $register = Register::findOrFail($id);
        if(!empty($register->image))
            if(file_exists('uploads'."/".$register->image)){
                unlink('uploads'."/".$register->image);
            }
        $register -> delete();
        return redirect()->route('admin.register.index')->with('success',"Удалено успешно!");
    }
}
