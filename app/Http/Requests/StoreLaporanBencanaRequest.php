<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLaporanBencanaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'jenis_bencana' => ['required'],
            'nama_bencana' => ['required'],
            'keterangan' => ['required'],
            'file' => [''],
            'desa_id' => ['required'],
            'kecamatan_id' => ['required']
        ];
    }
}
