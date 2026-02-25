<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showUserForm(){
        return view('UsersForm');
    }

    public function showUsers(){
        $users = User::all();
        $roles = Role::all();
        return view('UsersList', compact('users','roles'));
    } 

    public function store(Request $request){
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required|string',
        ]);

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('usersList.index')
            ->with('success', 'Utilisateur créé avec succès!');
    }

    public function destroy(int $id){
        User::destroy($id);
        return back()->with('success', 'Utilisateur supprimé avec succès!');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('editUser', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string',
            'password' => 'nullable|min:8|confirmed'
        ]);

        $data = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('usersList.index')
            ->with('success', 'Utilisateur modifié avec succès!');
    }
}