<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::query()->withCount('products')->latest()->get();
        return view('cms.tag.index',compact('tags'));

    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name.*' => 'required|string|min:3|max:55',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'text' => trans('dashboard_trans.Please correct the highlighted errors and try again'),
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'icon'=>'error',
            ], 422);
        }

        $data = $request->only(['name']);

        $isSaved = Tag::query()->create($data);

        if ($isSaved) {
            return response()->json([

                'title' => trans('dashboard_trans.Success'),
                'icon' => 'success',
                'confirmButtonText' => trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Tag Created Successfully'),
            ]);
        } else {
            return response()->json([
                'title' => trans('dashboard_trans.Error'),
                'icon' => 'error',
                'confirmButtonText' => trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Failed to Create Tag'),
            ]);
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
        $request->request->add(['id' => $id]);

        $validator = Validator::make($request->all(), [
            'id'=>'required|integer|exists:tags,id',
            'name.*' => 'required|string|min:3|max:55',
        ]);

        $tag = Tag::query()->findOrFail($id);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'text' => trans('dashboard_trans.Please correct the highlighted errors and try again'),
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'icon'=>'error',
            ], 422);
        }

        $data = $request->only(['name']);

        $isUpdated = $tag->update($data);

        if ($isUpdated) {
            return response()->json([
                'title' => trans('dashboard_trans.Success'),
                'icon' => 'success',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Tag Updated Successfully'),
            ]);
        } else {
            return response()->json([
                'title' => trans('dashboard_trans.Error'),
                'icon' => 'error',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Failed to Update Tag'),
            ]);
        }
    }

    public function destroy($id)
    {
        $tag = Tag::query()->findOrFail($id);
        $isDeleted = $tag->delete();
        if ($isDeleted) {
            return response()->json([
                'icon' =>'success',
                'text' => trans('dashboard_trans.Tag Deleted Successfully'),
                'title' => 'success',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),

            ]);
        }else{
            return response()->json([
                'icon' =>'error',
                'text' => trans('dashboard_trans.Failed to Delete Tag'),
                'title' => 'error',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),

            ]);
        }
    }
}
