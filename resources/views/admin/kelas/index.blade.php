@extends('layouts.admin')

@section('title', 'Data Master - Kelas')

@section('header')
    <h1>Data Kelas</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>List Kelas</h4>
          <div class="card-header-action">
            <a href="{{ route('kelas.create') }}" class="btn btn-primary">Tambah Kelas <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive table-invoice">
            <table class="table table-striped">
              <tr>
                <th>#</th>
                <th>Nama Kelas</th>
                <th>Aksi</th>
              </tr>
              @forelse ($data as $kelas)
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $kelas->nama_kelas }}</td>
                <td>
                    <form class="d-flex" action="{{ route('kelas.destroy', $kelas->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a href="{{ route('kelas.edit', $kelas->id) }}" class="btn btn-warning mr-2">Ubah</a>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?')">Hapus</button>
                    </form>
                </td>
              </tr>
              @empty
              <tr>
                  <td colspan="12"><p class="text-center text-danger mt-3"><strong>Data Tidak Ditemukan !</strong></p></td>
              </tr>
              @endforelse
            </table>
            {{ $data->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
