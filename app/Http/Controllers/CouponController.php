<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::query()->get();
        return view('cms.coupon.index', compact('coupons'));

    }

    public function create()
    {
        $products = Product::query()->with('categories')->latest()->get();
        return view('cms.coupon.create',compact('products'));

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code'  =>'required|string',
            'description.*'  =>'nullable|string',
            'discount_value'  =>'nullable|integer',
            'discount_type' =>'in:percentage,fixed',
            'times_used' =>'numeric',
            'max_used' =>'numeric',
            'start_date' =>'string',
            'end_date' =>'string',
            'status' =>'in:active,inactive',
            'product' =>'required|exists:products'

        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'text' => trans('dashboard_trans.Please correct the highlighted errors and try again'),
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'icon'=>'error',
            ], 422);
        }

        $data = $request->only([
            'code', 'description', 'discount_value', 'discount_type', 'times_used', 'max_used','start_date', 'end_date', 'status',
        ]);


        $data['status'] = $request->input('status') == 'active' ? 'active' : 'inactive';

        $coupon = Coupon::query()->create($data);

        $coupon->products()->attach($request->product);

        if ($coupon) {
            return response()->json([
                'icon' => 'success',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Coupon created successfully'),
            ]);

        }else{
            return response()->json([
                'icon' => 'error',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Failed to create coupon'),
            ]);
        }
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $coupon = Coupon::query()->findOrFail($id);
        return view('cms.coupon.edit', compact('coupon'));

    }

    public function update(Request $request, $id)
    {
        $request->request->add(['id'=>$id]);

        $validator = Validator::make($request->all(),[
            'code'  =>'required|string',
            'description.*'  =>'nullable|string',
            'discount_value'  =>'nullable|integer',
            'discount_type' =>'in:percentage,fixed',
            'times_used' =>'numeric',
            'max_used' =>'numeric',
            'start_date' =>'string',
            'end_date' =>'string',
            'status' =>'in:active,inactive',
            'product' =>'required|exists:products'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'text' => trans('dashboard_trans.Please correct the highlighted errors and try again'),
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'icon'=>'error',
            ], 422);
        }

        $coupon = Coupon::query()->findOrFail($id);

        $data = $request->only([
            'code', 'description', 'discount_value', 'discount_type', 'times_used', 'max_used','start_date', 'end_date', 'status',
        ]);


        $data['status'] = $request->input('status') == 'active' ? 'active' : 'inactive';

        $isUpdated = $coupon->update($data);

        $coupon->products()->sync($request->product);

        if ($isUpdated) {
            return response()->json([
                'icon' => 'success',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Coupon updated successfully'),
            ]);

        }else{
            return response()->json([
                'icon' => 'error',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Failed to update coupon'),
            ]);
        }
    }

    public function destroy($id)
    {
        $coupon = Coupon::query()->findOrFail($id);
        $isDeleted = $coupon->delete();
        if ($isDeleted){
            return response()->json([
                'icon' => 'success',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Coupon deleted successfully'),
            ]);
        }else{
            return response()->json([
                'icon' => 'error',
                'confirmButtonText'=>trans('dashboard_trans.Ok, got it!'),
                'text' => trans('dashboard_trans.Failed to delete coupon'),
            ]);
        }
    }
}
