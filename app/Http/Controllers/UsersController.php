<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersController extends Controller
{
    public function login(Request $request) {
        $user = User::where(['email' => $request->email])->first();
        
        if($user || Hash::check($request->password, $user->password)) {
            $request->session()->put('user', $user);

            return redirect('/');
        } else {
            return 'Username or password is incorrect';
        }
    }
}
