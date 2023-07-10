<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link">
    {{-- <img src="{{ asset('img/icons') }}/laravel.jpg" alt="laravel Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8"> --}}
    <h6 >Learning Management System</h6>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('img/icons') }}/codeigniter4.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" >{{ auth()->user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if (auth()->user()->status_id == 2)
        <li class="nav-item">
          <a href="{{ route('admin.index') }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-header">MANAGE DATA</li>
        <li class="nav-item">
          <a href="{{ route('admin.users.index') }}"
            class="nav-link {{ Request::segment(2) == 'users' ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Users
            </p>
          </a>
        </li>
        @endif
        {{-- <li class="nav-item">
          <a href="{{ route('admin.materi.index') }}"
            class="nav-link {{ Request::segment(2) == 'materi' ? 'active' : '' }}">
            <i class="nav-icon far fa-image"></i>
            <p>
              Materi
            </p>
          </a>
        </li> --}}
        <li class="nav-item">
          <a href="{{ route('admin.kelas.index') }}"
            class="nav-link {{ Request::segment(2) == 'kelas' ? 'active' : '' }}">
            <i class="nav-icon fa fa-book"></i>
            <p>
              Kelas
            </p>
          </a>
        </li>
        @if (auth()->user()->status_id == 2)
        <li class="nav-item">
          <a href="{{ route('admin.pengumuman.index') }}"
            class="nav-link {{ Request::segment(2) == 'pengumuman' ? 'active' : '' }}">
            <i class="nav-icon fas fa-info"></i>
            <p>
              Pengumuman
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.agenda.index') }}"
            class="nav-link {{ Request::segment(2) == 'agenda' ? 'active' : '' }}">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Agenda
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.pendaftaran.index') }}"
            class="nav-link {{ Request::segment(2) == 'pendaftaran' ? 'active' : '' }}">
            <i class="nav-icon far fa-circle"></i>
            <p>
              Pendaftaran
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.profile.tambahadmin') }}"
            class="nav-link {{ Request::is('admin/tambahadmin') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Tambah Admin
            </p>
          </a>
        </li>
        @endif
        <li class="nav-header">PENGATURAN</li>
        <li class="nav-item">
          <a href="{{ route('admin.profile.index') }}"
            class="nav-link {{ Request::is('admin/profile') ? 'active' : '' }}">
            <i class="nav-icon fas fa-id-card"></i>
            <p>
              Profil
            </p>
          </a>
        </li>
        @if (auth()->user()->status_id == 2)
        <li class="nav-item">
          <a href="{{ route('admin.change-password.index') }}"
            class="nav-link {{ Request::is('admin/change-password') ? 'active' : '' }}">
            <i class="nav-icon fas fa-unlock"></i>
            <p>
              Ubah Password
            </p>
          </a>
        </li>
        @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
