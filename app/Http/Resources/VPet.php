<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VPet extends JsonResource
{
    public static $wrap = 'vpet';

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'userId' => $this->userId,
            'name' => $this->name,
            'skin' => $this->skin,
            'state' => $this->state,
            'health' => $this->health,
            'hunger' => $this->hunger,
            'happiness' => $this->happiness,
            'lastScene' => $this->lastScene,
            'referenceTime' => $this->referenceTime,

        ];
    }
}
