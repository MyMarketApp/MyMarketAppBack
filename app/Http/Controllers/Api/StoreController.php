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

    public function all(Request $request){
        try
        {
            $stores = Store::all();

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
