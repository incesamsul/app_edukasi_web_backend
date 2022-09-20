@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah data video</h4>
                </div>
                <div class="card-body">
                    <form id="formInfo" action="{{ URL::to('/admin/create_video') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="judul_video">judul_video</label>
                            <input type="text" name="judul_video" class="form-control" id="judul_video">
                            <div id="errorMessage_judul_video"></div>
                        </div>
                        <div class="form-group">
                            <label for="id_video_youtube">id_video_youtube</label>
                            <input type="text" name="id_video_youtube" class="form-control" id="id_video_youtube">
                            <div id="errorMessage_id_video_youtube"></div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn bg-main text-white" id="btn-simpan-info">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($video as $row)
        <div class="col-sm-6">
            <div class="card p-4">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $row->id_video_youtube }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h4 class="my-3">{{ $row->judul_video }}</h4>
                <div class="card-body my-card-body p-0">
                    <p>{{ $row->judul_video }}</p>
                </div>
                <button data-id_video="{{ $row->id_video }}" class="btn btn-danger hapus-info"><i
                        class="fas fa-trash"></i>
                    Delete</button>
            </div>
        </div>
        @endforeach
    </div>
</section>


@endsection
@section('script')
<script>
    $('#btn-simpan-info').on('click', function(e) {
        e.preventDefault();
        let judul_video = errorMessageDisplay('judul_video');
        let id_video_youtube = errorMessageDisplay('id_video_youtube');

        if(judul_video == 1 && id_video_youtube== 1 ){
            $('#formInfo').submit();
        }

    })


    $('.hapus-info').on('click', function() {
            Swal.fire({
                title: 'Apakah yakin?'
                , text: "Data tidak bisa kembali lagi!"
                , type: 'warning'
                , showCancelButton: true
                , confirmButtonColor: '#3085d6'
                , cancelButtonColor: '#d33'
                , confirmButtonText: 'Ya, Konfirmasi'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        , url: '/admin/delete_video'
                        , method: 'post'
                        , dataType: 'json'
                        , data: {
                            id_video: $(this).data('id_video'),
                        }
                        , success: function(data) {
                            if (data == 1) {
                                Swal.fire('Berhasil', 'Data telah terhapus', 'success').then((result) => {
                                    location.reload();
                                });
                            }
                        }
                        , error: function(error) {
                            console.log(error);
                        }
                    })
                }
            })
        });

    $('#livideo').addClass('active');

</script>
@endsection
