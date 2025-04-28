<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function login(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $req->email)->first();

        if (!$user || !Hash::check($req->password, $user->password)) {
            return back()->with('error', 'Username or password is incorrect');
        }

        $req->session()->put('user', $user);
        return redirect('/')->with('success', 'Logged in successfully');
    }

    public function register(Request $req)
{
    $req->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6'
    ]);

    $user = new User;
    $user->name = $req->name;
    $user->email = $req->email;
    $user->password = Hash::make($req->password);
    $user->save();

    // Automatically log in the user
    $req->session()->put('user', $user);

    return redirect('/')->with('success', 'Registration successful and logged in');
}

}
