<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAPIController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $this->validate($request, ['email' => 'required', 'password' => 'required']);

        if(strpos($credentials['email'], '@mail.ch')){
            return redirect()->back();
        }

        $user = User::whereEmail($credentials['email'])->get()->first();

        if($user && $user->password == $credentials['password']){
            Auth::login($user);
            return redirect('/products');
        }

        return redirect()->back();
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
