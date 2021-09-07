@extends('layouts.admin')

@section('title', 'Profile Sekolah')

@section('header')
    <h1>Profile Sekolah</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Profile Sekolah</h4>
                </div>
                <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="nama_sekolah">Nama Sekolah</label>
                                <input id="nama_sekolah" class="form-control" type="text"
                                    name="nama_kelas" value="{{ $data->nama_sekolah }}" readonly>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="tahun_berdiri">Tahun Berdiri</label>
                                <input id="tahun_berdiri" class="form-control" type="date"
                                    name="nama_kelas" value="{{ $data->tahun_berdiri }}" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="nss">NSS</label>
                                <input id="nss" class="form-control" type="number"
                                    name="nss" value="{{ $data->nss }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="nis">NIS</label>
                                <input id="nis" class="form-control" type="number"
                                    name="nis" value="{{ $data->nis }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="npsn">NPSN</label>
                                <input id="npsn" class="form-control" type="number"
                                    name="npsn" value="{{ $data->npsn }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="iso">ISO</label>
                                <input id="iso" class="form-control" type="string"
                                    name="iso" value="{{ $data->iso }}" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="provinsi">Provinsi</label>
                                <input id="provinsi" class="form-control" type="text"
                                    name="provinsi" value="{{ $data->provinsi }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="kota">Kota/Kabupaten</label>
                                <input id="kota" class="form-control" type="text"
                                    name="kota" value="{{ $data->kota }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="kecamatan">Kecamatan</label>
                                <input id="kecamatan" class="form-control" type="text"
                                    name="kecamatan" value="{{ $data->kecamatan }}" readonly>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="kelurahan">Kelurahan/Desa</label>
                                <input id="kelurahan" class="form-control" type="text"
                                    name="kelurahan" value="{{ $data->kelurahan }}" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="no_telepon">No Telepon</label>
                                <input id="no_telepon" class="form-control" type="string"
                                    name="no_telepon" value="{{ $data->no_telepon }}" readonly>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" type="email"
                                    name="email" value="{{ $data->email }}" readonly>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="website">Website</label>
                                <input id="website" class="form-control" type="text"
                                    name="website" value="{{ $data->website }}" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" readonly>{{ $data->alamat }}</textarea>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('profile-sekolah.edit', $data->id) }}" class="btn btn-warning btn-md">Ubah</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
