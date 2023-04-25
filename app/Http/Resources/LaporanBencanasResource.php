<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LaporanBencanasResource extends JsonResource
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
                'jenis_bencana' => $this->jenis_bencana,
                'nama_bencana' => $this->nama_bencana,
                'lokasi' => $this->lokasi,
                'gambar' => $this->gambar,
                'keterangan' => $this->keterangan,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ],
            'relationships' => [
                'user' => [
                    'user_id' => $this->user->id,
                    'user_name' => $this->user->name,
                    'user_email' => $this->user->email
                ],
                'status_penanggulangan' => new StatusPenanggulangansResource($this->whenLoaded('status_penanggulangan')),
                'korban' => new KorbansResource($this->whenLoaded('korban')),
                'kerusakan' => KerusakansResource::collection($this->whenLoaded('kerusakan')),
            ]
        ];
    }
}
