<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class jadpelres extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
        'hari'  => $this->hari,
        'jam_mulai'  => $this->jam_mulai,
        'jam_selesai'  => $this->jam_selesai,
    ];
    }
}
