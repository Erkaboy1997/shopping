<?php

namespace App\Http\Controllers\Admin;

use App\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    public function index(){
        return view('admin.staff.index') -> with('staff',Staff::orderBy('id','DESC')->paginate(20));
    }

    public function create(){
        return view('admin.staff.create');
    }

    public function store(Request $request){
        $staff = new Staff();
        $name_left =  rand(1,10).".".date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
        $upload1 =  $request->image->move(public_path('uploads/'), $name_left);
        $image_left = $name_left;

        if($upload1){
            $staff -> name = $request -> name;
            $staff -> image = $image_left;
            $staff -> position = $request -> position;
            $staff -> alt = $request -> alt;
            $staff->save();
            return redirect()->route('admin.staff.index')->with('success','Cозданы успешно!');
        }
    }

    public function destroy($id){
        $staff = Staff::findOrFail($id);
        if(!empty($soon->image))
            if(file_exists('uploads'."/".$staff->image)){
                unlink('uploads'."/".$staff->image);
            }
        $staff -> delete();
        return redirect()->route('admin.staff.index')->with('success',"Удалено успешно!");
    }
}
