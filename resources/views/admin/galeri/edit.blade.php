@extends('layouts.admin')

@section('title', 'Ubah - Galeri')

@section('header')
    <h1>Data Galeri</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ubah Galeri</h4>
                    <div class="card-header-action">
                        <a href="{{ route('galeri.index') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i>
                            Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="judul">Judul Galeri</label>
                            <input id="judul" class="form-control" type="text" placeholder="Masukkan Judul Galeri"
                                name="judul" value="{{ old('judul') ?? $galeri->judul }}" required maxlength="64">
                            <p class="text-muted">Contoh: Foto Bersama Guru</p>
                        </div>

                        <div class="form-group">
                            <button id="ubahGambar" class="btn btn-primary btn-md" type="button">Ubah Gambar</button>
                            <div id="gambar"></div>
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
        $('#ubahGambar').on('click', function() {
            $('#gambar').append('<label for="gambar">Gambar</label>' +
                                '<input id="gambar" class="form-control" type="file" placeholder="Masukkan Gambar" name="gambar" required>' +
                                '<label class="mt-3">Current Gambar</label>' +
                                '<br>' +
                                '<img src="{{ asset('galeri/' . $galeri->gambar) }}" class="rounded" width="250px" alt="old gambar">'
            );
            
            $('#ubahGambar').remove();
        });
    </script>
@endpush
