<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login()
    {
        if ($user = User::query()->where('email', '=', request()->email)->first()) {

            if ($password = Hash::check(request()->password, $user->password)) {
                Auth::login($user);
                //dd($user);
                return to_route('dashboard');
            }
        }


        return back()->with(['message' => 'Página não encontrada']);

        //dd(request()->email);
    }
}
