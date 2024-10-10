<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::query()->with(['users','permissions'])->get();
        return view('cms.user.role.index',compact('roles'));
    }

    public function create()
    {
        return view('cms.user.role.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'description'=>'nullable|string',
          ]);
        $data = $request->only(['name']);
        $is_saved = Role::query()->create($data);
        if ($is_saved){
            notify()->success(trans('dashboard_trans.Role created successfully'));
            return redirect()->back();
        }else{
            notify()->error(trans('dashboard_trans.Failed to create role!'));
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $role = Role::query()->with(['users','permissions'])->findOrFail($id);
        return view('cms.user.role.show',compact('role'));
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
