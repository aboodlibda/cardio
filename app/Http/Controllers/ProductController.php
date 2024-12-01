<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
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
        $tags = Tag::query()->latest()->get(['id','name']);
        return view('cms.product.create',compact('categories','tags'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title.*'       => 'required|string|min:3|max:100',
            'description.*' => 'nullable|string',
            'price'       => 'required|integer|numeric',
            'status'      => 'in:published,unpublished,draft',
            'user_id'     => 'required|int|exists:users,id',
            'slug'        => 'required|string',
            'quantity'    => 'required|numeric',
            'SKU'         => 'required|string|min:5|max:30',
            'category_id' => 'required|int|exists:categories,id',
            'discount_type'=>'required|in:no_discount,percentage,fixed_price',
            'tax_type'     =>'required|in:free,taxable_goods,downloadable_product',
            'vat_amount'   =>'required|numeric',
            'images'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = $request->only([
            'title' , 'description' , 'price' , 'status' , 'user_id' , 'slug' , 'quantity' , 'SKU'
        ]);

        $data['user_id'] = auth()->user()->id;

        $data['status'] = $request->input('status') === 'draft' ? 'draft' : ($request->has('status') ? 'published' : 'unpublished');

        $image = $this->imageUploadService->upload($request, 'image', 'images/products');
        $data['image'] = $image;

        $product = Product::query()->create($data);

        $product->categories()->attach($request->category_id);

        if ($product){
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

    public function uploadImage(Request $request)
    {
        // Validate if the file is an image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240' // max size 10MB
        ]);

        // Upload the image using the imageUploadService
        $imagePath = $this->imageUploadService->uploadImages($request, 'image', 'images/products');

        // Return a response with the path to the uploaded image
        return response()->json([
            'path' => $imagePath,
            'message' => 'Image uploaded successfully'
        ]);
    }
}
