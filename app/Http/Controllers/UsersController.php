<?php

namespace App\Http\Controllers;

use App\Mail\Forget;
use App\Mail\SendMail;
use App\Mail\WelcomeMail;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Validator;
use Auth;

class UsersController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function confirm(){
        return view('auth.confirm');
    }

    public function checklogin(Request $request){
        $this -> validate($request,[
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3',
        ]);

        $user_data = array(
            'email' => $request -> get('email'),
            'password' => $request->get('password'),
        );

        $user = DB::table('users')->where('email',$request->get('email'))->first();
        if(isset($user)>0){
            if($user->status == 1){
                if(Auth::attempt($user_data)){
                    return redirect('home');
                }else{
                    return back()->with('eror','Wrong login details');
                }
            }else{
                return back()->with('eror','Wrong login details');
            }
        }else{
            return back()->with('eror','Wrong login details');
        }
    }
    
    public function checkregister(Request $request){
        $this -> validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $code = rand(1000000,9999999);
        $user =  User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'code' => $code,
            'status' => 0,
        ]);
        $details = "http://shop/confirmemail?email=".$user->email."&code=".$code;
//        \Mail::to($request->get('email'))->send(new SendMail($details));
        $role = Role::select('id')->where('name','user')->first();
        $user->roles()->attach($role);
        return redirect('confirm');
    }

    public function forget(){
        return view('auth.forget');
    }

    public function sendforget(Request $request){
        $this -> validate($request,[
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        $code = rand(10000000,99999999);
        $user = DB::table('users')->where('email',$request->get('email'))->first();
        $user = User::where('email', $request->get('email'))->first();
        if(isset($user)){
            $user -> password = Hash::make($code);
            $user->save();
            $details = "Your code:".$code;
            //Mail::to($request->get('email'))->send(new Forget($mailData));
            \Mail::to($request->get('email'))->send(new SendMail($details));
            return redirect('confirm');
        }
        return back();
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
