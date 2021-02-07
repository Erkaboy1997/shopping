<?php

namespace App\Http\Controllers\Admin;

use App\Mission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MissionController extends Controller
{
    public function index(){
        return view('admin.mission.index') -> with('mission',Mission::paginate(20));
    }

    public function create(){
        return view('admin.mission.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'image' => 'required',
        ]);
        $mission = new Mission();
        $name_left =  rand(1,10).".".date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
        $upload1 =  $request->image->move(public_path('uploads/'), $name_left);
        $image_left = $name_left;

        if($upload1){
            $mission -> title = $request -> title;
            $mission -> title_left = $request -> title_left;
            $mission -> description_left = $request -> description_left;
            $mission -> image = $image_left;
            $mission -> description_right = $request -> description_right;
            $mission -> alt = $request -> alt;
            $mission->save();
            return redirect()->route('admin.mission.index')->with('success','Cозданы успешно!');
        }
    }

    public function destroy($id){
        $mission = Mission::findOrFail($id);
        if(file_exists('uploads'."/".$mission->image)){
            unlink('uploads'."/".$mission->image);
        }
        $mission -> delete();
        return redirect()->route('admin.mission.index')->with('success',"Удалено успешно!");
    }
}
