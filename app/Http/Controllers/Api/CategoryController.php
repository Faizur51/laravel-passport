<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){

    	return response()->json([

          'status'=>true,

           'data'=>Category::all()
    	]);
    }




    public function show($id){

    	return response()->json([

          'status'=>true,

           'data'=>Category::find($id)
    	]);
    }
}
