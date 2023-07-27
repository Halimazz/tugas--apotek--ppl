<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="{{ url('') }}/assets//images/faces/face1.jpg" alt="profile">
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">{{ session()->get('username') }}</span>
          <span class="text-secondary text-small">Apoteker</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('apoteker/home') }}">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-master" aria-expanded="false" aria-controls="ui-master">
        <span class="menu-title">Master</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-account mdi mdi-buffer"></i>
      </a>
      <div class="collapse" id="ui-master">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ url('apoteker/master-resep') }}">Data Resep</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('apoteker/master-obat') }}">Data Obat</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('apoteker/master-dosis') }}">Data Dosis</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('apoteker/master-waktu') }}">Data Waktu</a></li>
        </ul>
    </li>
  </ul>
</nav>