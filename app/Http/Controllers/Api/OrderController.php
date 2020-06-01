<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Order;

class OrderController extends Controller
{
    //
    public function add(Request $request){
        try
        {
            $order = new Order();
            $order->quantity = $request->quantity;
            $order->idStore = $request->idStore;
            $order->idProduct = $request->idProduct;
            $order->idState = $request->idState;
            $order->idUser = $request->idUser;
            $order->save();
            
            return response()->json(['status' => true, 
                'message'=> 'Order Created',
                'body'=> $order],
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
