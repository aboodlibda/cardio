<?php

namespace App\Http\Controllers;

use App\Helpers\ControllerHelper;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Attribute::query()->latest();

            return datatables()->of($query)
                ->addColumn('actions', function ($row) {
                    return view('cms.attributes.partials.actions', compact('row'))->render();
                })
                ->addColumn('checkbox', function ($row) {
                    return '<input class="form-check-input" type="checkbox"  id="select-all"  data-kt-check-target="#kt_ecommerce_attribute_table .form-check-input" value="1" data-id="'.$row->id.'">';
                })
                ->editColumn('name', function ($row) {
                    return $row->name;
                })
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('d/m/Y');
                })
                ->rawColumns(['actions', 'checkbox'])
                ->make(true);
        }
        return view('cms.attributes.index');

    }


//    public function test(Request $request)
//    {
//        if ($request->ajax()) {
//            $data = Attribute::latest()->get();
//            return Datatables::of($data)
//                ->addIndexColumn()
//                ->addColumn('action', function($row){
//                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a>
//                                  <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
//                    return $actionBtn;
//                })
//                ->rawColumns(['action'])
//                ->make(true);
//        }
//    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.attributes.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(AttributeRequest $request)
    {
        $request->validated();

        $data = $request->only(['name']);

        $isSaved = Attribute::create($data);

        if($isSaved){
            return ControllerHelper::generateResponse('success',trans('dashboard_trans.Attribute has been created successfully'),200);

        }else{
            return ControllerHelper::generateResponse('error',trans('dashboard_trans.Something went wrong'),500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attribute = Attribute::find($id);
        return view('cms.attributes.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttributeRequest $request, string $id)
    {
        $request->request->add(['id' => $id]);

        $request->validated([
            'id'=>'required|exists:attributes,id'
        ]);

        $attribute = Attribute::find($id);

        $data = $request->only(['name']);

        $isUpdated= $attribute->update($data);

        if($isUpdated){
            return ControllerHelper::generateResponse('success',trans('dashboard_trans.Attribute has been updated successfully'),200);

        }else{
            return ControllerHelper::generateResponse('error',trans('dashboard_trans.Something went wrong'),500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $isDeleted = Attribute::destroy($id);

        if($isDeleted){
            return ControllerHelper::generateResponse('success',trans('dashboard_trans.Attribute has been deleted successfully'),200);
        }else{
            return ControllerHelper::generateResponse('error',trans('dashboard_trans.Something went wrong'),500);
        }
    }
}
