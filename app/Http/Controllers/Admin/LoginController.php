<?php

namespace App\Http\Controllers\Admin;

use App\Login;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller{
    public function index(){
        return view('admin.login.index') -> with('login',Login::paginate(20));
    }

    public function create(){
        return view('admin.login.create');
    }

    public function store(Request $request){
        $login = new Login();
        $name_left =  rand(1,10).".".date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
        $upload1 =  $request->image->move(public_path('uploads/'), $name_left);
        $image_left = $name_left;

        if($upload1){
            $login -> image = $image_left;
            $login -> alt = $request -> alt;
            $login -> save();
            return redirect()->route('admin.login.index')->with('success','Cозданы успешно!');
        }
    }

    public function destroy($id){
        $login = Login::findOrFail($id);
        if(file_exists('uploads'."/".$login->image)){
            unlink('uploads'."/".$login->image);
        }
        $login -> delete();
        return redirect()->route('admin.login.index')->with('success',"Удалено успешно!");
    }
}
