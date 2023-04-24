<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show(UserRepository $userRepo)
    {
        $user = $userRepo->find(Auth::id());

        return view('profile.show', ['user' => $user]);
    }

    public function edit()
    {
        return view('profile.update');
    }

    public function update(Request $request, UserRepository $userRepo)
    {
        $user_id = Auth::id();
        $user = $userRepo->find($user_id);
        $user->name = $request->input('name');
        $user->save();

        Storage::delete('public/img/avatars/'.$user_id.'.png');

        $photo = $request->file('photo');
        $filename = $user_id . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('img/avatars'), $filename);
    
        return redirect()->action([UserController::class, 'show'])->with('success','Updated');


    }

}
