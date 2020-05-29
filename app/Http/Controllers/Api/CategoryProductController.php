<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\CategoryProduct;

class CategoryProductController extends Controller
{
    //
    public function add($name){
        try
        {
            $category = new CategoryProduct();
            $category->name = $name;
            $category->save();
            
            return response()->json(['status' => true, 
                'message'=> 'Category Product Created',
                'body'=> $category],
                200);
        }
        catch(\Exception $e)
        {
            return response()->json(['status' => false,
                'message'=> 'Hubo un error',
                'body' => $e->getMessage()],
                500);
        }
    }
}
