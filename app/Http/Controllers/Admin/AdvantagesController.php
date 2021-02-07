<?php

namespace App\Http\Controllers\Admin;

use App\Advantages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdvantagesController extends Controller{
    public function index(){
        return view('admin.advantages.index') -> with('advantages',Advantages::orderBy('id','DESC')->paginate(20));
    }

    public function create(){
        return view('admin.advantages.create');
    }

    public function store(Request $request){

        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
        ]);

        $advantages = new Advantages();
        $name_left =  rand(1,10).".".date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
        $upload1 =  $request->image->move(public_path('uploads/'), $name_left);
        $image_left = $name_left;

        if($upload1){
            $advantages -> image = $image_left;
            $advantages -> title = $request -> title;
            $advantages -> alt = $request -> alt;
            $advantages -> description = $request ->description;
            $advantages->save();
            return redirect()->route('admin.advantages.index')->with('success','Cозданы успешно!');
        }
    }

    public function edit($id){
        return view('admin.advantages.update')->with(['advantages' => Advantages::find($id)]);
    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'title' => 'required',
        ]);
        $advantages = Advantages::findOrFail($id);
        $old = $advantages->image;
        if($request->hasFile('image')) {
            if(file_exists('uploads'."/".$old)){
                unlink('uploads'."/".$old);
            }
            //(file_exists($old)) ? unlink('uploads'."/".$old) : '';

            $name =  date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
            $upload =  $request->image->move(public_path('uploads/'), $name);
            if(!$upload)
                return back()->with('danger','Изображение не может быть загружено!');
            else
                $image = $name;
        }else{
            $image = $old;
        }
        $advantages -> title = $request -> title;
        $advantages -> alt = $request -> alt;
        $advantages -> description = $request ->description;
        $advantages->image = $image;
        $advantages->save();
        return redirect()->route('admin.advantages.index')->with('success','Успешно обновлено!');
    }

    public function destroy($id){
        $advantages = Advantages::findOrFail($id);
        if(file_exists('uploads'."/".$advantages->image)){
            unlink('uploads'."/".$advantages->image);
        }
        $advantages -> delete();
        return redirect()->route('admin.advantages.index')->with('success',"Удалено успешно!");
    }
}
