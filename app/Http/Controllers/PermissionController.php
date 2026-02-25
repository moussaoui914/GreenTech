<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('name')->get();
        $roles = Role::all();
        
        $selectedRole = request('role_id') 
            ? Role::find(request('role_id'))
            : $roles->first();
        
        return view('permissions.index', compact('permissions', 'roles', 'selectedRole'));
    }

    public function assign(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'array'
        ]);
        
        $role = Role::find($request->role_id);
        $role->syncPermissions($request->permissions ?? []);
        
        return back()->with('success', 'Permissions mises à jour pour ' . $role->name);
    }
}