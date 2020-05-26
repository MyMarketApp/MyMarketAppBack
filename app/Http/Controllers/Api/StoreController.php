<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Store;

class StoreController extends Controller
{
    public function add(Request $request){
        try
        {
            $store = new Store();
            $store->name = $request->name;
            $store->direction = $request->direction;
            $store->imageUrl = $request->imageUrl;
            $store->coordinate = json_encode($request->coordinate);
            $store->save();
            
            return response()->json(['status' => true, 
                'message'=> 'Store Created',
                'body'=> $store],
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

    public function all(){
        try
        {
            $stores = Store::all();
            foreach ($stores as $store){ 
                $store->coordinate = json_decode($store->coordinate);
                }
            return response()->json(['status' => true, 
                'message'=> 'Stores Found',
                'body'=> $stores],
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
