<?php

namespace App\Http\Controllers;

use App\Helpers\ControllerHelper;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'comment'=>'nullable|string',
            'product_id'=>'required|integer|exists:products,id',
            'user_id'=>'required|integer|exists:users,id',
            'rating'=>'required|integer|between:1,5'
        ]);

        if ($validator->fails()){
            return ControllerHelper::generateResponse($validator->errors(),'error',trans('dashboard_trans.Please correct the highlighted errors and try again'),422);
        }

        $product = Product::find($id);

        $data = $request->only(['comment','product_id','user_id','rating']);

        $data['product_id'] = $product->id;
        $data['user_id'] = Auth::user()->id;

        $isSaved = Comment::create($data);

        if($isSaved){
            return ControllerHelper::generateResponse('','success',trans('dashboard_trans.Comment and rating added successfully'),200);
        }else{
            return ControllerHelper::generateResponse('','error',trans('dashboard_trans.Something went wrong'),500);
        }

    }

    public function destroy($id){
        $comment   = Comment::find($id);

        $isDeleted =  $comment->delete();

        if ($isDeleted){
            return ControllerHelper::generateResponse('','success',trans('dashboard_trans.Comment deleted successfully'),200);

        }else{
            return ControllerHelper::generateResponse('','error',trans('dashboard_trans.Something went wrong'),500);
        }
    }

}
