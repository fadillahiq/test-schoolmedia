<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scoolmedia</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .profile {
            --tw-bg-opacity: 1;
            background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
        }

        .galeri {
            --tw-bg-opacity: 1;
            background-color: rgba(229, 231, 235, var(--tw-bg-opacity));
        }
    </style>
</head>

<body>

    @include('guest.partials.navbar')

    <div class="container">
        <div class="row my-5">
            <div class="col-md-6 my-auto">
                <p>Selamat Datang di</p>
                <h1 class="font-weight-bolder">{{ config('app.name') }}</h1>
                <a class="btn btn-success btn-md rounded-pill mt-2" href="{{ route('register.siswa') }}">Daftar Sekarang</a>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/school.png') }}" id="school" class="img-fluid" alt="school">
            </div>
        </div>
    </div>


    <div class="profile">
        <div class="container">
            <div class="col-md-12 d-flex flex-column justify-content-center py-5">
                <h1 class="mx-auto">Profile Sekolah</h1>
                <div class="table-responsive">
                    <table class="mx-auto mt-5">
                        <tbody>
                            <tr>
                                <td>Nama SMK</td>
                                <td class="pl-5">:</td>
                                <td class="pl-5 text-uppercase">{{ $data['profile']->nama_sekolah }}</td>
                            </tr>
                            <tr>
                                <td>NSS/NIS</td>
                                <td class="pl-5">:</td>
                                <td class="pl-5">{{ $data['profile']->nss }} /&nbsp;
                                    {{ $data['profile']->nis }}</td>
                            </tr>
                            <tr>
                                <td>NPSN</td>
                                <td class="pl-5">:</td>
                                <td class="pl-5">{{ $data['profile']->npsn }}</td>
                            </tr>
                            <tr>
                                <td>ISO</td>
                                <td class="pl-5">:</td>
                                <td class="pl-5">{{ $data['profile']->iso }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal berdiri</td>
                                <td class="pl-5">:</td>
                                <td class="pl-5">
                                    {{ \Carbon\Carbon::parse($data['profile']->tahun_berdiri)->IsoFormat('d MMMM YYYY') }}
                                </td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td class="pl-5">:</td>
                                <td class="pl-5">{{ $data['profile']->alamat }}</td>
                            </tr>
                            <tr>
                                <td>Desa/Kelurahan</td>
                                <td class="pl-5">:</td>
                                <td class="pl-5">{{ $data['profile']->kelurahan }}</td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td class="pl-5">:</td>
                                <td class="pl-5">{{ $data['profile']->kecamatan }}</td>
                            </tr>
                            <tr>
                                <td>Kabupaten/Kodya</td>
                                <td class="pl-5">:</td>
                                <td class="pl-5">{{ $data['profile']->kota }}</td>
                            </tr>
                            <tr>
                                <td>No. Telepon</td>
                                <td class="pl-5">:</td>
                                <td class="pl-5">{{ $data['profile']->no_telepon }}</td>
                            </tr>
                            <tr>
                                <td>E-mail</td>
                                <td class="pl-5">:</td>
                                <td class="pl-5">{{ $data['profile']->email }}</td>
                            </tr>
                            <tr>
                                <td>Website</td>
                                <td class="pl-5">:</td>
                                <td class="pl-5">{{ $data['profile']->website }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah siswa</td>
                                <td class="pl-5">:</td>
                                <td class="pl-5">{{ $data['jumlah_siswa'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="berita">
        <div class="container">
            <div class="col-md-12 my-5 d-flex flex-column justify-content-center">
                <h1 class="mx-auto">Berita Terbaru</h1>
                <div class="ml-auto">
                    <a class="btn btn-success" href="{{ route('berita') }}">Lebih Banyak -></a>
                </div>
                <div class="row">
                    @foreach ($data['berita'] as $berita)
                        <div class="card mt-5 mx-2" style="width: 18rem;">
                            <img src="{{ asset('berita/' . $berita->thumbnail) }}" class="card-img-top" alt="berita">
                            <div class="card-body">
                                <h5 class="font-weight-bolder"><a class="text-decoration-none" href="#">{{ $berita->judul }}</a></h5>
                                <p class="card-text">{!! Str::limit($berita->konten, 50, '...') !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="galeri">
        <div class="container">
            <div class="col-md-12 d-flex flex-column justify-content-center py-5">
                <h1 class="mx-auto">Galeri Terbaru</h1>
                <div class="ml-auto">
                    <a class="btn btn-primary" href="{{ route('galeri') }}">Lebih Banyak -></a>
                </div>
                <div class="row">
                    @foreach ($data['galeri'] as $galeri)
                        <div class="card mt-5 mx-2" style="width: 18rem;">
                            <img src="{{ asset('galeri/' . $galeri->gambar) }}" class="card-img-top" alt="galeri">
                            <div class="card-body">
                                <h5 class="font-weight-bolder">{{ $galeri->judul }}</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

   @include('guest.partials.footer')

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
