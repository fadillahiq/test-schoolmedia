@extends('layouts.admin')

@section('title', 'Data Master - Galeri')

@section('header')
    <h1>Data Galeri</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>List galeri</h4>
          <div class="card-header-action">
            <a href="{{ route('galeri.create') }}" class="btn btn-primary">Tambah Galeri <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
        <div class="row">
            <div class="col-md-4 ml-3 my-2">
                <form action="{{ route('galeri.index') }}" method="GET">
                    @csrf
                    <div class="input-group mb-3">
                            <input type="text" class="form-control" name="search" value="{{ request()->query('search') }}" placeholder="Cari galeri...">
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
                <th>Judul Galeri</th>
                <th>Gambar</th>
                <th>Aksi</th>
              </tr>
              @forelse ($data as $galeri)
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $galeri->judul }}</td>
                <td><img src="{{ asset('galeri/'.$galeri->gambar) }}" class="rounded mt-2" width="150px" alt="thumbnail"></td>
                <td>
                    <form class="d-flex" action="{{ route('galeri.destroy', $galeri->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <a href="{{ route('galeri.edit', $galeri->id) }}" class="btn btn-warning mr-2">Ubah</a>
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
            {!! $data->appends(['search' => request()->query('search')])->links() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
