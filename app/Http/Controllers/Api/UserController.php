<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\User;

class UserController extends Controller
{
    public function add(Request $request){
        try
        {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();
            
            return response()->json(['status' => true, 
                'message'=> 'User Created',
                'body'=> $user],
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

    public function get(Request $request){
        try
        {
            $user = User::where('email',$request->email)->first();

            return response()->json(['status' => true, 
                'message'=> 'User Found',
                'body'=> $user],
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
