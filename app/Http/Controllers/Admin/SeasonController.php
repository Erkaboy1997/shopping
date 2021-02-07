<?php

namespace App\Http\Controllers\Admin;

use App\Season;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeasonController extends Controller
{
    public function index(){
        return view('admin.season.index') -> with('season',Season::orderBy('id','DESC')->paginate(40));
    }

    public function create(){
        return view('admin.season.create');
    }

    public function store(Request $request){
        $season = new Season();
        $season -> name = $request -> name;
        $season -> save();
        return redirect()->route('admin.season.index')->with('success','Cозданы успешно!');
    }

    public function destroy($id){
        Season::destroy($id);
        return redirect()->route('admin.season.index')->with('success',"Удалено успешно!");
    }
}
