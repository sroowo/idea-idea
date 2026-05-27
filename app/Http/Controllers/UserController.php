<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index',[
            'users'=> $users
        ]);

    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string','max:255'],
            'email'=>['required','string','max:255','unique:users'],
            'password'=>['required','confirmed',Password::default()],

        ]);
        $user=User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password)
        ]);
        return redirect('/users');
    }
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
        ]);
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>['required','string'],
            'email'=>['required','email'],
        ] );
        $user->update([
            'name' => $request->name,
            'email'=> $request->email,
        ]);
        return redirect('/users');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return(redirect('/users'));
    }
    
}
