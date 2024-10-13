<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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

        $data = $this->getData($request);
        $data['password'] = Hash::make($request->password);
        $is_Saved = User::query()->create($data);

        if ($is_Saved){
            notify()->success(trans('dashboard_trans.User created successfully'));
        }else{
            notify()->error(trans('dashboard_trans.Failed to create user'));
        }
        return redirect()->back();
    }

    public function show($id)
    {
        $user = User::query()->findOrFail($id);
        $roles = Role::query()->get();
        return view('cms.user.show',compact('user','roles'));
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $request->request->add(['id'=>$id]);

        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|min:3|max:200,name,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'password'         => ['current_password:user',Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()
            ],
            'user_name' => 'required|string|min:3|max:15|not_regex:[!@#$%^&*()]|unique:users,user_name,'.$id,
            'phone_number'  => 'required|numeric',
            'gender'  => 'required|in:male,female',
            'role_id'  => 'int|exists:roles,id',
            'status'  => 'in:on',
            'avatar'  => 'nullable|image',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $this->getData($request);

        $is_Updated = User::query()->find($id)->update($data);

        if ($is_Updated){
//            notify()->success(trans('dashboard_trans.User Updated successfully'));
            return response()->json([
                'icon' => 'success',
                'confirmButtonText'=>'Ok, got it!',
                'text' => trans('dashboard_trans.User Updated successfully'),
            ]);
        }else{
//            notify()->error(trans('dashboard_trans.Failed to update this user!'));
            return response()->json(['error' => 'Something went wrong'], 500);

        }
//        return redirect()->back();

    }

    public function destroy($id)
    {
        $is_Deleted = User::destroy($id);
        if ($is_Deleted){
            return response()->json([
                'title'=>'success',
                'icon'=>'success',
                'text'=>trans('dashboard_trans.User deleted successfully'),
            ]);

        }else{
            return response()->json([
                'title'=>'error',
                'icon'=>'error',
                'text'=>trans('dashboard_trans.Failed to delete this user!'),

            ]);
        }
    }


    public function getData(Request $request)
    {
        $data = $request->only([
            'name', 'email', 'phone_number', 'user_name', 'gender', 'role_id', 'avatar'
        ]);


        $data['status'] = $request->has('status') ? 'active' : 'inactive';

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $imageName = time() . '_' . $data['name'] . '.' . $image->getClientOriginalExtension();
            $image->move('images/users', $imageName);
            $data['avatar'] = $imageName;
        }
        return $data;
    }

    public function updateEmail(Request $request,$id){

        $request->request->add(['id'=>$id]);

        $is_Updated =  User::find($id);

        $is_Updated->Update([
            'email'=>$request->email,
        ]);
        if ($is_Updated){
            return response()->json([
                'icon' => 'success',
                'confirmButtonText'=>'Ok, got it!',
                'text' => trans('dashboard_trans.Email Updated Successfully'),
            ]);
        }else{
            notify()->error(trans('dashboard_trans.Failed to update email'));
        }
        return redirect()->back();
    }
    public function updatePassword(Request $request,$id){

        $request->request->add(['id'=>$id]);
        $request->validate([
            'password'         => ['required',Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()
            ],
            'current_password'         => ['required','current_password:user',Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()
            ],
            'confirm_password'         => ['required','confirmed:password',Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()
            ],

        ]);

        $is_Updated =  User::find($id);

        $is_Updated->Update([
            'password'=>$request->password,
        ]);
        if ($is_Updated){
            return response()->json([
                'icon' => 'success',
                'confirmButtonText'=>'Ok, got it!',
                'text' => trans('dashboard_trans.Password Updated Successfully'),
            ]);
        }else{
            return response()->json([
                'icon' => 'error',
                'confirmButtonText'=>'Ok, got it!',
                'text' => trans('dashboard_trans.Failed to update password'),
            ]);
        }
    }
    public function updateRole(Request $request,$id){

        $request->request->add(['id'=>$id]);

        $is_Updated =  User::find($id);

        $is_Updated->Update([
            'role_id' => $request->role_id,
        ]);
        if ($is_Updated){
            notify()->success(trans('dashboard_trans.Email Updated Successfully'));
        }else{
            notify()->error(trans('dashboard_trans.Failed to update email'));
        }
        return redirect()->back();
    }
}
