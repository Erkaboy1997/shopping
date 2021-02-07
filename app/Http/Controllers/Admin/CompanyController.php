<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function index(){
        return view('admin.company.index') -> with('company',Company::paginate(20));
    }

    public function create(){
        return view('admin.company.create');
    }

    public function edit($id){
        return view('admin.company.update')->with(['company' => Company::find($id)]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required',
        ]);

        $company = new Company();
        $name_left =  rand(1,10).".".date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
        $upload1 =  $request->image->move(public_path('uploads/'), $name_left);
        $image_left = $name_left;

        if($upload1){
            $company -> title = $request -> title;
            $company -> description = $request -> description;
            $company -> image = $image_left;
            $company -> image_title = $request -> image_title;
            $company -> image_description = $request -> image_description;
            $company -> alt = $request -> alt;

            $company->save();
            return redirect()->route('admin.company.index')->with('success','Cозданы успешно!');
        }
    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'title' => 'required',
        ]);

        $company = Company::findOrFail($id);
        $old = $company->image;
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
        $company -> title = $request -> title;
        $company -> description = $request -> description;
        $company -> image = $image;
        $company -> image_title = $request -> image_title;
        $company -> image_description = $request -> image_description;
        $company -> alt = $request->alt;
        $company->save();
        return redirect()->route('admin.company.index')->with('success','Успешно обновлено!');
    }

    public function destroy($id){
        $company = Company::findOrFail($id);
        if(file_exists('uploads'."/".$company->image)){
            unlink('uploads'."/".$company->image);
        }
        $company -> delete();
        return redirect()->route('admin.company.index')->with('success',"Удалено успешно!");
    }
}
