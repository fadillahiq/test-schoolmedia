<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswa';
    protected $fillable = [
        'nis', 'nama_lengkap', 'email', 'jenis_kelamin', 'agama', 'tempat_lahir',
        'tanggal_lahir', 'rt', 'rw', 'no_rumah', 'province_id', 'regency_id', 'district_id',
        'village_id', 'kode_pos', 'jalan', 'no_hp', 'kelas_id', 'user_id'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'siswa_id');
    }

}
