<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MitigasiBencanasResource extends JsonResource
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
                'title' => $this->title,
                'deskripsi' => $this->deskripsi,
                'jenis_konten' => $this->jenis_konten,
                'file' => $this->file,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at
            ],
            'relationships' => [
                'user_id' => $this->user->id,
                'user_name' => $this->user->name,
                'user_email' => $this->user->email
            ]
        ];
    }
}
