<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\ImageUploadService;
use http\Env\Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected ImageUploadService $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }
    public function index()
    {
        $categories = Category::query()->with('products')->get();
        return view('cms.category.index',compact('categories'));
    }

    public function create()
    {
        return view('cms.category.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'parent_id'    => 'nullable|int',
            'name.*'       => 'required|string',
            'description.*'  => 'nullable|string',
            'image'        => 'nullable|image',
            'status'       => 'required|in:active,inactive',
            'slug'         => 'nullable|string|unique:categories',
        ]);
        $data = $request->only([
            'parent_id' , 'name', 'description' , 'image' , 'status' , 'slug'
        ]);

        $image = $this->imageUploadService->upload($request, 'image', 'images/categories');
        $data['image'] = $image;

        $data['status'] = $request->has('status') ? 'active' : 'inactive';

        $is_Saved = Category::query()->create($data);


        if ($is_Saved){
            return response()->json([
                'icon' => 'success',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Category created successfully'),
            ]);
        }else{
            return response()->json([
                'icon' => 'error',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Failed to create category!'),
            ]);
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $category = Category::query()->findOrFail($id);
        return view('cms.category.edit',compact('category'));

    }

    public function update(Request $request, $id)
    {
        $request->request->add(['id'=>$id]);

        $request->validate([
            'parent_id'    => 'nullable|int',
            'name.*'         => 'required|string',
            'description.*'  => 'nullable|string',
            'image'        => 'image',
            'status'       => 'in:active,inactive',
            'slug'         => 'nullable|string|unique:categories',
        ]);

        $data = $request->only([
            'parent_id' , 'name', 'description' ,'image' , 'status' , 'slug'
        ]);

        $data['status'] = $request->has('status') ? 'active' : 'inactive';

        $image = $this->imageUploadService->upload($request, 'image', 'images/categories');
        $data['image'] = $image;

        $isUpdated = Category::query()->find($id)->update($data);

        if ($isUpdated){
            return response()->json([
                'icon' => 'success',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Category updated successfully'),
            ]);
        }else{
            return response()->json([
                'icon' => 'success',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Failed to update category!'),
            ]);
        }

    }

    public function destroy($id)
    {
        $isDeleted = Category::destroy($id);
        if ($isDeleted){
            return response()->json([
                'confirmButtonText' => trans('dashboard_trans.Ok, got it!'),
                'icon' => 'success',
                'text' => trans('dashboard_trans.Category Deleted Successfully'),
            ]);
        }else{
            return response()->json([
            'confirmButtonText' => trans('dashboard_trans.Ok, got it!'),
            'icon' => 'error',
            'text' => trans('dashboard_trans.Failed to delete this category!'),
        ]);

        }

    }

}
