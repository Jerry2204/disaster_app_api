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
                'korban' => [
                    'meninggal' => $this->korban->meninggal,
                    'luka_berat' => $this->korban->luka_berat,
                    'luka_ringan' => $this->korban->luka_ringan,
                    'hilang' => $this->korban->hilang
                ],
                'status_penanggulangan' => [
                    'petugas' => $this->status_penanggulangan->petugas,
                    'keterangan' => $this->status_penanggulangan->keterangan,
                    'tindakan' => $this->status_penanggulangan->tindakan,
                    'status' => $this->status_penanggulangan->status
                ]
            ]
        ];
    }
}
