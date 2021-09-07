<?php

namespace Database\Seeders;

use App\Models\ProfileSekolah;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProfileSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile_sekolah')->insert([
            'nama_sekolah' => 'SMK Wikrama Bogor',
            'nss' => '321050401001',
            'nis' => '400030',
            'npsn' => '20503372',
            'iso' => '9001 : 2008',
            'tahun_berdiri' => Carbon::create('1980', '07', '10'),
            'alamat' => 'Jl. Raya Wangun',
            'provinsi' => 'Jawa Barat',
            'kota' => 'Bogor',
            'kecamatan' => 'Bogor Timur',
            'kelurahan' => 'Sindang Sari',
            'no_telepon' => '0251-8242411',
            'email' => 'prohumasi@smkwikrama.sch.id',
            'website' => 'https://smkwikrama.sch.id/'
        ]);
    }
}
