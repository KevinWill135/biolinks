<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {

        return view('profile', [
            'user' => Auth::user()
        ]);
    }

    public function update(ProfileRequest $request)
    {

        /** @var User $user */
        $user = Auth::user();

        //dd($file->store('photos'));

        $data = $request->validated();
        if ($file = $request->photo) {
            $data['photo'] = $file->store('photos');
        }

        //$user->fill($data['photo'])->save();


        $user->fill($data)->save();

        return back()->with('message', 'Perfil atualizado com sucesso!!');
    }
}
