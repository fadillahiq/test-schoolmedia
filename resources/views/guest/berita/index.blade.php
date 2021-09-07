<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Berita</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    @include('guest.partials.navbar')

    <div class="container">
        <div class="col-md-12">
            <div class="row my-5">
                @foreach ($data as $berita)
                <div class="card mt-5 mx-2" style="width: 18rem;">
                    <img src="{{ asset('berita/' . $berita->thumbnail) }}" class="card-img-top" alt="berita">
                    <div class="card-body">
                        <h5 class="font-weight-bolder"><a class="text-decoration-none" href="{{ route('berita.detail', $berita->slug) }}">{{ $berita->judul }}</a></h5>
                        <p class="card-text">{!! Str::limit($berita->konten, 50, '...') !!}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    @include('guest.partials.footer')

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
