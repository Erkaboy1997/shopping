<?php

namespace App\Http\Controllers\Admin;

use App\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    public function index(){
        return view('admin.history.index') -> with('history',History::paginate(20));
    }

    public function create(){
        return view('admin.history.create');
    }

    public function store(Request $request){
        $history = new History();
        $name_left =  rand(1,10).".".date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
        $upload1 =  $request->image->move(public_path('uploads/'), $name_left);
        $image_left = $name_left;

        $name_2 =  date('Y_m_d_H-i-s') . "." . $request->image2->getClientOriginalExtension();
        $upload2 =  $request->image2->move(public_path('uploads/'), $name_2);
        $image_2 = $name_2;

        if($upload1 and $upload2){
            $history -> title = $request -> title;
            $history -> description = $request -> description;
            $history -> image = $image_left;
            $history -> image2 = $image_2;
            $history -> alt = $request -> alt;
            $history->save();
            return redirect()->route('admin.history.index')->with('success','Cозданы успешно!');
        }
    }

    public function destroy($id){
        $history = History::findOrFail($id);
        if(file_exists('uploads'."/".$history->image)){
            unlink('uploads'."/".$history->image);
        }
        if(file_exists('uploads'."/".$history->image2)){
            unlink('uploads'."/".$history->image2);
        }
        $history -> delete();
        return redirect()->route('admin.history.index')->with('success',"Удалено успешно!");
    }
}
