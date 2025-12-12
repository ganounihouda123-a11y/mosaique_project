<?php

namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
     public function index() {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create() {
        return view('users.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6',
            'role'=>'required|in:admin,commercial,controleur',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
        ]);

        return redirect()->route('users.index')->with('success');
    }

    public function edit(User $user) {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user) {
        $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email,'.$user->id,
            'password'=>'nullable|min:6',
             'role' => 'required|in:admin,commercial,controleur',

        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('users.index')->with('success');
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('users.index')->with('success');
    }

     public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,commercial,controleur',
        ]);

        $user->update(['role' => $request->role]);

        return back()->with('success');
    }
}
