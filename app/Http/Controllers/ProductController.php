<?php

namespace App\Http\Controllers;

use App\Helpers\ControllerHelper;
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
        $products = Product::query()->with(['categories','tags','variants','images','coupons','orderItems'])->latest()->get();
        return view('cms.product.index',compact('products'));

    }

    public function create()
    {
        $categories = Category::query()->get();
        $tags = Tag::query()->latest()->get(['id','name']);
        return view('cms.product.create',compact('categories','tags'));
    }



    // Adjusted store method to handle image uploading
    public function store(Request $request,ImageUploadService $imageUploadService)
    {
        $validator = Validator::make($request->all(), [
            'name.*'          => 'required|string|min:3|max:100',
            'description.*'   => 'nullable|string',
            'price'           => 'required|integer|numeric',
            'status'          => 'required|in:published,unpublished,draft',
            'slug'            => 'required|string|unique:products,slug',
            'quantity'        => 'required|numeric',
            'SKU'             => 'required|string|min:5|max:30',
            'category_id'     => 'required|int|exists:categories,id',
            'discount_type'   => 'required|in:no_discount,percentage,fixed_price',
            'tax_type'        => 'required|in:free,taxable_goods,downloadable_product',
            'vat_amount'      => 'nullable|numeric',
            'discounted_price'=> 'nullable|numeric',
            'images.*'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'tag_id'          => 'nullable|string|exists:tags,id',
        ]);

        if ($validator->fails()) {
            return ControllerHelper::generateResponse($validator->errors(), 'error', trans('dashboard_trans.Please correct the highlighted errors and try again'), 422);
        }

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
            return ControllerHelper::generateResponse('', 'success', trans('dashboard_trans.Product created successfully'), 201);
        } else {
            return ControllerHelper::generateResponse('', 'error', trans('dashboard_trans.Failed to create product'), 500);
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

    public function update(Request $request, $id, ImageUploadService $imageUploadService)
    {
        $request->request->add(['id' => $request->$id]);

        $validator = Validator::make($request->all(),[
            'id'            =>'required|int|exists:products,id',
            'name.*'        => 'required|string|min:3|max:100',
            'description.*' => 'nullable|string',
            'price'         => 'required|integer|numeric',
            'status'        => 'in:published,unpublished,draft',
//            'user_id'     => 'required|int|exists:users,id',
            'slug'          => 'required|string|unique:products,slug',
            'quantity'      => 'required|numeric',
            'SKU'           => 'required|string|min:5|max:30',
            'category_id'   => 'required|int|exists:categories,id',
            'discount_type'    => 'required|in:no_discount,percentage,fixed_price',
            'tax_type'         => 'required|in:free,taxable_goods,downloadable_product',
            'vat_amount'       => 'nullable|numeric',
            'discounted_price' => 'nullable|numeric',
            'images.*'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($validator->fails()) {
            return ControllerHelper::generateResponse($validator->errors(), 'error', trans('dashboard_trans.Please correct the highlighted errors and try again'),422);
        }
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
            return ControllerHelper::generateResponse('','success',trans('dashboard_trans.Product updated successfully'),200);
        }else{
            return ControllerHelper::generateResponse('','error',trans('dashboard_trans.Failed to update product'),500);

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

            return ControllerHelper::generateResponse('','success',trans('dashboard_trans.Product deleted successfully'),201);
        }
        return ControllerHelper::generateResponse('','error',trans('dashboard_trans.Failed to delete this product'),500);
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
