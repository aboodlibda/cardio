<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::query()->get();
        return view('cms.coupon.index', compact('coupons'));

    }

    public function create()
    {
        return view('cms.coupon.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'code'  =>'required|string',
            'description'  =>'nullable|string',
            'discount_value'  =>'nullable|integer',
            'discount_type' =>'in:percentage,fixed',
            'times_used' =>'numeric',
            'max_used' =>'numeric',
            'start_date' =>'string',
            'end_date' =>'string',
            'status' =>'in:active,inactive',

        ]);
        $data = $request->only([
            'code', 'description', 'discount_value', 'discount_type', 'times_used', 'max_used',
        ]);
        $data['status'] = $request->has('status') ? 'active' : 'inactive';

        $coupon = Coupon::query()->create($data);
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
        return view('cms.coupon.edit');

    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
