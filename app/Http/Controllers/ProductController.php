<?php

namespace App\Http\Controllers;

use App\Helpers\ControllerHelper;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Services\ImageUploadService;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    protected ImageUploadService $imageUploadService;

    public function __construct(ImageUploadService $imageUploadService)
    {
        $this->imageUploadService = $imageUploadService;
    }
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Product::query()->latest();
             return datatables()->of($query)
                 ->addColumn('actions', function ($product) {
                     return view('cms.product.partials.actions', compact('product'))->render();
                 })
                 ->addColumn('checkbox', function ($row) {
                     return '<input class="form-check-input" type="checkbox"  id="select-all"  data-kt-check-target="#kt_ecommerce_attribute_table .form-check-input" value="1" data-id="'.$row->id.'">';
                 })
                 ->addColumn('partials', function ($product) {
                     return view('cms.product.partials.partials', compact('product'))->render();
                 })
                 ->editColumn('name', function ($product) {
                     return $product->name;
                 })
                 ->editColumn('sku', function ($product) {
                     return $product->sku ?? '-';
                 })
                 ->editColumn('quantity', function ($product) {
                     return $product->quantity ?? '-';
                 })
                 ->editColumn('price', function ($product) {
                     return $product->price ?? '-';
                 })
                 ->editColumn('status', function ($product) {
                     if ($product->status == 'published') {
                         return '<div class="badge badge-light-primary">'. trans('dashboard_trans.Published') .'</div>';
                     } elseif($product->status == 'draft') {
                         return '<div class="badge badge-light-info">'. trans('dashboard_trans.Draft') .'</div>';
                     }else{
                         return '<div class="badge badge-light-danger">'. trans('dashboard_trans.Unpublished') .'</div>';
                     }
                 })
                 ->rawColumns(['actions','checkbox','partials','status'])
                 ->make(true);
        }
        return view('cms.product.index');

    }


    public function getCategoriesData(Request $request)
    {
        $search = $request->input('q', '');
        $page = $request->input('page', 1);

        $categoriesQuery = Category::query()->where('name', 'like', "%{$search}%")
        ->where('status','active');

        $categories = $categoriesQuery->latest()->paginate(10);

        $formattedCategories = $categories->items();

        return response()->json([
            'data' => $formattedCategories,
            'current_page' => $categories->currentPage(),
            'last_page' => $categories->lastPage(),
        ]);
    }

    public function getTagsData(Request $request)
    {
        $search = $request->input('q', '');
        $page = $request->input('page', 1);

        $tagsQuery = Tag::query()->where('name', 'like', "%{$search}%");

        $tags = $tagsQuery->paginate(10);

        return response()->json([
            'data' => $tags->items(),
            'current_page' => $tags->currentPage(),
            'last_page' => $tags->lastPage(),
        ]);
    }
    public function getAttributesData(Request $request)
    {
        $search = $request->input('q', '');
        $page = $request->input('page', 1);

        $attributesQuery = Attribute::query()->where('name', 'like', "%{$search}%");

        $attributes = $attributesQuery->paginate(10);

        return response()->json([
            'data' => $attributes->items(),
            'current_page' => $attributes->currentPage(),
            'last_page' => $attributes->lastPage(),
        ]);
    }
    public function create()
    {

        return view('cms.product.create');
    }

    public function store(ProductRequest $request,ImageUploadService $imageUploadService)
    {
        $request->validated();

        $data = $request->only([
            'name', 'description', 'price', 'status', 'user_id', 'slug', 'quantity', 'SKU', 'tax_type', 'vat_amount', 'discount_type', 'discounted_price'
        ]);

        $data['user_id'] = auth()->check() ? auth()->user()->id : null;

        $request->status = $request->input('status') === 'draft' ? 'draft' : ($request->has('status') ? 'published' : 'unpublished');

        $thumbnail = $this->imageUploadService->upload($request,'thumbnail','images/products');
        $data['thumbnail'] = $thumbnail;

        $product = Product::query()->create($data);

        if ($request->has('tag_id')) {
            $product->tags()->attach($request->tag_id);
        }

        if ($request->has('category_id')) {
            $product->categories()->attach($request->category_id);
        }
        if ($request->has('attribute_id')) {
            $product->attributes()->attach($request->attribute_id);
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

        // Clear the session
        session()->forget('uploaded_files');

        if ($request->has('tag_id')) {
            $product->tags()->sync($request->tag_id);
        }

        if ($request->has('category_id')) {
            $product->categories()->sync($request->category_id);
        }

        if ($request->has('attribute_id')) {
            $product->attributes()->sync($request->attribute_id);
        }



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
            if ($product->thumbnail) {
                $imagePath = public_path('storage/' . $product->thumbnail);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
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
