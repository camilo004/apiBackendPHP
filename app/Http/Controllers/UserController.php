<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }
    public function findAll()
    {
    $users = User::with('roles')->get();
    return response()->json(['users' => $users], 200);
    }
   
    public function store(Request $request)
    {
        $user = User::create($request->all());

        if ($request->has('roles')) {
            $user->roles()->sync($request->input('roles'));
        }

        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = User::with('roles')->find($id);
    
        $response = [
            'id' => $user->id,
            'name' => $user->nombre,
            'apellido' => $user->apellido,
            'edad' =>  $user->edad,
            'role' => $user->roles()->first()->nombre
        ];
        
        return response()->json($response);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        if ($request->has('roles')) {
            $user->roles()->sync($request->input('roles'));
        }

        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json("has borrado correctamente");
    }

    public function assignRole($userId, $roleId)
{
    $user = User::find($userId);
    $role = Role::find($roleId);
    
    $user->roles()->attach($role);
    $user->save();
    
    return response()->json([
        'message' => 'El rol se ha asignado correctamente al usuario.'
    ]);
}



}
