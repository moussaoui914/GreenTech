<?php
// RoleController.php (version ultra simple)

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function showRoleForm()
    {
        $roles = Role::all();
        return view('roleForm', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Role::create($request->all());
        return back()->with('success', 'Rôle ajouté');
    }

    public function destroy(int $id)
    {
        Role::destroy($id);
        return back()->with('success', 'Rôle supprimé');
    }


    public function assignRole(Request $request)
    {

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role'=>'required'
        ]);
        
        // dd($request->user_id);
        // dd($request->role);
         
        $user = User::find($request->user_id);
        
        // dd($user->id);
    // dd([$request->role]);
        $user->syncRoles( [$request->role]);
        
        return back()->with('success', 'Rôle affecté avec succès !');
    }
}