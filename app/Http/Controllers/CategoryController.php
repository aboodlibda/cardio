<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('cms.category.index');
    }

    public function create()
    {
        return view('cms.category.create');

    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        return view('cms.category.edit');

    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
