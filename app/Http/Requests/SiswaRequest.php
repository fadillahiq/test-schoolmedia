<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
            'nis' => ['required', 'numeric', 'unique:siswa,nis,'.$this->siswa],
            'nama_lengkap' => ['required', 'string', 'max:64'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:siswa,email,'.$this->siswa],
            'jenis_kelamin' => ['required', 'string', 'max:12'],
            'agama' => ['required', 'string', 'max:24'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'rt' => ['required', 'numeric'],
            'rw' => ['required', 'numeric'],
            'no_rumah' => ['required', 'numeric'],
            'province_id' => ['required', 'integer'],
            'regency_id' => ['required', 'integer'],
            'district_id' => ['required', 'integer'],
            'village_id' => ['required', 'integer'],
            'kode_pos' => ['required', 'numeric'],
            'jalan' => ['required', 'max:300', 'string'],
            'no_hp' => ['required', 'string', 'max:14'],
        ];
    }
}
