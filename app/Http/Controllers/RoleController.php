<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Role as RoleResource;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    //
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|unique:roles|max:10',
            'guard_name' =>'required',
        ]);

        
        $name = $request['name'];
        $guard_name = $request['guard_name'];

        $role = new Role();
        $role->name = $name;
        $role->guard_name = $guard_name;
        $role->save();
        //
        return response()->json($role, 201);
    }
    //
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());
        return response()->json($role, 200);
    }
    //
    public function index()
    {
        return RoleResource::collection(Role::all());
    }
    //
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return response()->json($role, 200);
    }
    public function destroy(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return response()->json(null, 204);
    }
}
//