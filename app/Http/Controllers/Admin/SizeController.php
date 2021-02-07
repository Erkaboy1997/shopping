<?php

namespace App\Http\Controllers\Admin;

use App\Size;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SizeController extends Controller
{
    public function index(){
        return view('admin.size.index') -> with('size',Size::orderBy('id','DESC')->paginate(40));
    }

    public function create(){
        return view('admin.size.create');
    }

    public function store(Request $request){
        $size = new Size();
        $size -> name = $request -> name;
        $size -> save();
        return redirect()->route('admin.size.index')->with('success','Cозданы успешно!');

    }

    public function destroy($id){
        Size::destroy($id);
        return redirect()->route('admin.size.index')->with('success',"Удалено успешно!");
    }
}
