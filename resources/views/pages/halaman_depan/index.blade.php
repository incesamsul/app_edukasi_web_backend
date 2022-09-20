<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    <title>Yuk cari tahu!</title>
</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/png/logo.png') }}" alt="" width="250">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    @if (!auth()->user())
                    <li class="nav-item">
                        <a data-bs-toggle="modal" data-bs-target="#warningModal" class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="modal" data-bs-target="#warningModal" class="nav-link" href="#">Favorit</a>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="modal" data-bs-target="#warningModal" class="nav-link" href="#">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="modal" data-bs-target="#warningModal" class="nav-link" href="#">Penilaian</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ URL::to('/userprofile') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('/favorit') }}">Favorit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('/layanan') }}">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('/penilaian') }}">Penilaian</a>
                    </li>
                    @endif
                    @if (!auth()->user())
                    <li class="nav-item mx-2">
                        <a data-bs-toggle="modal" data-bs-target="#registerModal" class="nav-link btn mobile-mb-5 bg-main my-btn" href="#"><i class="fas fa-user-plus"></i> Register</a>
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

    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item carousel-hero active">
                <img src="{{ asset('img/jpg/slider/index.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption ">
                    <h5>JELAJAHI SEJARAHMU</h5>
                    <p>Bahwa manusia tidak belajar banyak dari pelajaran sejarah adalah yang terpenting dari semua pelajaran sejarah.
                        .</p>
                    <a class="btn text-white bg-main my-btn" href="#explore">Explore <i class="fas fa-arrow-right"></i></a>
                </div>

            </div>
            <div class="carousel-item carousel-hero">
                <img src="{{ asset('img/jpg/slider/index2.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption ">
                    <h5>KENALI PAHLAWANMU</h5>
                    <p>Kita adalah bangsa pejuang. Kita punya darah patriot yang tidak mudah mengatakan 'saya kalah'..                        .</p>
                    <a class="btn text-white bg-main my-btn" href="#">Explore <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="carousel-item carousel-hero">
                <img src="{{ asset('img/jpg/slider/index3.jpg') }}" class="d-block w-100" alt="...">
                <div class="carousel-caption ">
                    <h5>AYO BERWISATA</h5>
                    <p>Perjalanan bukan hadiah untuk bekerja, itu pendidikan untuk hidup..</p>
                    <a class="btn text-white bg-main my-btn" href="#">Explore <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <section id="explore">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-12">
                    <h4>Explore </h4>
                    <hr class="underline">
                </div>
            </div>
            <div class="row mt-5">
                @foreach (getKategoriMenu() as $row)
                <div class="col-sm-3 mt-4">
                    <div class="card border-0 p-4 ">
                        <img src="{{ asset('data/data_upload/kategori/'. $row->nama_kategori . '/foto1/' . $row->ilustrasi_kategori )}}"
                        class="rounded-circle" width="160"
                        height="160">
                        <h4 class="card-title color-main">{{ $row->nama_kategori }}</h4>
                        <p class="text-small text-secondary">{{ $row->deskripsi_kategori }}</p>
                        <a href="{{ URL::to('/info/'. $row->id_kategori) }}" class="align-self-end"><i class="color-main fas fa-arrow-right"></i></a>
                    </div>
                </div>
                @endforeach
                {{-- <div class="col-sm-3">
                    <div class="card border-0 p-4 ">
                        <img src="{{ asset('img/svg/ilustration/hero.svg') }}" class="rounded-circle" width="160"
                            height="160">
                        <h4 class="card-title color-main">Pahlawan</h4>
                        <p class="text-small text-secondary"> pahlawan terdahulu menjadi inspirasi
                            pahlawan masa kini , klik arah panah ...</p>
                        <a href="{{ URL::to('/pahlawan') }}" class="align-self-end"><i class="color-main fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card border-0 p-4">
                        <img src="{{ asset('img/svg/ilustration/mountain.svg') }}" class="rounded-circle" width="160"
                            height="160">
                        <h4 class="card-title color-main">Gunung</h4>
                        <p class="text-small text-secondary">Jelajahi gunung-gunung yang ada di indonesia , klik arah
                            panah ...</p>
                        <a href="{{ URL::to('/gunung') }}" class="align-self-end"><i class="color-main fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card border-0 p-4 ">
                        <img src="{{ asset('img/svg/ilustration/tour.svg') }}" class="rounded-circle" width="160"
                            height="160">
                        <h4 class="card-title color-main">Wisata</h4>
                        <p class="text-small text-secondary"> Cari tahu tentang wisata dengan klik arah panah dibawah
                            ini ...</p>
                        <a href="{{ URL::to('/wisata') }}" class="align-self-end"><i class="color-main fas fa-arrow-right"></i></a>
                    </div>
                </div> --}}
            </div>

        </div>
    </section>


  <!-- Modal -->
  <div class="modal fade" id="modalMedia" tabindex="-1" aria-labelledby="modalMediaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body d-flex justify-content-around">
          <i class="fab fa-instagram"></i> Instagram
          <i class="fab fa-facebook"></i> Facebook
          <i class="fab fa-youtube"></i> Youtube
          <i class="fab fa-tiktok"></i> Tiktok
        </div>
      </div>
    </div>
  </div>


    @include('pages.halaman_depan.modal_warning')
    @include('pages.halaman_depan.modal_login')
    @include('pages.halaman_depan.modal_register')

    <footer class="p-5 bg-main text-white">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <img src="{{ asset('img/png/logo.png') }}" width="300">
                    <p>Kini belajar hal baru bisa lebih mudah dan menyenangkan dengan yuk caritahu!</p>
                </div>
                <div class="col-sm-3">
                    <h4 class="mb-4">Links</h4>
                    <p>Ayo belajar Sejarah .... !</p>
                    <p>Ayo belajar Pahlawan .... !</p>
                    <p>Ayo belajar Gunung .... !</p>
                    <p>Ayo belajar Wisata .... !</p>
                    <p>Ayo belajar Kuliner .... !</p>
                    <p>Ayo belajar Tari .... !</p>
                    <p>Ayo belajar Studi .... !</p>
                    <p>Ayo belajar Media .... !</p>
                </div>
                <div class="col-sm-3">
                    <h4 class="mb-4">Contact Info</h4>
                    <p><i class="fas fa-location"></i> Makassar, Sulawesi-selatan Indonesia</p>
                    <p><i class="fas fa-phone"></i> 082345678910</p>
                    <p><i class="fas fa-envelope"></i> yukcaritahu@mail.com</p>
                    <p><i class="fas fa-link"></i> Yukcaritahu.com</p>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-secondary mx-2 mb-3"><i class="fas fa-bookmark"></i> Sejarah</button>
                    <button class="btn btn-secondary mx-2 mb-3"><i class="fas fa-bookmark"></i> Pahlawan</button>
                    <button class="btn btn-secondary mx-2 mb-3"><i class="fas fa-bookmark"></i> Gunung</button>
                    <button class="btn btn-secondary mx-2 mb-3"><i class="fas fa-bookmark"></i> Wisata</button>
                    <button class="btn btn-secondary mx-2 mb-3"><i class="fas fa-bookmark"></i> Kuliner</button>
                    <button class="btn btn-secondary mx-2 mb-3"><i class="fas fa-bookmark"></i> Tari</button>
                    <button class="btn btn-secondary mx-2 mb-3"><i class="fas fa-bookmark"></i> Studi</button>
                    <button class="btn btn-secondary mx-2 mb-3"><i class="fas fa-bookmark"></i> Media</button>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/home.js') }}"></script>
    @include('pages.halaman_depan.login_script')
    @include('pages.halaman_depan.register_script')


</body>

</html>



