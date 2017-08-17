<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{


    public function password()
    {
        return view('users.change_password');
    }
    public function update(ChangPasswordRequest $request)
    {
        if(Hash::check($request->get('old_password'),Auth::user()->password)){
            Auth::user()->password = bcrypt($request->get('password'));
            Auth::user()->save();
            flash('修改密码成功','success');
            return back();
        }
        flash('修改密码失败','danger');
        return back();
    }
}
