
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img style="filter:invert(100%)" src="{{ asset('img/png/logo.png') }}" alt="" width="250">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @if (!auth()->user())
                    <li class="nav-item">
                        <a  style="color: rgb(63, 63, 63) !important" data-bs-toggle="modal" data-bs-target="#warningModal" class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a  style="color: rgb(63, 63, 63) !important" data-bs-toggle="modal" data-bs-target="#warningModal" class="nav-link" href="#">Favorit</a>
                    </li>
                    <li class="nav-item">
                        <a  style="color: rgb(63, 63, 63) !important" data-bs-toggle="modal" data-bs-target="#warningModal" class="nav-link" href="#">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a  style="color: rgb(63, 63, 63) !important" data-bs-toggle="modal" data-bs-target="#warningModal" class="nav-link" href="#">Penilaian</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a style="color: rgb(63, 63, 63) !important"  class="nav-link active" aria-current="page" href="{{ URL::to('/userprofile') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a  style="color: rgb(63, 63, 63) !important" class="nav-link" href="{{ URL::to('/favorit') }}">Favorit</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: rgb(63, 63, 63) !important" class="nav-link" href="{{ URL::to('layanan') }}">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a style="color: rgb(63, 63, 63) !important" class="nav-link" href="{{ URL::to('penilaian') }}">Penilaian</a>
                    </li>
                    @endif
                    @if (!auth()->user())
                    <li class="nav-item mx-2">
                        <a class="nav-link btn bg-main my-btn" href="#"><i class="fas fa-user-plus"></i> Register</a>
                    </li>
                    <li class="nav-item mx-0">
                        <a data-bs-toggle="modal" data-bs-target="#loginModal" class="nav-link btn btn-light my-btn color-main" href="#"
                            style="color: #A2835A !important"><i class="fas fa-sign-in"></i> Login</a>
                    </li>
                    @else
                    <li class="nav-item mx-2">
                        <a class="nav-link btn bg-main my-btn" href="#"><i class="fas fa-user-plus"></i> {{ auth()->user()->name }}</a>
                    </li>
                    <li class="nav-item mx-0">
                        <a class="nav-link btn btn-light my-btn color-main" href="{{ URL::to('/logoutuser') }}"
                            style="color: #A2835A !important"><i class="fas fa-sign-out"></i> logout</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
