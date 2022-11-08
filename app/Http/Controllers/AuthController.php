<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{/**
     * @OA\Post(
     *     path="/api/registro",
     *     tags={"Token"},
     *     summary="Registrate",
     *     operationId="Register",
     *
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     @OA\RequestBody(
     *         description="Input data format",
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="name",
     *                     description="Enter your name",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="userName",
     *                     description="Enter your User Name",
     *                     type="userName"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     description="Enter your password",
     *                     type="password"
     *                 ),
     *
     *
     *                    @OA\Property(
     *                     property="password_confirmation",
     *                     description="Enter your password confirmation",
     *                     type="password"
     *                 ),
     *
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function Register(Request $request){


        $fields = $request->validate([
            'name'=>'required|string',
            'userName'=>'required|string|unique:users,userName',
            'password'=>'required|string',
        ]);

        $user = new User();
        $user->name = $fields['name'];
        $user->userName = $fields['userName'];
        $user->password = bcrypt($fields['password']);
        $user->save();
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'data'=>$user,
            'token'=>$token
        ];

        return response()->json($response);
    }





    /**
     * @OA\Post(
     *     path="/api/acceso",
     *     tags={"Token"},
     *     summary="Authentificate",
     *     operationId="Login",
     *
     *     @OA\Response(
     *         response=405,
     *         description="Invalid input"
     *     ),
     *     @OA\RequestBody(
     *         description="Input data format",
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="userName",
     *                     description="Enter your userName",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     description="Enter password",
     *                     type="password"
     *                 ),
     *
     *             )
     *         )
     *     )
     * )
     */
    public function Login(Request $request){
        $fields = $request->validate([
            'userName'=>'required',
            'password'=>'required'
        ]);
        $user = User::where('userName', $request->userName)->first();
        if(!$user||!Hash::check($fields['password'], $user->password)){
            return response()->json('password or login is incorrect');
        }
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'data'=>$user,
            'token'=>$token
        ];
        return response()->json($response);
    }
}

