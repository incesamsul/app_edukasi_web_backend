<div class="row mt-5">
    @if ($info->isEmpty())
    <div class="col-sm-6 offset-sm-3 text-center">
        <img src="{{ asset('img/svg/ilustration/sad.svg') }}" width="350">
        <p class="my-3">Mohon maaf <i class="fas fa-cry"></i> kami belum punya data apapun</p>
    </div>
    @endif
    @foreach ($info as $row)
    <div class="col-sm-3">
        <div class="card border-0 p-4">
            <div id="carousel{{ $row->id_info }}" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('data/data_upload/info/'. removeSpace($row->judul_info) . '/foto1/' . $row->foto1 )}}"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('data/data_upload/info/'. removeSpace($row->judul_info) . '/foto2/' . $row->foto2 )}}"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('data/data_upload/info/'. removeSpace($row->judul_info) . '/foto3/' . $row->foto3 )}}"
                            class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $row->id_info }}" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $row->id_info }}" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            <h4 class="my-3">{{ $row->judul_info }}</h4>
            <div class="card-body my-card-body p-0">
                <p>{{ $row->deskripsi }}</p>
            </div>
            <button data-detail='@json($row)' data-bs-toggle="modal" data-bs-target="#detailModal" class="btn btn-selengkapnya bg-main text-white "><i
                class="fas fa-arrow-right"></i>
            Selengkapnya</button>
            @if (auth()->user())
            @if (isThisMyFavorit($row->id_info))
            <button data-id_info="{{ $row->id_info }}" class="btn btn-light my-3 btn-hapus-favorit"><i class="text-danger fas fa-heart"></i> favorit anda</button>
            @else
            <button data-id_info="{{ $row->id_info }}" class="btn btn-light my-3 btn-favorit"><i class="fas fa-heart"></i> tambah ke favorit</button>
            @endif
            @endif
        </div>
    </div>
    @endforeach
</div>
