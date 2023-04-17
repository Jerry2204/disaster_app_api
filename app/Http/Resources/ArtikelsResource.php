<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArtikelsResource extends JsonResource
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
            'id' => (string)$this->id,
            'attributes' => [
                'judul' => $this->judul,
                'deskripsi' => $this->deskripsi,
                'gambar' => $this->gambar
            ],
            'relationship' => [
                'user_id' => $this->user->id,
                'user_name' => $this->user->name,
                'user_email' => $this->user->email
            ]
        ];
    }
}

