<?php

namespace App\Http\Controllers;

use App\Helpers\ControllerHelper;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\ImageUploadService;
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

    public function store(CategoryRequest $request)
    {
        $request->validated();
        $data = $request->only([
            'parent_id' , 'name', 'description' , 'image' , 'status' , 'slug'
        ]);

        $image = $this->imageUploadService->upload($request, 'image', 'images/categories');
        $data['image'] = $image;

        $data['status'] = $request->has('status') ? 'active' : 'inactive';

        $is_Saved = Category::query()->create($data);


        if ($is_Saved){
            return ControllerHelper::generateResponse('success',   trans('dashboard_trans.Category created successfully'),200);
        }else{
            return ControllerHelper::generateResponse('error',   trans('dashboard_trans.Failed to create category!'),500);
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

    public function update(CategoryRequest $request, $id)
    {
        $request->request->add(['id'=>$id]);

        $request->validated();

        $data = $request->only([
            'parent_id' , 'name', 'description' ,'image' , 'status' , 'slug'
        ]);

        $data['status'] = $request->has('status') ? 'active' : 'inactive';

        $image = $this->imageUploadService->upload($request, 'image', 'images/categories');
        $data['image'] = $image;

        $isUpdated = Category::query()->find($id)->update($data);

        if ($isUpdated){
            return ControllerHelper::generateResponse('success', trans('dashboard_trans.Category updated successfully'),200);
        }else{
            return ControllerHelper::generateResponse('error', trans('dashboard_trans.Failed to update category!'),500);
        }

    }

    public function destroy($id)
    {
        $isDeleted = Category::destroy($id);

        if ($isDeleted){
            return ControllerHelper::generateResponse('success', trans('dashboard_trans.Category Deleted Successfully'),200);
        }else{
            return ControllerHelper::generateResponse('error', trans('dashboard_trans.Failed to delete this category!'),500);
        }

    }

}
