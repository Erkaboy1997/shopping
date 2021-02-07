<?php

namespace App\Http\Controllers\Admin;

use App\Certificates;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificatesController extends Controller
{
    public function index(){
        return view('admin.certificates.index') -> with('certificates',Certificates::orderBy('id','DESC')->paginate(20));
    }

    public function create(){
        return view('admin.certificates.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'image' => 'required',
        ]);
        $certificates = new Certificates();
        $name_left =  rand(1,10).".".date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
        $upload1 =  $request->image->move(public_path('uploads/'), $name_left);
        $image_left = $name_left;

        if($upload1){
            $certificates -> image = $image_left;
            $certificates -> alt = $request -> alt;
            $certificates->save();
            return redirect()->route('admin.certificates.index')->with('success','Cозданы успешно!');
        }
    }

    public function edit($id){
        return view('admin.certificates.update')->with(['certificate' => Certificates::find($id)]);
    }

    public function update(Request $request,$id)
    {
        $certificates = Certificates::findOrFail($id);
        $old = $certificates->image;
        if ($request->hasFile('image')) {
            if (file_exists('uploads' . "/" . $old)) {
                unlink('uploads' . "/" . $old);
            }
            $name = date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
            $upload = $request->image->move(public_path('uploads/'), $name);
            if (!$upload)
                return back()->with('danger', 'Изображение не может быть загружено!');
            else
                $image = $name;
        } else {
            $image = $old;
        }

        $certificates -> image = $image;
        $certificates -> alt = $request -> alt;
        $certificates->save();
        return redirect()->route('admin.certificates.index')->with('success','Успешно обновлено!');
    }

    public function destroy($id){
        $certificates = Certificates::findOrFail($id);
        if(file_exists('uploads'."/".$certificates->image)){
            unlink('uploads'."/".$certificates->image);
        }
        $certificates -> delete();
        Certificates::destroy($id);
        return redirect()->route('admin.certificates.index')->with('success',"Удалено успешно!");
    }
}
