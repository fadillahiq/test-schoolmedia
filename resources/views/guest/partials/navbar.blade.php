<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom box-shadow">
    <div class="container">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('/') ? 'active' : '') }}" href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('news*') ? 'active' : '') }}" href="{{ route('berita') }}">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('gallery*') ? 'active' : '') }}" href="{{ route('galeri') }}">Galeri</a>
                </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <a href="{{ route('login') }}" class="btn btn-outline-primary my-2 my-sm-0" href="">Login</a>
            </div>
        </div>
    </div>
</nav>
