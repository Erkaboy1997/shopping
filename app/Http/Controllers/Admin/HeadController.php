<?php

namespace App\Http\Controllers\Admin;

use App\Head;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeadController extends Controller{
    public function index(){
        return view('admin.head.index') -> with('head',Head::orderBy('id','desc')->paginate(20));
    }

    public function create(){
        return view('admin.head.create');
    }

    public function store(Request $request){
        $head = new Head();
        $head -> name = $request -> name;
        $head -> status = $request -> status;
        $head -> save();
            return redirect()->route('admin.head.index')->with('success','Cозданы успешно!');
    }

    public function destroy($id){
        Head::destroy($id);
        return redirect()->route('admin.head.index')->with('success',"Удалено успешно!");
    }
}
