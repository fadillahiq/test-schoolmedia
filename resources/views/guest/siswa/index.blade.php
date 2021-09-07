<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Siswa</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <h5 class="card-header">Daftar Siswa</h5>
            <div class="card-body">
                @if ($message = Session::get('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form action="{{ route('register.siswa.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mx-1">
                        <div class="form-group col-md-6">
                            <label for="nis">NIS</label>
                            <input id="nis" class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="nis" value="{{ old('nis') }}"
                                required maxlength="32">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input id="nama_lengkap" class="form-control" type="text" name="nama_lengkap"
                                value="{{ old('nama_lengkap') }}" required maxlength="64">
                        </div>
                    </div>

                    <div class="row mx-1">
                        <div class="form-group col-md-6">
                            <label for="kelas_id">Kelas</label>
                            <select class="form-control select2" name="kelas_id" id="kelas_id" required>
                                <option value="">Pilih Kelas</option>
                                @foreach ($kelas as $kelas)
                                    <option value="{{ $kelas->id }}">
                                        {{ $kelas->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" type="email" name="email"
                                value="{{ old('email') }}" required maxlength="255">
                        </div>
                    </div>

                    <div class="row mx-1">
                        <div class="form-group col-md-6">
                            <label for="jenis_kelamin">Jenis kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="agama">Agama</label>
                            <select class="form-control" name="agama" id="agama" required>
                                <option value="">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mx-1">
                        <div class="form-group col-md-6">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input id="tempat_lahir" class="form-control" type="text" name="tempat_lahir"
                                value="{{ old('tempat_lahir') }}" required maxlength="255">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input id="tanggal_lahir" class="form-control" type="date" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir') }}" required>
                        </div>
                    </div>

                    <div class="row mx-1">
                        <div class="form-group col-md-4">
                            <label for="rt">RT</label>
                            <input id="rt" class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="rt" value="{{ old('rt') }}"
                                required maxlength="3">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="rw">RW</label>
                            <input id="rw" class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="rw" value="{{ old('rw') }}"
                                required maxlength="3">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="no_rumah">No Rumah</label>
                            <input id="no_rumah" class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="no_rumah"
                                value="{{ old('no_rumah') }}" required maxlength="10">
                        </div>
                    </div>

                    <div class="row mx-1">
                        <div class="form-group col-md-3">
                            <label for="province_id">Provinsi</label>
                            <select class="form-control select2" name="province_id" id="province_id" required>
                                <option value="">Pilih Provinsi</option>
                                @foreach ($provinces as $province => $value)
                                    <option value="{{ $province }}">
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="regency_id">Kota/Kabupaten</label>
                            <select class="form-control select2" name="regency_id" id="regency_id" required>
                                <option value="">Pilih Kota</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="district_id">Kecamatan</label>
                            <select class="form-control select2" name="district_id" id="district_id" required>
                                <option value="">Pilih Kecamatan</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="village_id">Kelurahan/Desa</label>
                            <select class="form-control select2" name="village_id" id="village_id" required>
                                <option value="">Pilih Kelurahan</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mx-1">
                        <div class="form-group col-md-6">
                            <label for="kode_pos">Kode Pos</label>
                            <input id="kode_pos" class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Masukkan Kode Pos"
                                name="kode_pos" value="{{ old('kode_pos') }}" required maxlength="10">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="no_hp">No Handphone</label>
                            <input id="no_hp" class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Masukkan No Handphone"
                                name="no_hp" value="{{ old('no_hp') }}" required maxlength="14">
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="jalan">Jalan</label>
                        <textarea class="form-control" name="jalan" id="jalan" cols="30"
                            rows="10">{{ old('jalan') }}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
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
</body>

</html>
