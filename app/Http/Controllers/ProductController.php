<?php

namespace App\Http\Controllers;

use App\Helpers\ControllerHelper;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    protected ImageUploadService $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }
    public function index()
    {
        $products = Product::query()->with(['categories','tags','variants','images','coupons','orderItems'])->latest()->get();
        return view('cms.product.index',compact('products'));

    }

    public function create()
    {
        $categories = Category::query()->get();
        $tags = Tag::query()->latest()->get(['id','name']);
        return view('cms.product.create',compact('categories','tags'));
    }

    public function store(ProductRequest $request,ImageUploadService $imageUploadService)
    {
        $request->validated();

        $data = $request->only([
            'name', 'description', 'price', 'status', 'user_id', 'slug', 'quantity', 'SKU', 'tax_type', 'vat_amount', 'discount_type', 'discounted_price'
        ]);

        $data['user_id'] = auth()->check() ? auth()->user()->id : null;

        $request->status = $request->input('status') === 'draft' ? 'draft' : ($request->has('status') ? 'published' : 'unpublished');


        $product = Product::query()->create($data);

        if ($request->has('tag_id')) {
            $product->tags()->attach($request->tag_id);
        }

        if ($request->has('category_id')) {
            $product->categories()->attach($request->category_id);
        }

        // Move images from temporary storage to permanent directory
        $uploadedFiles = session()->get('uploaded_files', []);
        $savedImages = $imageUploadService->moveImages($uploadedFiles,'images/products');

        foreach ($savedImages as $imagePath) {
            $product->images()->create([
                'product_id' => $product->id,
                'image' => $imagePath,
            ]);
        }

        // Clear the session
        session()->forget('uploaded_files');

        if ($product) {
            return ControllerHelper::generateResponse('success', trans('dashboard_trans.Product created successfully'), 201);
        } else {
            return ControllerHelper::generateResponse( 'error', trans('dashboard_trans.Failed to create product'), 500);
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $product = Product::query()->findOrFail($id);
        $categories = Category::query()->get();
        $tags = Tag::query()->latest()->get(['id','name']);
        return view('cms.product.edit',compact('product','categories','tags'));
    }

    public function update(ProductRequest $request, $id, ImageUploadService $imageUploadService)
    {
        $request->request->add(['id' => $request->$id]);

        $request->validated();

        $product = Product::query()->findOrFail($id);

        $data = $request->only([
            'name' , 'description' , 'price' , 'status' , 'user_id' , 'slug' , 'quantity' , 'SKU','tax_type','vat_amount','discount_type','discounted_price'
        ]);

        $data['user_id'] = auth()->check() ? auth()->user()->id : null;


        $data['status'] = $request->input('status') === 'draft' ? 'draft' : ($request->has('status') ? 'published' : 'unpublished');


        $isUpdated = $product->update($data);

        // Move images from temporary storage to permanent directory
        $uploadedFiles = session()->get('uploaded_files', []);
        $savedImages = $imageUploadService->moveImages($uploadedFiles,'images/products');

        foreach ($savedImages as $imagePath) {
            $product->images()->create([
                'product_id' => $product->id,
                'image' => $imagePath,
            ]);
        }


        if ($request->has('tag_id')) {
            $product->tags()->sync($request->tag_id);
        }

        if ($request->has('category_id')) {
            $product->categories()->sync($request->category_id);
        }

        // Clear the session
        session()->forget('uploaded_files');

        if ($isUpdated){
            return ControllerHelper::generateResponse('success',trans('dashboard_trans.Product updated successfully'),200);
        }else{
            return ControllerHelper::generateResponse('error',trans('dashboard_trans.Failed to update product'),500);

        }
    }

    public function destroy($id)
    {
        $product = Product::query()->find($id);

        if ($product) {
            foreach ($product->images as $image) {
                if ($image) {
                    $imagePath = public_path('storage/' . $image->image);
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
            }

            $product->delete();

            return ControllerHelper::generateResponse('success',trans('dashboard_trans.Product deleted successfully'),201);
        }
        return ControllerHelper::generateResponse('error',trans('dashboard_trans.Failed to delete this product'),500);
    }

    public function storeMedia(Request $request, ImageUploadService $imageUploadService)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('images');

        if (!$file) {
            return response()->json(['error' => 'No file uploaded.'], 400);
        }

        $name = uniqid() . '_' . trim($file->hashName());
        $file->move($path, $name);

        // Store the file path in the session (or database)
        $uploadedFiles = session()->get('uploaded_files', []);
        $uploadedFiles[] = $name; // Store the filename
        session()->put('uploaded_files', $uploadedFiles);

        return response()->json([
            'name' => $name,
            'original_name' => $file->hashName(),
        ]);
    }
}
