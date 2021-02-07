<?php

namespace App\Http\Controllers\Admin;

use App\Catalog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatalogController extends Controller{
    public function index(){
        return view('admin.catalog.index') -> with('catalog',Catalog::orderBy('id','DESC')->paginate(20));
    }

    public function create(){
        return view('admin.catalog.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
        ]);
        $catalog = new Catalog();
        $name_left =  rand(1,10).".".date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
        $upload1 =  $request->image->move(public_path('uploads/'), $name_left);
        $image_left = $name_left;

        if($upload1){
            $catalog -> image = $image_left;
            $catalog -> button = $request -> button;
            $catalog -> name = $request -> name;
            $catalog -> alt = $request -> alt;
            $catalog -> save();
            return redirect()->route('admin.catalog.index')->with('success','Cозданы успешно!');
        }
    }

    public function edit($id){
        return view('admin.catalog.update')->with(['catalog' => Catalog::find($id)]);
    }

    public function update(Request $request,$id){
        $catalog = Catalog::findOrFail($id);
        $old = $catalog->image;
        if($request->hasFile('image')) {
            if(file_exists('uploads'."/".$old)){
                unlink('uploads'."/".$old);
            }
            $name =  date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
            $upload =  $request->image->move(public_path('uploads/'), $name);
            if(!$upload)
                return back()->with('danger','Изображение не может быть загружено!');
            else
                $image = $name;
        }else{
            $image = $old;
        }
        $catalog -> name = $request -> name;
        $catalog -> alt = $request -> alt;
        $catalog -> button = $request ->button;
        $catalog ->image = $image;
        $catalog -> save();
        return redirect()->route('admin.catalog.index')->with('success','Успешно обновлено!');
    }

    public function destroy($id){
        $catalog = Catalog::findOrFail($id);
        if(file_exists('uploads'."/".$catalog->image)){
            unlink('uploads'."/".$catalog->image);
        }
        $catalog -> delete();
        return redirect()->route('admin.catalog.index')->with('success',"Удалено успешно!");
    }
}
