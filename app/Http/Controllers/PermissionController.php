<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::query()->with('role')->get();
        $roles= Role::query()->with('users')->get();
        return view('cms.user.permission.index',compact('permissions','roles'));
    }

    public function create()
    {
        return view('cms.user.permission.create');

    }

    public function store(Request $request)
    {
        $request->validate([
           'role_id' => 'required|int|exists:roles,id',
           'name' => 'required|string',
           'permissions' => 'nullable',
        ]);
        $data = $request->only(['name','permissions','role_id']);

        $is_Saved = Permission::query()->create($data);

        if ($is_Saved){
            notify()->success(trans('dashboard_trans.Permissions created successfully'));
            return redirect()->back();
        }else{
            notify()->error(trans('dashboard_trans.Failed to create permissions!'));
            return redirect()->back();
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
