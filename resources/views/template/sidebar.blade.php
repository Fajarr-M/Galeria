<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      {{-- <img src="../../../Images/avatar.webp" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Galeria</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel dropdown mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="/../Images/p11.webp" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          <a href="profile/edit/{{ Auth::user()->id }}" class="d-block">Hi, {{ Auth::user()->name }}</a>
          <div class="logout mt-3">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none">
            @csrf</form>
          </div>
        </div>
      </div>

    <!-- /.sidebar -->
  </aside>