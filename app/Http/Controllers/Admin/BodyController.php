<?php

namespace App\Http\Controllers\Admin;

use App\Body;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BodyController extends Controller{
    public function index(){
        return view('admin.body.index') -> with('body',Body::orderBy('id','desc')->paginate(20));
    }

    public function create(){
        return view('admin.body.create');
    }

    public function store(Request $request){
        $body = new Body();
        $body -> name = $request -> name;
        $body -> status = $request -> status;
        $body -> save();
        return redirect()->route('admin.body.index')->with('success','Cозданы успешно!');
    }

    public function edit($id){
        return view('admin.body.update')->with(['body' => Body::find($id)]);
    }

    public function update(Request $request,$id){
        $body = Body::findOrFail($id);
        $body->name = $request->name;
        $body->status = $request->status;
        $body->save();
        return redirect()->route('admin.body.index')->with('success','Успешно обновлено!');
    }

    public function destroy($id){
        Body::destroy($id);
        return redirect()->route('admin.body.index')->with('success',"Удалено успешно!");
    }
}
