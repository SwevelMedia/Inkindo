<?php

namespace App\Http\Resources\home\keanggotaan;

use Illuminate\Http\Resources\Json\JsonResource;

class DaftarAnggotaResource extends JsonResource
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
            'id' => $this->id,
            'logo' => $this->logo,
            'perusahaan' => $this->perusahaan,
            'alamat' => $this->alamat,
            'email'=> $this->user->email,
            'kualifikasi' => $this->kualifikasi,
        ];
    }
}
