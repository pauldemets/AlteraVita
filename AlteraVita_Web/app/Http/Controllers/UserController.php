<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show($id)
    {
        return view('user.user', ['user' => User::findOrFail($id)]);
    }

    public function showUserProfile()
    {
        return view('user.userProfile', ['user' => User::findOrFail(Auth::id())]);
    }

    public function editUser()
    {
        return view('user.editUser', ['user' => Auth::user()]);
    }

    public function send(Request $request)
    {
        User::where('id_utilisateur', Auth::id())->update($request->except(['_token']));
        return redirect()->route('userProfile', ['id' => Auth::id()]);
    }
}
