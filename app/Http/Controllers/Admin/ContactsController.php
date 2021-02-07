<?php

namespace App\Http\Controllers\Admin;

use App\Contacts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    public function index(){
        return view('admin.contacts.index') -> with('contacts',Contacts::paginate(20));
    }

    public function create(){
        return view('admin.contacts.create');
    }

    public function store(Request $request){
        $contact = new Contacts();
        $name_left =  rand(1,10).".".date('Y_m_d_H-i-s') . "." . $request->image_left->getClientOriginalExtension();
        $upload1 =  $request->image_left->move(public_path('uploads/'), $name_left);
        $image_left = $name_left;
        $name_right =  date('Y_m_d_H-i-s') . "." . $request->image_right->getClientOriginalExtension();
        $upload2 =  $request->image_right->move(public_path('uploads/'), $name_right);
        $image_right = $name_right;
        if($upload1 and $upload2){
            $contact -> image_left = $image_left;
            $contact -> image_right = $image_right;
            $contact -> title = $request -> title;
            $contact -> phone_first = $request -> phone_first;
            $contact -> phone_second = $request -> phone_second;
            $contact -> work_hours = $request -> work_hours;
            $contact -> email = $request -> email;
            $contact -> address = $request -> address;
            $contact -> google = $request -> google;
            $contact -> telegram = $request -> telegram;
            $contact -> facebook = $request -> facebook;
            $contact -> instagram = $request -> instagram;
            $contact -> alt = $request -> alt;

            $contact->save();
            return redirect()->route('admin.contacts.index')->with('success','Новости созданы успешно!');
        }
    }

    public function show($id){
        return view('admin.contacts.show') -> with('contacts',Contacts::find($id)->first());
    }

    public function destroy($id){
        $contact = Contacts::findOrFail($id);
        if(file_exists('uploads'."/".$contact->image_left)){
            unlink('uploads'."/".$contact->image_left);
        }
        if(file_exists('uploads'."/".$contact->image_right)){
            unlink('uploads'."/".$contact->image_right);
        }
        $contact -> delete();
        return redirect()->route('admin.contacts.index')->with('success',"удалено успешно!");
    }
}
