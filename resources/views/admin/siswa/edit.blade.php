@extends('layouts.admin')

@section('title', 'Ubah - Siswa')

@section('header')
    <h1>Data Siswa</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ubah Siswa</h4>
                    <div class="card-header-action">
                        <a href="{{ route('siswa.index') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i>
                            Kembali</a>
                    </div>
                </div>
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
                    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input id="nis" class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Masukkan NIS" name="nis"
                                value="{{ old('nis') ?? $siswa->nis }}" required maxlength="32">
                            <p class="text-muted">Contoh: 11806720</p>
                        </div>

                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input id="nama_lengkap" class="form-control" type="text" placeholder="Masukkan Nama Lengkap"
                                name="nama_lengkap" value="{{ old('nama_lengkap') ?? $siswa->nama_lengkap }}" required
                                maxlength="64">
                            <p class="text-muted">Contoh: Muhamad Iqbal Fadilah</p>
                        </div>

                        <div class="form-group">
                            <label for="kelas_id">Kelas</label>
                            <select class="form-control select2" name="kelas_id" id="kelas_id" required>
                                @foreach ($kelas as $kelas)
                                    <option value="{{ $kelas->id }}" @if ($siswa->kelas_id == $kelas->id) {{ 'selected' }} @endif>{{ $kelas->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" class="form-control" type="email" placeholder="Masukkan Email" name="email"
                                value="{{ old('email') ?? $siswa->email }}" required maxlength="255">
                            <p class="text-muted">Contoh: muhamad.fadilahiq@gmail.com</p>
                        </div>

                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="Laki-Laki" @if ($siswa->jenis_kelamin == 'Laki-Laki') {{ 'selected' }} @endif>Laki-Laki</option>
                                <option value="Perempuan" @if ($siswa->jenis_kelamin == 'Perempuan') {{ 'selected' }} @endif>Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select class="form-control" name="agama" id="agama" required>
                                <option value="Islam" @if ($siswa->agama == 'Islam') {{ 'selected' }} @endif>Islam</option>
                                <option value="Protestan" @if ($siswa->agama == 'Protestan') {{ 'selected' }} @endif>Protestan</option>
                                <option value="Katolik" @if ($siswa->agama == 'Katolik') {{ 'selected' }} @endif>Katolik</option>
                                <option value="Hindu" @if ($siswa->agama == 'Hindu') {{ 'selected' }} @endif>Hindu</option>
                                <option value="Budha" @if ($siswa->agama == 'Budha') {{ 'selected' }} @endif>Budha</option>
                                <option value="Konghucu" @if ($siswa->agama == 'Konghucu') {{ 'selected' }} @endif>Konghucu</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input id="tempat_lahir" class="form-control" type="text" placeholder="Masukkan Tempat Lahir"
                                name="tempat_lahir" value="{{ old('tempat_lahir') ?? $siswa->tempat_lahir }}" required
                                maxlength="255">
                            <p class="text-muted">Contoh: Bogor</p>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input id="tanggal_lahir" class="form-control" data-provide="datepicker" type="date"
                                placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir') ?? $siswa->tanggal_lahir }}" required>
                        </div>

                        <div class="form-group">
                            <label for="rt">RT</label>
                            <input id="rt" class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Masukkan RT" name="rt"
                                value="{{ old('rt') ?? $siswa->rt }}" required maxlength="3">
                            <p class="text-muted">Contoh: 005</p>
                        </div>

                        <div class="form-group">
                            <label for="rw">RW</label>
                            <input id="rw" class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Masukkan RW" name="rw"
                                value="{{ old('rw') ?? $siswa->rw }}" required maxlength="3">
                            <p class="text-muted">Contoh: 004</p>
                        </div>

                        <div class="form-group">
                            <label for="no_rumah">No Rumah</label>
                            <input id="no_rumah" class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Masukkan No Rumah"
                                name="no_rumah" value="{{ old('no_rumah') ?? $siswa->no_rumah }}" required
                                maxlength="10">
                            <p class="text-muted">Contoh: 98</p>
                        </div>

                        <div class="form-group">
                            <label for="province_id">Provinsi</label>
                            <select class="form-control select2" name="province_id" id="province_id" required>
                                @foreach ($provinces as $province => $value)
                                    <option value="{{ $province }}" @if ($siswa->province_id == $province) {{ 'selected' }} @endif>{{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="regency_id">Kota/Kabupaten</label>
                            <select class="form-control select2" name="regency_id" id="regency_id" required>
                                <option value="{{ $siswa->regency_id }}" @if ($siswa->regency_id == $siswa->regency->id) {{ 'selected' }} @endif>
                                    {{ $siswa->regency->name }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="district_id">Kecamatan</label>
                            <select class="form-control select2" name="district_id" id="district_id" required>
                                <option value="{{ $siswa->district_id }}" @if ($siswa->district_id == $siswa->district->id) {{ 'selected' }} @endif>
                                    {{ $siswa->district->name }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="village_id">Kelurahan/Desa</label>
                            <select class="form-control select2" name="village_id" id="village_id" required>
                                <option value="{{ $siswa->village_id }}" @if ($siswa->village_id == $siswa->village->id) {{ 'selected' }} @endif>
                                    {{ $siswa->village->name }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="kode_pos">Kode Pos</label>
                            <input id="kode_pos" class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Masukkan Kode Pos"
                                name="kode_pos" value="{{ old('kode_pos') ?? $siswa->kode_pos }}" required
                                maxlength="10">
                            <p class="text-muted">Contoh: 16610</p>
                        </div>

                        <div class="form-group">
                            <label for="jalan">Jalan</label>
                            <textarea class="form-control" name="jalan" id="jalan" cols="30"
                                rows="10">{{ old('jalan') ?? $siswa->jalan }}</textarea>
                            <p class="text-muted">Contoh: JL. Letjen Ibrahim Adjie</p>
                        </div>

                        <div class="form-group">
                            <label for="no_hp">No Handphone</label>
                            <input id="no_hp" class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Masukkan No Handphone"
                                name="no_hp" value="{{ old('no_hp') ?? $siswa->no_hp }}" required maxlength="14">
                            <p class="text-muted">Contoh: 085155477239</p>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-warning btn-sm" type="submit">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
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
