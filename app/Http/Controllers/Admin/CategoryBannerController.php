<?php

namespace App\Http\Controllers\Admin;

use App\CategoryBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryBannerController extends Controller
{
    public function index(){
        return view('admin.categorybanner.index') -> with('categorybanner',CategoryBanner::orderBy('id','desc')->paginate(20));
    }

    public function create(){
        $category = DB::table('category')->where('parent_id','!=',0) -> get();
        return view('admin.categorybanner.create',[
            'category' => $category,
        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => "required",
            'category_id' => 'required',
            'image' => 'required',
        ]);
        $categorybanner = new CategoryBanner();
        $name_left =  rand(1,10).".".date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
        $upload1 =  $request->image->move(public_path('uploads/'), $name_left);
        $image_left = $name_left;

        if($upload1){
            $categorybanner -> name = $request -> name;
            $categorybanner -> image = $image_left;
            $categorybanner -> category_id = $request -> category_id;
            $categorybanner -> alt = $request -> alt;
            $categorybanner -> save();
            return redirect()->route('admin.categorybanner.index')->with('success','Cозданы успешно!');
        }
    }

    public function edit($id){
        $category = DB::table('category')->where('parent_id','!=',0) -> get();
        $banner = CategoryBanner::find($id);

        return view('admin.categorybanner.update')->with([
            'banner' => $banner,
            'category' => $category,
        ]);
    }

    public function update(Request $request,$id){
        $categorybanner = CategoryBanner::findOrFail($id);
        $old = $categorybanner->image;
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
        $categorybanner -> name = $request -> name;
        $categorybanner -> image = $image;
        $categorybanner -> category_id = $request -> category_id;
        $categorybanner -> alt = $request -> alt;
        $categorybanner -> save();
        return redirect()->route('admin.categorybanner.index')->with('success','Успешно обновлено!');
    }

    public function destroy($id){
        $categorybanner = CategoryBanner::findOrFail($id);
        if(file_exists('uploads'."/".$categorybanner->image)){
            unlink('uploads'."/".$categorybanner->image);
        }
        $categorybanner -> delete();
        return redirect()->route('admin.categorybanner.index')->with('success',"Удалено успешно!");
    }
}
