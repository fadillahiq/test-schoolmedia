@extends('layouts.admin')

@section('title', 'Ubah - Profile Sekolah')

@section('header')
    <h1>Profile Sekolah</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ubah Profile Sekolah</h4>
                    <div class="card-header-action">
                        <a href="{{ route('profile-sekolah.index') }}" class="btn btn-primary"><i
                                class="fas fa-chevron-left"></i> Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form id="ubahData" action="{{ route('profile-sekolah.update', $profileSekolah->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nama_sekolah">Nama Sekolah</label>
                                <input id="nama_sekolah" class="form-control" type="text" name="nama_sekolah"
                                    value="{{ $profileSekolah->nama_sekolah }}" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="tahun_berdiri">Tahun Berdiri</label>
                                <input id="tahun_berdiri" class="form-control" type="date" name="tahun_berdiri"
                                    value="{{ $profileSekolah->tahun_berdiri }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="nss">NSS</label>
                                <input id="nss" class="form-control" type="number" name="nss"
                                    value="{{ $profileSekolah->nss }}" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="nis">NIS</label>
                                <input id="nis" class="form-control" type="number" name="nis"
                                    value="{{ $profileSekolah->nis }}" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="npsn">NPSN</label>
                                <input id="npsn" class="form-control" type="number" name="npsn"
                                    value="{{ $profileSekolah->npsn }}" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="iso">ISO</label>
                                <input id="iso" class="form-control" type="string" name="iso"
                                    value="{{ $profileSekolah->iso }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="provinsi">Provinsi</label>
                                <input id="provinsi" class="form-control" type="text" name="provinsi"
                                    value="{{ $profileSekolah->provinsi }}" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="kota">Kota/Kabupaten</label>
                                <input id="kota" class="form-control" type="text" name="kota"
                                    value="{{ $profileSekolah->kota }}" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="kecamatan">Kecamatan</label>
                                <input id="kecamatan" class="form-control" type="text" name="kecamatan"
                                    value="{{ $profileSekolah->kecamatan }}" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="kelurahan">Kelurahan/Desa</label>
                                <input id="kelurahan" class="form-control" type="text" name="kelurahan"
                                    value="{{ $profileSekolah->kelurahan }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="no_telepon">No Telepon</label>
                                <input id="no_telepon" class="form-control" type="string" name="no_telepon"
                                    value="{{ $profileSekolah->no_telepon }}" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" type="email" name="email"
                                    value="{{ $profileSekolah->email }}" required>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="website">Website</label>
                                <input id="website" class="form-control" type="text" name="website"
                                    value="{{ $profileSekolah->website }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" required>{{ $profileSekolah->alamat }}</textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-warning btn-md" type="submit">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
