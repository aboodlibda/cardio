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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Category::query()->latest();

            return datatables()->of($query)
                ->addColumn('actions', function ($row) {
                    return view('cms.category.partials.actions', compact('row'))->render();
                })
                ->addColumn('checkbox', function ($row) {
                    return '<input class="form-check-input" type="checkbox"  id="select-all"  data-kt-check-target="#kt_ecommerce_attribute_table .form-check-input" value="1" data-id="'.$row->id.'">';
                })
                ->addColumn('image', function ($row) {
                    return view('cms.category.partials.image', compact('row'))->render();
                })
                ->editColumn('name',function($row){
                    return $row->name;
                })
                ->editColumn('status', function ($row) {
                    if ($row->status == 'active') {
                        return '<div class="badge badge-success">'. trans('dashboard_trans.Active') .'</div>';
                    } else {
                        return '<div class="badge badge-danger">'. trans('dashboard_trans.Inactive') .'</div>';
                    }
                })
                ->rawColumns(['actions','checkbox','image', 'status'])
                ->make(true);
        }
        return view('cms.category.index');
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

        $request->status = $request->input('status') === 'active' ? 'active' : ($request->has('status') ? 'active' : 'inactive');

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

        $category = Category::query()->findOrFail($id);

        $data = $request->only([
            'parent_id' , 'name', 'description' ,'image' , 'status' , 'slug'
        ]);

        $request->status = $request->input('status') === 'active' ? 'active' : ($request->has('status') ? 'active' : 'inactive');

        if ($request->has('image')) {
            if ($category->image) {
                $imagePath = public_path('storage/'.$category->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $image = $this->imageUploadService->upload($request, 'image', 'images/categories');
            $data['image'] = $image;

        }else{
            $data['image'] = $category->image;
        }


        $isUpdated = $category->update($data);

        if ($isUpdated){
            return ControllerHelper::generateResponse('success', trans('dashboard_trans.Category updated successfully'),200);
        }else{
            return ControllerHelper::generateResponse('error', trans('dashboard_trans.Failed to update category!'),500);
        }

    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $image    = $category->image;

        if ($image){
            $imagePath = public_path('storage/'.$image);
            if (file_exists($imagePath)){
                unlink($imagePath);
            }
        }
        $isDeleted = $category->delete();

        if ($isDeleted){
            return ControllerHelper::generateResponse('success', trans('dashboard_trans.Category Deleted Successfully'),200);
        }else{
            return ControllerHelper::generateResponse('error', trans('dashboard_trans.Failed to delete this category!'),500);
        }

    }

}
