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
            <div class="row my-5 d-flex flex-column justify-content-center">
                <h1>{{ $data->judul }}</h1>
                <img src="{{ asset('berita/'.$data->thumbnail) }}" class="img-fluid my-3" alt="thumbnail">
                {!! $data->konten !!}
            </div>
        </div>
    </div>


    @include('guest.partials.footer')

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
