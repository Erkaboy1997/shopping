<?php

namespace App\Http\Controllers\Admin;

use App\StaffText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffTextController extends Controller
{
    public function index(){
        return view('admin.stafftext.index') -> with('staff',StaffText::paginate(20));
    }

    public function create(){
        return view('admin.stafftext.create');
    }

    public function store(Request $request){
        $stafftext = new StaffText();

        $stafftext -> title = $request -> title;
        $stafftext -> description = $request -> description;

        $stafftext -> save();
        return redirect()->route('admin.stafftext.index')->with('success','Cозданы успешно!');
    }

    public function destroy($id){
        StaffText::destroy($id);
        return redirect()->route('admin.stafftext.index')->with('success',"Удалено успешно!");
    }
}
