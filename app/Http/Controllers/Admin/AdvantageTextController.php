<?php

namespace App\Http\Controllers\Admin;

use App\AdvantageText;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvantageTextController extends Controller{
    public function index(){
        return view('admin.advantagetext.index') -> with('advantages',AdvantageText::paginate(20));
    }

    public function create(){
        return view('admin.advantagetext.create');
    }

    public function store(Request $request){
        $advantages = new AdvantageText();
        $advantages -> title = $request -> title;
        $advantages -> description = $request ->description;
        $advantages->save();
        return redirect()->route('admin.advantagetext.index')->with('success','Cозданы успешно!');
    }

    public function destroy($id){
        AdvantageText::destroy($id);
        return redirect()->route('admin.advantagetext.index')->with('success',"Удалено успешно!");
    }
}
