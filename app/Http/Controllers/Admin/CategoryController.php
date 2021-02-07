<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller{
    public function index(){
        return view('admin.category.index') -> with('category',Category::orderBy('id','desc')->paginate(20));
    }

    public function create(){
        $category = DB::table('category')->where('parent_id',0) -> get();
        return view('admin.category.create',[
            'category' => $category,
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
        ]);
        $category = new Category();
        //dd($request->image->getClientOriginalExtension());
        $name_left =  rand(1,10).".".date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
        $upload1 =  $request->image->move(public_path('uploads/'), $name_left);
        $image_left = $name_left;

        if($upload1){
            $category -> name = $request -> name;
            $category -> image = $image_left;
            $category -> parent_id = $request -> parent_id;
            $category -> status = $request -> status;
            $category -> alt = $request -> alt;
            $category -> save();
            return redirect()->route('admin.category.index')->with('success','Cозданы успешно!');
        }
    }

    public function edit($id){
        $category = DB::table('category')->where('parent_id',0) -> get();
        return view('admin.category.update')->with([
            'cat' => Category::find($id),
            'category' => $category,
        ]);
    }

    public function update(Request $request, $id){
        $category = Category::findOrFail($id);
        $old = $category->image;
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
        $category -> name = $request -> name;
        $category -> image = $image;
        $category -> parent_id = $request -> parent_id;
        $category -> status = $request -> status;
        $category -> alt = $request -> alt;
        $category -> save();
        return redirect()->route('admin.category.index')->with('success','Успешно обновлено!');
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        if(file_exists('uploads'."/".$category->image)){
            unlink('uploads'."/".$category->image);
        }
        $category -> delete();
        return redirect()->route('admin.category.index')->with('success',"Удалено успешно!");
    }
}
