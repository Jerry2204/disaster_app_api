<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RawanBencanasResource extends JsonResource
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
                'nama_wilayah' => $this->nama_wilayah,
                'koordinat_lattitude' => $this->koordinat_lattitude,
                'koordinat_longitude' => $this->koordinat_longitude,
                'jenis_rawan_bencana' => $this->jenis_rawan_bencana,
                'level_rawan_bencana' => $this->level_rawan_bencana,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'user_id' => $this->user->id,
            'user_name' => $this->user->name,
            'user_email' => $this->user->email
        ];
    }
}
