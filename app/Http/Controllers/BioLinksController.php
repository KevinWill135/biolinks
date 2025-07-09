<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BioLinksController extends Controller
{
    public function __invoke(User $user)
    {
        //$user = User::whereHandler($handler)->firstOrFail();
        //dd($user);

        return view('bio-links', compact('user'));
    }
}
