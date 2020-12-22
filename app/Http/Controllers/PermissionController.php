<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all(); //
        $permissions = Permission::all(); // 获取所有权限
        
        return view('home.permission.index', ['roles' => $roles, 'permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*验证 name 和 permissions 字段
        $this->validate($request, [
            'name'=>'required|unique:roles|max:10',
            'permissions' =>'required',
        ]);
        */
        echo($request);
        $name = $request['name'];
        $guard_name = $request['guard_name'];
        $role = new Role();
        $role->name = $name;
        $role->guard_name = $guard_name;

        $role->save();

        
        
        //$permissions = $request['permissions'];

        //
        /* 遍历选择的权限
        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail(); 
            // 获取新创建的角色并分配权限
            $role = Role::where('name', '=', $name)->first(); 
            $role->givePermissionTo($p);
        }
        redirect()->route('permission.index')->with('flash_message', 'Role'. $role->name.' added!')
        */
        return ; 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
