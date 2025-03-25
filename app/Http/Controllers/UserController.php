<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/login');
    }

    //
    public function login(Request $request){
        $login_user = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        //認証
        if(Auth::attempt($login_user)){
            $request->session()->regenerate();
            return redirect('/history');
        }else{
            return redirect('/login')->with('status','メールかパスワードが間違っています');
        }
    }
}
