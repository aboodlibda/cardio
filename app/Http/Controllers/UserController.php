<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Services\ImageUploadService;



class UserController extends Controller
{
    protected ImageUploadService $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }

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
        $validator = Validator::make($request->all(), [
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
            'status'  => 'in:on',
            'avatar'  => 'nullable|image',
          ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $data = $request->only([
            'name', 'email', 'phone_number', 'user_name', 'gender', 'role_id',
        ]);


        $data['status'] = $request->has('status') ? 'active' : 'inactive';
        $data['password'] = Hash::make($request->password);

        $avatar = $this->imageUploadService->upload($request, 'avatar', 'images/users');
        $data['avatar'] = $avatar;

        $is_Saved = User::query()->create($data);

        if ($is_Saved){
            return response()->json([
                'icon' => 'success',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.User created successfully'),
            ]);
        }else{
            return response()->json([
                'icon' => 'error',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Failed to create user'),
            ]);
        }
    }

    public function show($id)
    {
        $user = User::query()->with(['role','sessions'])->findOrFail($id);
        $roles = Role::query()->get();
        return view('cms.user.show',compact('user','roles'));
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        $request->request->add(['id' => $id]);

        // Validation
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:200,name,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => ['current_password:user', Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised()
            ],
            'user_name' => 'required|string|min:3|max:15|not_regex:[!@#$%^&*()]|unique:users,user_name,' . $id,
            'phone_number' => 'required|numeric',
            'gender' => 'required|in:male,female',
            'role_id' => 'int|exists:roles,id',
            'status' => 'in:on',
            'avatar' => 'nullable|image',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::findOrFail($id);

        $data = $request->only([
            'name', 'email', 'phone_number', 'user_name', 'gender', 'role_id',
        ]);

        $data['status'] = $request->has('status') ? 'active' : 'inactive';


        if ($user) {
            if ($request->hasFile('avatar')) {
                // إذا كان هناك صورة جديدة، احذف القديمة وقم بتحديث الصورة
                if ($user->avatar) {
                    $imagePath = public_path('storage/' . $user->avatar);
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
                $avatar = $this->imageUploadService->upload($request, 'avatar', 'images/users');
                $data['avatar'] = $avatar;
            } else {
                // احتفظ بالصورة القديمة في حالة عدم تحميل صورة جديدة
                $data['avatar'] = $user->avatar;
            }
        }


        $isUpdated = $user->update($data);

        if ($isUpdated) {
            return response()->json([
                'icon' => 'success',
                'confirmButtonText' => trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.User Updated successfully'),
            ]);
        } else {
            return response()->json([
                'icon' => 'error',
                'confirmButtonText' => trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Failed to update this user!'),
            ]);
        }
    }


    public function destroy($id)
    {
        $user = User::find($id);
        if ($user){
            $avatar = $user->avatar;
            if ($avatar){
                $imagePath = public_path('storage/' . $avatar);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }
        $is_Deleted = $user->delete();

        if ($is_Deleted){
            return response()->json([
                'confirmButtonText' => trans('dashboard_trans.Ok, got it!'),
                'icon'=>'success',
                'text'=>trans('dashboard_trans.User deleted successfully'),
            ]);

        }else{
            return response()->json([
                'confirmButtonText' => trans('dashboard_trans.Ok, got it!'),
                'icon'=>'error',
                'text'=>trans('dashboard_trans.Failed to delete this user!'),

            ]);
        }
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
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Email Updated Successfully'),
            ]);
        }else{
            return response()->json([
                'icon' => 'error',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Failed to update email'),
            ]);
        }
    }


    public function updatePassword(Request $request,$id){

        $request->request->add(['id'=>$id]);
        $validator = Validator::make($request->all(), [
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
            'confirm_password'         => ['required','confirmed:password',],

        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $is_Updated =  User::find($id);

        $is_Updated->Update([
            'password'=>$request->password,
        ]);
        if ($is_Updated){
            return response()->json([
                'icon' => 'success',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Password Updated Successfully'),
            ]);
        }else{
            return response()->json([
                'icon' => 'error',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Failed to update password'),
            ]);
        }
    }

    public function updateRole(Request $request,$id){

        $request->request->add(['id'=>$id]);
        $validator = Validator::make($request->all(), [
            'role_id'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $is_Updated =  User::find($id);

        $is_Updated->Update([
            'role_id' => $request->role_id,
        ]);
        if ($is_Updated){
            return response()->json([
                'icon' => 'success',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Role updated successfully'),
            ]);
        }else{
            return response()->json([
                'icon' => 'error',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Failed to updated role!'),
            ]);
        }

    }
}
