<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->with('role')->get();
        $roles = Role::query()->get();
        return view('cms.user.index',compact('users','roles'));

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
//        dd($request);
        $request->validate([
            'name'  => 'required|string|min:3|max:200',
            'email' => 'required|email|unique:users',
            'password'         => ['required',Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()
                ],
            'user_name' => 'required|string|min:3|max:15|not_regex:[!@#$%^&*()]|unique:users',
            'phone_number'  => 'required|numeric',
            'gender'  => 'required|in:male,female',
            'role_id'  => 'required|int|exists:roles,id',
            'status'  => 'required|in:on',
            'avatar'  => 'nullable|image',
          ]);

        $data = $request->only([
            'name' , 'email' , 'phone_number', 'user_name', 'gender', 'role_id' ,'avatar'
        ]);

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $imageName = time() . '_' . $data['user_name'] . '.' . $image->getClientOriginalExtension();
            $image->move('images/users', $imageName);
            $data['avatar'] = $imageName;
        }


        $data['password'] = Hash::make($request->password);
        $data['status'] = $request->has('status') ? 'active' : 'inactive';


        $is_Saved = User::query()->create($data);

        if ($is_Saved){
            notify()->success(trans('dashboard_trans.User created successfully'));
            return redirect()->back();
        }else{
            notify()->error(trans('dashboard_trans.Failed to create user'));
            return redirect()->back();

        }
    }

    public function show($id)
    {
        $user = User::query()->findOrFail($id);
        return view('cms.user.show',compact('user'));
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $request->request->add(['id'=>$id]);
        $request->validate([
            'name'  => 'required|string|min:3|max:200,name,'.$id,
            'email' => 'required|email|unique:users,'.$id,
            'password'         => ['required',Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()
            ],
            'user_name' => 'required|string|min:3|max:15|not_regex:[!@#$%^&*()]|unique:users,'.$id,
            'phone_number'  => 'required|numeric,phone_number,'.$id,
            'gender'  => 'required|in:male,female',
            'role_id'  => 'required|int|exists:roles,id',
            'status'  => 'required|in:on',
            'avatar'  => 'nullable|image',
        ]);

        $data = $request->only([
            'name' , 'email' , 'phone_number', 'user_name', 'gender', 'role_id' ,'avatar'
        ]);

        $is_Updated = User::query()->find($id)->update($data);
        if ($is_Updated){
            notify()->success(trans('dashboard_trans.User Updated successfully'));
        }

    }

    public function destroy($id)
    {
    }
}
