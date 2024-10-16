<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    protected ImageUploadService $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }
    public function index()
    {
        $products = Product::query()->with(['categories','tags','variants','images','coupons','orderItems'])->get();
        return view('cms.product.index',compact('products'));

    }

    public function create()
    {
        $categories = Category::query()->get();
        return view('cms.product.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title'       => 'required|string|min:3|max:100',
            'description' => 'nullable|string',
            'price'       => 'required|integer|numeric',
            'status'      => 'in:published,unpublished,draft',
            'user_id'     => 'required|int|exists:users,id',
            'slug'        => 'required|string',
            'quantity'    => 'required|numeric',
            'SKU'         => 'required|string|min:5|max:30',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = $request->only([
            'title' , 'description' , 'price' , 'status' , 'user_id' , 'slug' , 'quantity' , 'SKU'
        ]);

        $avatar = $this->imageUploadService->upload($request, 'images', 'images/products');
        $data['images'] = $avatar;

        $is_Saved = Product::query()->create($data);

        if ($is_Saved){
            return response()->json([
                'icon' => 'success',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Product created successfully'),
            ]);
        }else{
            return response()->json([
                'icon' => 'error',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Failed to create product'),
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
    }

    public function destroy($id)
    {
    }
}
