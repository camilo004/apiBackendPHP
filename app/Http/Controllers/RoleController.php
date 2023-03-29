<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return response()->json($roles, 200);
    }
   

    public function store(Request $request)
    {
        $role = new Role;
        $role->nombre = $request->input('nombre');
        $role->save();

        return response()->json($role, 201);
    }

    public function show($id)
    {
        $role = Role::find($id);

        if ($role) {
            return response()->json($role, 200);
        } else {
            return response()->json(['error' => 'Role not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        if ($role) {
            $role->nombre = $request->input('nombre');
            $role->save();
            return response()->json($role, 200);
        } else {
            return response()->json(['error' => 'Role not found'], 404);
        }
    }

    public function destroy($id)
    {
        $role = Role::find($id);

        if ($role) {
            $role->delete();
            return response()->json(['message' => 'Role deleted'], 200);
        } else {
            return response()->json(['error' => 'Role not found'], 404);
        }
    }
}
