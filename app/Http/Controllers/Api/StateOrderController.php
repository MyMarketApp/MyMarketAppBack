<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\StateOrder;

class StateOrderController extends Controller
{
    //
    public function add($name){
        try
        {
            $state = new StateOrder();
            $state->name = $name;
            $state->save();
            
            return response()->json(['status' => true, 
                'message'=> 'State Order Created',
                'body'=> $state],
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
            $states = StateOrder::all();
            
            return response()->json(['status' => true, 
                'message'=> 'States Order Found',
                'body'=> $states],
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
