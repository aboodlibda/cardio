<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        return view('cms.coupon.index');

    }

    public function create()
    {
        return view('cms.coupon.create');

    }

    public function store(Request $request)
    {
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
