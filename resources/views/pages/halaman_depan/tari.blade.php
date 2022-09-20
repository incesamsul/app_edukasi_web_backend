@extends('layouts_home.main')
@section('content')
<section id="content">
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-6 offset-sm-3">
                <h3 >Tari</h3>
                <p>Jangan menari untuk mengesankan, cukup menari untuk bertemu diri sendiri..</p>
            </div>
        </div>
        @include('pages.halaman_depan.card_info')
    </div>
</section>
@include('pages.halaman_depan.modal_warning')
@include('pages.halaman_depan.modal_login')
@include('pages.halaman_depan.modal_detail')
  <!-- Modal -->
  <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="detailModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="detailModalBody">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img id="gambar1" src=""
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img id="gambar2" src=""
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img id="gambar3" src=""
                            class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
            <h4 class="my-3" id="judulInfoLabel">gagal meload data...</h4>
            <div class="card-body my-card-body p-0" id="deskripsiInfoLabel">
                gagal meload data ....
            </div>
        </div>
      </div>
    </div>
  </div>


@endsection

@section('script')
<script>

    $('.btn-selengkapnya').on('click',function(){
        console.log($(this).data('detail'))
        let detail = $(this).data('detail');
        $('#detailModalLabel').html(detail.judul_info);
        $('#judulInfoLabel').html(detail.judul_info);
        $('#deskripsiInfoLabel').html(detail.deskripsi);
        $('#gambar1').attr('src','data/data_upload/sejarah/' + removeSpace(detail.judul_info) + '/foto1/' + detail.foto1);
        $('#gambar2').attr('src','data/data_upload/sejarah/' + removeSpace(detail.judul_info) + '/foto2/' + detail.foto2);
        $('#gambar3').attr('src','data/data_upload/sejarah/' + removeSpace(detail.judul_info) + '/foto3/' + detail.foto3);

    })

</script>
@include('pages.halaman_depan.login_script')
@include('pages.halaman_depan.script_tambah_favorit')
@include('pages.halaman_depan.script_hapus_favorit')
@endsection
