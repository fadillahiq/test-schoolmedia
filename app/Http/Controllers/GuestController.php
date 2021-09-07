<?php

namespace App\Http\Controllers;

use App\Http\Requests\SiswaRequest;
use App\Mail\SendMail;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Kelas;
use App\Models\ProfileSekolah;
use App\Models\Province;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class GuestController extends Controller
{
    public function index()
    {
        $data['jumlah_siswa'] = Siswa::count();
        $data['profile'] = ProfileSekolah::first();
        $data['berita'] = Berita::orderBy('created_at', 'desc')->limit(6)->get();
        $data['galeri'] = Galeri::orderBy('created_at', 'desc')->limit(6)->get();
        return view('welcome', compact('data'));
    }

    public function galeri()
    {
        Paginator::useBootstrap();
        $data = Galeri::latest()->paginate(10);

        return view('guest.galeri.index', compact('data'));
    }

    public function berita()
    {
        Paginator::useBootstrap();
        $data = Berita::latest()->paginate(10);

        return view('guest.berita.index', compact('data'));
    }

    public function beritaDetail($slug)
    {
        $data = Berita::where('slug', $slug)->first();

        return view('guest.berita.detail', compact('data'));
    }

    public function registerSiswa()
    {
        $provinces = Province::pluck('name', 'id');
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();

        return view('guest.siswa.index', compact('provinces', 'kelas'));
    }

    public function registerSiswaPost(SiswaRequest $request)
    {
        $check = DB::table('users')->where('email', $request->email)->first();

        if ($check) {
            return redirect()->route('siswa.create')->with('error', 'Email sudah pernah didaftarkan!');
        } else {
            DB::transaction(function () use ($request) {
                $siswa = Siswa::create($request->all());

                User::create([
                    'name' => $request->nama_lengkap,
                    'email' => $request->email,
                    'password' => bcrypt($request->nis),
                    'siswa_id' => $siswa->id
                ]);

                $data = [
                    'name' => $request->nama_lengkap,
                    'email' => $request->email,
                    'password' => $request->nis,
                    'website' => config('app.url')
                ];

                Mail::to($request->email)->send(new SendMail($data));
            });

            return redirect()->route('login')->with('success', 'Data berhasil didaftarkan, silahkan cek email untuk login!');
        }
    }
}
