<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileSekolahRequest;
use App\Models\ProfileSekolah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ProfileSekolah::first();

        return view('admin.profileSekolah.index', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileSekolah  $profileSekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileSekolah $profileSekolah)
    {
        return view('admin.profileSekolah.edit', compact('profileSekolah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfileSekolah  $profileSekolah
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileSekolahRequest $request, ProfileSekolah $profileSekolah)
    {
        $profileSekolah->update($request->all());

        return redirect()->route('profile-sekolah.index')->with('success', 'Profile Sekolah Berhasil Diperbarui!');
    }
}
