<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Product;

class ProductController extends Controller
{
    //
    public function add(Request $request){
        try
        {
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->idCategory = $request->idCategory;
            $product->imageUrl = $request->imageUrl;
            $product->save();

            foreach($request->stores as $store)
            {
                $product->stores()->attach($store['id'],['quantity' => $store['quantity']]);
                $product->save();
            }
            
            return response()->json(['status' => true, 
                'message'=> 'Product Created',
                'body'=> $product],
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
