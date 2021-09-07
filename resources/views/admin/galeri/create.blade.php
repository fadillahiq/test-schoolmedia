@extends('layouts.admin')

@section('title', 'Tambah - Galeri')

@section('header')
    <h1>Data Galeri</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Galeri</h4>
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
                    <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="judul">Judul Galeri</label>
                            <input id="judul" class="form-control" type="text" placeholder="Masukkan Judul Galeri"
                                name="judul" value="{{ old('judul') }}" required maxlength="64">
                            <p class="text-muted">Contoh: Foto Bersama Guru</p>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input id="gambar" class="form-control" type="file" placeholder="Masukkan Gambar"
                                name="gambar" required>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

