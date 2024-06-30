<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LeadsPublicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [            
                'nama' => $this->penanggung_jawab,
                'email' => $this->user->email,
                'phone' => $this->no_hp,          
                'category' => $this->logo,
                'institute' => $this->perusahaan,
            ];
    }
}
