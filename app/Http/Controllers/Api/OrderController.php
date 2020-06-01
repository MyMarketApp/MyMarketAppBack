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
            $previousOrder = Order::where('idStore',$request->idStore)
                        ->where('idProduct',$request->idProduct)
                        ->where('idState',$request->idState)
                        ->where('idUser',$request->idUser)->first();

            if($previousOrder)
            {
                $previousOrder->quantity += $request->quantity;
                $previousOrder->save();
                return response()->json(['status' => true, 
                'message'=> 'Order Updated',
                'body'=> $previousOrder],
                200);
            }
            else
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
            
            
        }
        catch(\Exception $e)
        {
            return response()->json(['status' => false,
                'message'=> 'Hubo un error',
                'body' => $e->getMessage()],
                500);
        }
    }

    public function delete($id){
        try
        {
            $order = Order::where('id',$id)->first();
            $order->delete();
            return response()->json(['status' => true, 
            'message'=> 'Order deleted',
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
