@extends('layouts.admin')

@section('title', 'Ubah - Kelas')

@section('header')
    <h1>Data Kelas</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Ubah Kelas</h4>
          <div class="card-header-action">
            <a href="{{ route('kelas.index') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i> Kembali</a>
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
            <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_kelas">Nama Kelas</label>
                    <input id="nama_kelas" class="form-control" type="text" placeholder="Masukkan Nama Kelas" name="nama_kelas" value="{{ old('nama_kelas') ?? $kelas->nama_kelas }}" required maxlength="24">
                    <p class="text-muted">Contoh: RPL XII-2</p>
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
