<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">App edukasi</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">

            {{-- MENU PENGGUNA --}}
            {{-- SEMUA PENGGUNA / USER MEMPUNYAI MENU INI --}}
            <li class="menu-header">Pengguna</li>
            <li class="" id="liDashboard"><a class="nav-link" href="{{ URL::to('/dashboard') }}"><i
                        class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a></li>
            <li class="" id="liProfile"><a class="nav-link" href="{{ URL::to('/profile') }}"><i class="fas fa-user"></i>
                    <span>Profile</span></a></li>
            <li class="" id="liBantuan"><a class="nav-link" href="{{ URL::to('/bantuan') }}"><i
                        class="fas fa-question-circle"></i> <span>Bantuan</span></a></li>



            @if (auth()->user()->role == 'admin')
            {{-- MENU ADMIN --}}
            <li class="menu-header">Admin</li>
            <li class="nav-item dropdown " id="liPengguna">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i>
                    <span>Pengguna</span></a>
                <ul class="dropdown-menu">
                    <li id="liManajemenPengguna"><a class="nav-link" href="/admin/pengguna">Manajemen Pengguna</a></li>
                </ul>
            </li>

            {{-- <li class="" id="liKategori"><a class="nav-link" href="{{ URL::to('/admin/kategori') }}"><i
                        class="fas fa-list-alt"></i> <span>Kategori</span></a></li> --}}

            {{-- @foreach (getKategoriMenu() as $row)
            <li class="" id="liSejarah"><a class="nav-link" href="{{ URL::to('/admin/info/' . $row->id_kategori) }}"><i
                class="fas fa-chevron-circle-right"></i> <span>{{ $row->nama_kategori }}</span></a></li>
            @endforeach --}}
            {{-- END OF MENU ADMIN --}}
            @endif

            @if (auth()->user()->role == 'guru')
            {{-- MENU ADMIN --}}
            <li class="menu-header">Guru</li>

            <li class="" id="liVideo"><a class="nav-link" href="{{ URL::to('/admin/video') }}"><i
                class="fab fa-youtube"></i> <span>Video</span></a></li>

            <li class="" id="liKategori"><a class="nav-link" href="{{ URL::to('/admin/kategori') }}"><i
                        class="fas fa-list-alt"></i> <span>Kategori</span></a></li>

            <li class="" id="liEvaluasi"><a class="nav-link" href="{{ URL::to('/admin/evaluasi') }}"><i
                        class="fas fa-question"></i> <span>Evaluasi</span></a></li>


            @foreach (getKategoriMenu() as $row)
            <li class="" id="liSejarah"><a class="nav-link" href="{{ URL::to('/admin/info/' . $row->id_kategori) }}"><i
                class="fas fa-chevron-circle-right"></i> <span>{{ $row->nama_kategori }}</span></a></li>
            @endforeach
            {{-- END OF MENU ADMIN --}}
            @endif







        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="{{ URL::to('/logout') }}" class="btn bg-main text-white btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </aside>
</div>
