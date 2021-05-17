<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use \App\Http\Resources\VPet as VPetResource;
use \App\Models\VPet;

class User extends JsonResource
{
    public static $wrap = 'user';

    public function toArray($request): array
    {
        $userid = $this->id;
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'pets' => VPetResource::collection(
                VPet::where('userId',$this->id)->get()
            ),
        ];
    }
}
