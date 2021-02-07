<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('admin.users.index')->with('users',User::paginate(10));
    }

    public function edit($id){
        if(Auth::user()->id == $id){
            return redirect()->route('admin.users.index') -> with('warning','Вам не разрешено редактировать себя');
        }
        return view('admin.users.edit')->with(['user' => User::find($id),'roles' => Role::all()]);
    }

    public function update(Request $request, $id){
        if(Auth::user()->id == $id){
            return redirect()->route('admin.users.index') -> with('warning','Вам не разрешено редактировать себя');;
        }
        $user = User::find($id);
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.index') -> with('success',"Пользователь обновлен");
    }

    public function destroy($id){
        if(Auth::user()->id == $id){
            return redirect()->route('admin.users.index') -> with('warning','Вам не разрешено удалять себя');;
        }
        User::destroy($id);
        return redirect()->route('admin.users.index')->with('success',"Пользователь удален");
    }
}
