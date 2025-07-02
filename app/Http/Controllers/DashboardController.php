<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        /**
         * @var User $user
         */

        $user = Auth::user();

        return view('dashboard', [
            'links' => $user->links
        ]);
    }
}
