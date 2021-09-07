<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiswaRequest;
use App\Mail\SendMail;
use App\Models\Kelas;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Paginator::useBootstrap();

        $search = $request->search;

        if ($search) {
            $data = Siswa::with('kelas', 'province', 'regency', 'district', 'village')->where('nis', 'like', '%' . $search . '%')->orWhere('nama_lengkap', 'like', '%' . $search . '%')->orderBy('nama_lengkap', 'asc')->paginate(10);
        } else {
            $data = Siswa::with('kelas', 'province', 'regency', 'district', 'village')->latest()->paginate(10);
        }

        return view('admin.siswa.index', compact('data'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::pluck('name', 'id');
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();

        return view('admin.siswa.create', compact('provinces', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiswaRequest $request)
    {

        $check = DB::table('users')->where('email', $request->email)->first();

        if ($check) {
            return redirect()->route('siswa.create')->with('error', 'Email sudah pernah didaftarkan!');
        } else {
            DB::transaction(function () use ($request) {
                $siswa = Siswa::create($request->all());

                $user = User::create([
                    'name' => $request->nama_lengkap,
                    'email' => $request->email,
                    'password' => bcrypt($request->nis),
                    'siswa_id' => $siswa->id
                ]);

                $user->assignRole('siswa');

                $data = [
                    'name' => $request->nama_lengkap,
                    'email' => $request->email,
                    'password' => $request->nis,
                    'website' => config('app.url')
                ];

                Mail::to($request->email)->send(new SendMail($data));
            });

            return redirect()->route('siswa.index')->with('success', 'Siswa Berhasil Dibuat!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        $provinces = Province::pluck('name', 'id');
        $kelas = Kelas::orderBy('nama_kelas', 'asc')->get();

        return view('admin.siswa.edit', compact('siswa', 'provinces', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $check = DB::table('users')->where('email', $request->email)->first();

        if ($check) {
            return redirect()->back()->with('error', 'Email sudah pernah didaftarkan!');
        } else {
            DB::transaction(function () use ($request, $siswa) {
                $siswa->update($request->all());

                User::where('siswa_id', $siswa->id)->delete();

                $user = User::create([
                    'name' => $request->nama_lengkap,
                    'email' => $request->email,
                    'password' => bcrypt($request->nis),
                    'siswa_id' => $siswa->id
                ]);

                $user->assignRole('siswa');
            });

            return redirect()->route('siswa.index')->with('success', 'Siswa Berhasil Diperbarui!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        DB::transaction(function () use ($siswa) {
            User::where('siswa_id', $siswa->id)->delete();

            $siswa->delete();
        });

        return redirect()->route('siswa.index')->with('success', 'Siswa Berhasil Dihapus!');
    }
}
