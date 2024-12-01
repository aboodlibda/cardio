<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::query()->withCount('products')->latest()->get();
        return view('cms.tag.index',compact('tags'));

    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:55',
        ]);

        $data = $request->only(['name']);

        $isSaved = Tag::query()->create($data);

        if ($isSaved) {
            return response()->json([
                'success' => true,
                'title'=>'success',
                'icon'=>'success',
                'text'=>trans('dashboard_trans.Tag Created Successfully'),
            ]);
        }else{
            return response()->json([
                'title'=>'success',
                'icon'=>'success',
                'text'=>trans('dashboard_trans.Failed to Create Tag'),
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
