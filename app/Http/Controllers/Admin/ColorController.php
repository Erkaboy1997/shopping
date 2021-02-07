<?php

namespace App\Http\Controllers\Admin;

use App\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    public function index(){
        return view('admin.color.index') -> with('color',Color::orderBy('id','desc')->paginate(40));
    }

    public function create(){
        return view('admin.color.create');
    }

    public function store(Request $request){
        $color = new Color();
        $color -> name = $request -> name;
        $color -> code = $request -> code;
        $color -> save();
        return redirect()->route('admin.color.index')->with('success','Cозданы успешно!');

    }

    public function destroy($id){
        Color::destroy($id);
        return redirect()->route('admin.color.index')->with('success',"Удалено успешно!");
    }
}
