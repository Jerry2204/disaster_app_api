<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRawanBencanaRequest extends FormRequest
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
            'nama_wilayah' => ['required'],
            'koordinat_lattitude' => ['required'],
            'koordinat_longitude' => ['required'],
            'jenis_rawan_bencana' => ['required'],
            'level_rawan_bencana' => ['required']
        ];
    }
}
