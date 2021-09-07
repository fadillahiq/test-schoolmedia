<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileSekolahRequest extends FormRequest
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
            'nama_sekolah' => ['required', 'string', 'max:255'],
            'nss' => ['required', 'numeric'],
            'nis' => ['required', 'numeric'],
            'npsn' => ['required', 'numeric'],
            'iso' => ['required', 'string', 'max:255'],
            'tahun_berdiri' => ['required', 'date'],
            'alamat' => ['required', 'max:300'],
            'provinsi' => ['required', 'max:255'],
            'kota' => ['required', 'max:255'],
            'kecamatan' => ['required', 'max:255'],
            'kelurahan' => ['required', 'max:255'],
            'no_telepon' => ['required', 'string'],
            'email' => ['required', 'email', 'string', 'max:255'],
            'website' => ['required', 'string', 'max:255'],
        ];
    }
}
