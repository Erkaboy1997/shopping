<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        session_start();
        return view('home');
    }

    public function update(Request $request){
        $user_id =  $request->user;
        $user = User::findOrFail($user_id);
        $old = $request->old_password;
        $new = $request->new_password;
        $confirm = $request->confirm_password;
        $password =  $user->password;

        if(!empty($old)) {
               if (Hash::check($old, $password) and $new == $confirm) {
                   $user->update(
                       [
                            'image' => 'image',
                            'password' => bcrypt($new),
                            'surname' => $request->surname,
                            'phone' => $request->phone,

                       ]
                   );
               return back() -> with('success',"смена пароля");
           }else{
               return back()->with('warning', 'пароль без изменений');
           }
       }

       $user->update(
         [
             'image'=>'image',
             'surname'=>$request->surname,
             'phone'=>$request->phone,
         ]
       );


       //$user->save();
        return back();
    }

    public function image(Request $request){

    }
}
