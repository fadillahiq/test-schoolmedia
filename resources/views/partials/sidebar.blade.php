<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('dashboard') }}">Schoolmedia</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('dashboard') }}">SM</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item {{ (request()->is('dashboard') ? 'active' : '') }}"><a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
       @role('admin')
        <li class="menu-header">Master Data</li>
        <li class="nav-item {{ (request()->is('admin/kelas*') ? 'active' : '') }}"><a class="nav-link" href="{{ route('kelas.index') }}"><i class="fas fa-door-open"></i><span>Data Kelas</span></a></li>
        <li class="nav-item {{ (request()->is('admin/siswa*') ? 'active' : '') }}"><a class="nav-link" href="{{ route('siswa.index') }}"><i class="fas fa-user"></i><span>Data Siswa</span></a></li>
        <li class="nav-item {{ (request()->is('admin/berita*') ? 'active' : '') }}"><a class="nav-link" href="{{ route('berita.index') }}"><i class="fas fa-newspaper"></i><span>Data Berita</span></a></li>
        <li class="nav-item {{ (request()->is('admin/galeri*') ? 'active' : '') }}"><a class="nav-link" href="{{ route('galeri.index') }}"><i class="fas fa-images"></i><span>Data Galeri</span></a></li>
        <li class="menu-header">Menu</li>
        <li class="nav-item {{ (request()->is('admin/profile-sekolah*') ? 'active' : '') }}"><a href="{{ route('profile-sekolah.index') }}" class="nav-link"><i class="fas fa-school"></i></i><span>Profile Sekolah</span></a></li>
       @endrole
       @role('siswa')
       <li class="menu-header">Menu</li>
       <li class="nav-item {{ (request()->is('kelas*') ? 'active' : '') }}"><a class="nav-link" href="{{ route('kelas.siswa') }}"><i class="fas fa-door-open"></i><span>Data Kelas</span></a></li>
       @endrole
      </ul>
  </aside>
