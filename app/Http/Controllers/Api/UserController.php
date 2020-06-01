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
            $user->coordinates = json_encode($request->coordinates);
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

    public function login(Request $request){
        try
        {
            $user = User::where('email',$request->email)
                        ->where('password',$request->password)
                        ->with(['orders.product'])->first();
            if($user)
            {
                $user->coordinates = json_decode($request->coordinates);
                return response()->json(['status' => true, 
                    'message'=> 'Login Success',
                    'body'=> $user],
                    200);
            }
            else {
                return response()->json(['status' => false, 
                    'message'=> 'Login Fail',
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

    public function verify($email){
        try
        {
            $user = User::where('email',$email)->with(['orders.product'])->first();
            if($user)
            {
                $user->coordinates = json_decode($user->coordinates);
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

    public function update(Request $request){
        try
        {
            $user = User::where('email',$request->email)->first();
            $user->name = $request->name;
            $user->password = $request->password;
            $user->lastName = $request->lastName;
            $user->phone = $request->phone;
            $user->adress = $request->adress;
            $user->coordinates = json_encode($request->coordinates);
            $user->save();
            $user->coordinates = json_decode($user->coordinates);
            return response()->json(['status' => true, 
                'message'=> 'Update Success',
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
