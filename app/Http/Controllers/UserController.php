<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\User as UserResource;
use App\Models\User;
use App\Models\VPet;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::all());
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);
        
        $request->merge([
            'password' => Hash::make($request->password
        )]);

        $user = User::create($request->all());

        return response()->json([
            "message" => "user registered successfully",
            "id" => $user->id
          ], 201);

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $user = User::firstWhere('email',$request->email);

        if ($user != null) {
            $match = Hash::check($request->password, $user->password);
                        
            $msg = $match ? "logged in" : "invalid password";
            $statusCode = $match ? 202 : 401;
            
            return response()->json([
                "message" => $msg,
                "id" => $user->id
            ], $statusCode);
        }
        else {
            return response()->json([
                "message" => "unregistered email"
            ], 404);
        }


        return response()->json([
            "message" => "user registered successfully"
          ], 201);

    }

    public function show($id)
    {
        if (User::where('id', $id)->exists()) {
            return new UserResource(User::find($id));
        }
        else
        {
            return response()->json([
                "message" => "user not found"
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);

            $user->name = is_null($request->name) ? $user->name : $request->name;
            $user->email = is_null($request->email) ? $user->email : $request->email;
            $user->save();

            return response()->json([
                "message" => "user updated successfully"
            ], 200);
        }
        else {
            return response()->json([
                "message" => "user not found"
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->delete();

            return response()->json([
                "message" => "user deleted"
            ], 202);
        }
        else {
            return response()->json([
                "message" => "user not found"
            ], 404);
        }
    }
}
