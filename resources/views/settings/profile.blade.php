@extends('layouts.admin')

@section('title', 'Profile')

@section('header')
    <h1>Profile</h1>
@endsection

@section('content')
    <div class="section-body">
        <h2 class="section-title">Hi, {{ $user->name }}!</h2>
        <p class="section-lead">
            Change information about yourself on this page.
        </p>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img alt="image"
                            src="{{ $user->avatar ? asset('avatars/' . $user->avatar) : asset('stisla/assets/img/avatar/avatar-1.png') }}"
                            class="rounded-circle profile-widget-picture">
                    </div>
                    <div class="profile-widget-description">
                        <div class="profile-widget-name">{{ $user->name }} <div
                                class="text-muted d-inline font-weight-normal"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                            @role('siswa')
                            <div class="row mx-1">
                                <div class="form-group col-md-6">
                                    <label for="nis">NIS</label>
                                    <input id="nis" class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="nis"
                                        value="{{ old('nis') ?? $user->siswa->nis }}" required maxlength="32">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input id="nama_lengkap" class="form-control" type="text" name="nama_lengkap"
                                        value="{{ old('nama_lengkap') ?? $user->siswa->nama_lengkap }}" required
                                        maxlength="64">
                                </div>
                            </div>

                            <div class="row mx-1">
                                <div class="form-group col-md-6">
                                    <label for="kelas_id">Kelas</label>
                                    <select class="form-control select2" name="kelas_id" id="kelas_id" required>
                                        @foreach ($kelas as $kelas)
                                            <option value="{{ $kelas->id }}" @if ($user->siswa->kelas_id == $kelas->id) {{ 'selected' }} @endif>
                                                {{ $kelas->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input id="email" class="form-control" type="email" name="email"
                                        value="{{ old('email') ?? $user->siswa->email }}" required maxlength="255">
                                </div>
                            </div>

                            <div class="row mx-1">
                                <div class="form-group col-md-6">
                                    <label for="jenis_kelamin">Jenis kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                        <option value="Laki-Laki" @if ($user->siswa->jenis_kelamin == 'Laki-Laki') {{ 'selected' }} @endif>Laki-Laki</option>
                                        <option value="Perempuan" @if ($user->siswa->jenis_kelamin == 'Perempuan') {{ 'selected' }} @endif>Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="agama">Agama</label>
                                    <select class="form-control" name="agama" id="agama" required>
                                        <option value="Islam" @if ($user->siswa->agama == 'Islam') {{ 'selected' }} @endif>Islam</option>
                                        <option value="Protestan" @if ($user->siswa->agama == 'Protestan') {{ 'selected' }} @endif>Protestan</option>
                                        <option value="Katolik" @if ($user->siswa->agama == 'Katolik') {{ 'selected' }} @endif>Katolik</option>
                                        <option value="Hindu" @if ($user->siswa->agama == 'Hindu') {{ 'selected' }} @endif>Hindu</option>
                                        <option value="Budha" @if ($user->siswa->agama == 'Budha') {{ 'selected' }} @endif>Budha</option>
                                        <option value="Konghucu" @if ($user->siswa->agama == 'Konghucu') {{ 'selected' }} @endif>Konghucu</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mx-1">
                                <div class="form-group col-md-6">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input id="tempat_lahir" class="form-control" type="text" name="tempat_lahir"
                                        value="{{ old('tempat_lahir') ?? $user->siswa->tempat_lahir }}" required
                                        maxlength="255">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input id="tanggal_lahir" class="form-control" type="date" name="tanggal_lahir"
                                        value="{{ old('tanggal_lahir') ?? $user->siswa->tanggal_lahir }}" required>
                                </div>
                            </div>

                            <div class="row mx-1">
                                <div class="form-group col-md-4">
                                    <label for="rt">RT</label>
                                    <input id="rt" class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="rt"
                                        value="{{ old('rt') ?? $user->siswa->rt }}" required maxlength="3">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="rw">RW</label>
                                    <input id="rw" class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="rw"
                                        value="{{ old('rw') ?? $user->siswa->rw }}" required maxlength="3">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="no_rumah">No Rumah</label>
                                    <input id="no_rumah" class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="no_rumah"
                                        value="{{ old('no_rumah') ?? $user->siswa->no_rumah }}" required maxlength="10">
                                </div>
                            </div>

                            <div class="row mx-1">
                                <div class="form-group col-md-3">
                                    <label for="province_id">Provinsi</label>
                                    <select class="form-control select2" name="province_id" id="province_id" required>
                                        @foreach ($provinces as $province => $value)
                                            <option value="{{ $province }}" @if ($user->siswa->province_id == $province) {{ 'selected' }} @endif>
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="regency_id">Kota/Kabupaten</label>
                                    <select class="form-control select2" name="regency_id" id="regency_id" required>
                                        <option value="{{ $user->siswa->regency_id }}" @if ($user->siswa->regency_id == $user->siswa->regency->id) {{ 'selected' }} @endif>
                                            {{ $user->siswa->regency->name }}</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="district_id">Kecamatan</label>
                                    <select class="form-control select2" name="district_id" id="district_id" required>
                                        <option value="{{ $user->siswa->district_id }}" @if ($user->siswa->district_id == $user->siswa->district->id) {{ 'selected' }} @endif>
                                            {{ $user->siswa->district->name }}</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="village_id">Kelurahan/Desa</label>
                                    <select class="form-control select2" name="village_id" id="village_id" required>
                                        <option value="{{ $user->siswa->village_id }}" @if ($user->siswa->village_id == $user->siswa->village->id) {{ 'selected' }} @endif>
                                            {{ $user->siswa->village->name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mx-1">
                                <div class="form-group col-md-6">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input id="kode_pos" class="form-control" type="number"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        placeholder="Masukkan Kode Pos" name="kode_pos"
                                        value="{{ old('kode_pos') ?? $user->siswa->kode_pos }}" required maxlength="10">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="no_hp">No Handphone</label>
                                    <input id="no_hp" class="form-control" type="number"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        placeholder="Masukkan No Handphone" name="no_hp"
                                        value="{{ old('no_hp') ?? $user->siswa->no_hp }}" required maxlength="14">
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="jalan">Jalan</label>
                                <textarea class="form-control" name="jalan" id="jalan" cols="30"
                                    rows="10">{{ old('jalan') ?? $user->siswa->jalan }}</textarea>
                            </div>
                            @endrole

                            @role('admin')
                            <div class="form-group col-md-12">
                                <label for="name">Nama Lengkap</label>
                                <input id="name" class="form-control" type="text" name="name"
                                    value="{{ old('name') ?? $user->name }}" required maxlength="64">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" type="email" name="email"
                                    value="{{ old('email') ?? $user->email }}" required maxlength="255">
                            </div>
                            @endrole

                            <div class="row mx-1">
                                <div class="form-group col-md-12 col-12">
                                    <button id="buttonAvatar" type="button" class="btn btn-primary">Ubah Avatar</button>
                                    <div id="changeAvatar"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-success">Simpan Pembaruan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $('#buttonAvatar').on('click', function() {
            $('#changeAvatar').append('<label>Avatar</label>' +
                '<input name="avatar" type="file" class="form-control" required>' +
                '<label class="mt-3">Current Avatar</label>' +
                '<br>' +
                '<img src="{{ $user->avatar ? asset('avatars/' . $user->avatar) : asset('stisla/assets/img/avatar/avatar-1.png') }}" class="rounded" width="250px" alt="avatar">'
            );
            $('#buttonAvatar').remove();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('select[name="province_id"]').on('change', function() {
                let provinceId = $(this).val();
                if (provinceId) {
                    jQuery.ajax({
                        url: '/api/regencies/' + provinceId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="regency_id"]').empty();
                            $('select[name="regency_id"]').append(
                                '<option value="">Pilih Kota</option>');
                            $.each(data, function(key, value) {
                                $('select[name="regency_id"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="regency_id"]').empty();
                }
            });

            $('select[name="regency_id"]').on('change', function() {
                let regencyId = $(this).val();
                if (regencyId) {
                    jQuery.ajax({
                        url: '/api/districts/' + regencyId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="district_id"]').empty();
                            $('select[name="district_id"]').append(
                                '<option value="">Pilih Kecamatan</option>');
                            $.each(data, function(key, value) {
                                $('select[name="district_id"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="district_id"]').empty();
                }
            });

            $('select[name="district_id"]').on('change', function() {
                let districtId = $(this).val();
                if (districtId) {
                    jQuery.ajax({
                        url: '/api/villages/' + districtId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="village_id"]').empty();
                            $('select[name="village_id"]').append(
                                '<option value="">Pilih Kelurahan</option>');
                            $.each(data, function(key, value) {
                                $('select[name="village_id"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="village_id"]').empty();
                }
            });
        });
    </script>
@endpush
