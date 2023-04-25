<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KerusakansResource extends JsonResource
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
            'nama_infrastruktur' => $this->nama_infrastruktur,
            'rusak_berat' => $this->rusak_berat,
            'rusak_ringan' => $this->rusak_ringan
        ];
    }
}
