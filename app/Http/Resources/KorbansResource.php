<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KorbansResource extends JsonResource
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
            'meninggal' => $this->meninggal,
            'luka_berat' => $this->luka_berat,
            'luka_ringan' => $this->luka_ringan,
            'hilang' => $this->hilang,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
