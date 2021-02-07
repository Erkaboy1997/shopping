<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index(){
        return view('admin.news.index') -> with('news',News::orderBy('id','DESC')->paginate(20));
    }

    public function create(){
        return view('admin.news.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|min:5 |max: 255',
        ]);

        $new = new  News() ;
        $new -> name = $request -> name;
        $new -> source = $request -> source;
        $new -> day = date("Y.m.d H:i:s");

        $name =  date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
        $upload =  $request->image->move(public_path('uploads/'), $name);
        $image = $name;

        if($upload) {
            $new -> image = $image;
            $new -> description = $request -> description;
            $new -> category = $request -> category;
            $new -> alt = $request -> alt;
            $new -> description_long = $request -> description_long;
            $new -> status = $request -> status;
            $new -> also = $request -> also;
            $new->save();
        }
        return redirect()->route('admin.news.index')->with('success','Новости созданы успешно!');
    }

    public function show($id){
        return view('admin.news.show') -> with('news',News::find($id)->first());
    }

    public function edit($id){
        return view('admin.news.update')->with(['new' => News::find($id)]);
    }

    public function update(Request $request, $id){
        $new = News::findOrFail($id);

        $old = $new->image;
        if ($request->hasFile('image')){
            (file_exists($old))? unlink($old):'';

            $name =  date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
            $upload =  $request->image->move(public_path('uploads/'), $name);
            if(!$upload)
                return back()->with('danger','Изображение не может быть загружено!');
            else
                $image = $name;

        }
        else   $image = $old;
        if(!empty($image)){
            $new -> name = $request -> name;
            $new -> source = $request -> source;
            $new -> day = date("Y.m.d H:i:s");
            $new -> image = $image;
            $new -> alt = $request -> alt;
            $new -> description = $request -> description;
            $new -> category = $request -> category;
            $new -> description_long = $request -> description_long;
            $new -> status = $request -> status;
            $new -> also = $request -> also;

            $new -> save();
            if (!$new->save()){
                (file_exists($image))? unlink($image):'';
                return back()->with('danger','Не могу написать базу данных!');
            }
        }
        return redirect()->route('admin.news.index')->with('success','Новости редактировать успешно!');
    }

    public function destroy($id){
        $news = News::findOrFail($id);
        if(file_exists('uploads'."/".$news->image)){
            unlink('uploads'."/".$news->image);
        }
        $news -> delete();
        return redirect()->route('admin.news.index')->with('success',"Новости удалено успешно!");
    }
}
