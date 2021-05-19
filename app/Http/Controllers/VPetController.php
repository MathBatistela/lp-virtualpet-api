<?php

namespace App\Http\Controllers;

use App\Models\VPet;
use App\Models\User;
use Illuminate\Http\Request;
use \App\Http\Resources\VPet as VPetResource;

class VPetController extends Controller
{

    public function index()
    {
        return VPetResource::collection(VPet::all());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'userId' => 'required'
        ]);

        $user = User::where('id', $request->userId);
        if ($user->exists()) {

            VPet::create([
                'userId' => $request->userId,
                'name' => $request->name,
                'skin' => $request->skin,
                'state' => $request->state,
                'health' => $request->health,
                'hunger' => $request->hunger,
                'energy' => $request->energy,
                'dirty' => $request->dirty,
                'happiness' => $request->happiness,
                'lastScene' => $request->lastScene,
                'referenceTime' => $request->referenceTime
            ]);
      
            return response()->json([
              "message" => "pet created"
            ], 201);
        }
        else {
            return response()->json([
                "message" => "pet user not found"
              ], 404);
        }

    }

    public function show($id)
    {
        if (VPet::where('id', $id)->exists()) {
            return new VPetResource(VPet::findOrFail($id));
        }
        else {
            return response()->json([
                "message" => "pet not found"
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        if (VPet::where('id', $id)->exists()) {
            $pet = VPet::find($id);

            $pet->name = is_null($request->name) ? $pet->name : $request->name;
            $pet->userId = is_null($request->userId) ? $pet->userId : $request->userId;
            $pet->lifeTime = is_null($request->lifeTime) ? $pet->lifeTime : $request->lifeTime;
            $pet->skin = is_null($request->skin) ? $pet->skin : $request->skin;
            $pet->state = is_null($request->state) ? $pet->state : $request->state;
            $pet->health = is_null($request->health) ? $pet->health : $request->health;
            $pet->happiness = is_null($request->happiness) ? $pet->happiness : $request->happiness;
            $pet->hunger = is_null($request->hunger) ? $pet->hunger : $request->hunger;
            $pet->energy = is_null($request->energy) ? $pet->energy : $request->energy;
            $pet->dirty = is_null($request->dirty) ? $pet->dirty : $request->dirty;
            $pet->lastScene = is_null($request->lastScene) ? $pet->lastScene : $request->lastScene;
            $pet->referenceTime = is_null($request->referenceTime) ? $pet->referenceTime : $request->referenceTime;
            $pet->save();

            return response()->json([
                "message" => "pet updated successfully"
            ], 200);
        }
        else {
            return response()->json([
                "message" => "pet not found"
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(VPet::where('id', $id)->exists()) {
            $pet = VPet::find($id);
            $pet->delete();

            return response()->json([
                "message" => "pet deleted"
            ], 202);
        }
        else {
            return response()->json([
                "message" => "pet not found"
            ], 404);
        }
    }
}
