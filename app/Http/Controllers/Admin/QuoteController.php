<?php

namespace App\Http\Controllers\Admin;

use App\Quote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuoteController extends Controller
{
    public function index(){
        return view('admin.quote.index') -> with('quote',Quote::paginate(20));
    }

    public function create(){
        return view('admin.quote.create');
    }

    public function store(Request $request){
        $quote = new Quote();
        $quote -> title_one = $request -> title_one;
        $quote -> title_two = $request -> title_two;
        $quote -> title_three = $request -> title_three;
        $quote -> save();
        return redirect()->route('admin.quote.index')->with('success','Cозданы успешно!');
    }

    public function destroy($id){
        Quote::destroy($id);
        return redirect()->route('admin.quote.index')->with('success',"Удалено успешно!");
    }
}
