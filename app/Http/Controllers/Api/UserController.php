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
            $user->lastName = $request->lastName;
            $user->phone = $request->phone;
            $user->adress = $request->adress;
            $user->coordinate = json_encode($request->coordinate);
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
            if($user)
            {
                $user->coordinate = json_decode($request->coordinate);
                return response()->json(['status' => true, 
                    'message'=> 'User Found',
                    'body'=> $user],
                    200);
            }
            else {
                return response()->json(['status' => false, 
                    'message'=> 'User Not Found',
                    'body'=> $user],
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
}
