<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
       @if (Auth::check() && Auth::user()->level == 'admin')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/album" class="nav-link">Album</a>
      </li>
      @endif
    
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/galeri" class="nav-link">Galeri Foto</a>
      </li>
     
      @if (Auth::check() && Auth::user()->level == 'admin')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/user" class="nav-link">Manajemen User</a>
      </li>
      @endif
    </ul>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Menu</a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      </ul> 
  </nav>