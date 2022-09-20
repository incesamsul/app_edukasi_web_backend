@extends('layouts_home.main')
@section('content')
<section id="content">
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-6 offset-sm-3">
                <h3 >Favorit</h3>
                <p>Temukan informasi favorit anda yang telah anda simpan sebelumnya.</p>
            </div>
        </div>
        @include('pages.halaman_depan.card_info')
    </div>
</section>

@include('pages.halaman_depan.modal_warning')
@include('pages.halaman_depan.modal_login')

@include('pages.halaman_depan.modal_detail')


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
