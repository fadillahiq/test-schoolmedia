@extends('layouts.admin')

@section('title', 'Data Master - Siswa')

@section('header')
    <h1>Data Siswa</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>List Siswa</h4>
          <div class="card-header-action">
            <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Siswa <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
        <div class="row">
            <div class="col-md-4 ml-3 my-2">
                <form action="{{ route('siswa.index') }}" method="GET">
                    @csrf
                    <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" value="{{ request()->query('search') }}" placeholder="Cari siswa...">
                            <div class="input-group-prepend">
                                <button class="input-group-text" type="submit"><i class="fas fa-search"></i></button>
                            </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive table-invoice">
            <table class="table table-striped">
              <tr>
                <th>#</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Kelas</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Provinsi</th>
                <th>Kota/Kabupaten</th>
                <th>Kecamatan</th>
                <th>Kelurahan/Desa</th>
                <th>Nomor Handphone</th>
                <th>Aksi</th>
              </tr>
              @forelse ($data as $siswa)
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama_lengkap }}</td>
                <td>{{ $siswa->kelas->nama_kelas }}</td>
                <td>{{ $siswa->email }}</td>
                <td>{{ $siswa->jenis_kelamin }}</td>
                <td>{{ $siswa->agama }}</td>
                <td>{{ $siswa->tempat_lahir }}</td>
                <td>{{ $siswa->tanggal_lahir }}</td>
                <td>{{ $siswa->jalan }} No. {{ $siswa->no_rumah }} Rt. {{ $siswa->rt }} Rw. {{ $siswa->rw }} {{ $siswa->kode_pos }}</td>
                <td>{{ $siswa->province->name }}</td>
                <td>{{ $siswa->regency->name }}</td>
                <td>{{ $siswa->district->name }}</td>
                <td>{{ $siswa->village->name }}</td>
                <td>{{ $siswa->no_hp }}</td>
                <td>
                    <form class="d-flex" action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning mr-2">Ubah</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')">Hapus</button>
                    </form>
                </td>
              </tr>
              @empty
              <tr>
                  <td colspan="16"><p class="text-center text-danger mt-3"><strong>Data Tidak Ditemukan !</strong></p></td>
              </tr>
              @endforelse
            </table>
            {!! $data->appends(['search' => request()->query('search')])->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
