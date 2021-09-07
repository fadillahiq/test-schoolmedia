@extends('layouts.admin')

@section('title', 'Ubah - Berita')

@section('header')
    <h1>Data Berita</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ubah Berita</h4>
                    <div class="card-header-action">
                        <a href="{{ route('berita.index') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i>
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
                    <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="judul">Judul Berita</label>
                            <input id="judul" class="form-control" type="text" placeholder="Masukkan Judul Berita"
                                name="judul" value="{{ old('judul') ?? $berita->judul }}" required maxlength="64">
                            <p class="text-muted">Contoh: Penerimaan Siswa Didik Baru</p>
                        </div>

                        <div class="form-group">
                            <button id="ubahThumb" class="btn btn-primary btn-md" type="button">Ubah Thumbnail</button>
                            <div id="thumb"></div>
                        </div>

                        <div class="form-group">
                            <label for="konten">Konten</label>
                            <textarea class="form-control" name="konten" id="konten" cols="30"
                                rows="10">{{ old('konten') ?? $berita->konten }}</textarea>
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
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('konten', options);
    </script>
    <script>
        $('#ubahThumb').on('click', function() {
            $('#thumb').append('<label for="thumbnail">Thumbnail (optional)</label>' +
                                '<input id="thumbnail" class="form-control" type="file" placeholder="Masukkan Thumbnail" name="thumbnail" required>' +
                                '<label class="mt-3">Current Thumbnail</label>' +
                                '<br>' +
                                '<img src="{{ asset('berita/'.$berita->thumbnail) }}" class="rounded" width="250px" alt="old thumbnail">'
            );
            
            $('#ubahThumb').remove();
        });
    </script>
@endpush

