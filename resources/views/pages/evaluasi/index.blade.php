@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah soal</h4>
                </div>
                <div class="card-body">
                    <form id="formInfo" action="{{ URL::to('/admin/create_soal') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="soal">soal</label>
                            <input type="text" name="soal" class="form-control" id="soal">
                            <div id="errorMessage_soal"></div>
                        </div>
                        <div class="form-group">
                            <label for="jawaban_a">jawaban_a</label>
                            <input type="text" name="jawaban_a" class="form-control" id="jawaban_a">
                            <div id="errorMessage_jawaban_a"></div>
                        </div>
                        <div class="form-group">
                            <label for="jawaban_b">jawaban_b</label>
                            <input type="text" name="jawaban_b" class="form-control" id="jawaban_b">
                            <div id="errorMessage_jawaban_b"></div>
                        </div>
                        <div class="form-group">
                            <label for="jawaban_c">jawaban_c</label>
                            <input type="text" name="jawaban_c" class="form-control" id="jawaban_c">
                            <div id="errorMessage_jawaban_c"></div>
                        </div>
                        <div class="form-group">
                            <label for="jawaban_d">jawaban_d</label>
                            <input type="text" name="jawaban_d" class="form-control" id="jawaban_d">
                            <div id="errorMessage_jawaban_d"></div>
                        </div>
                        <div class="form-group">
                            <label for="jawaban_benar">jawaban_benar</label>
                            <input type="text" name="jawaban_benar" class="form-control" id="jawaban_benar">
                            <div id="errorMessage_jawaban_benar"></div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn bg-main text-white" id="btn-simpan-info">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($soal as $row)
    <div class="row">
        <div class="col-sm-12">
            <div class="card p-4">
                <p>{{ $row->soal }}</p>
                <ol type="a">
                    <li>{{ $row->a }}</li>
                    <li>{{ $row->b }}</li>
                    <li>{{ $row->c }}</li>
                    <li>{{ $row->d }}</li>
                </ol>
                <p class="text-success">jawaban benar : {{ $row->jawaban }}</p>
                <button data-id_data="{{ $row->id_soal_evaluasi }}" class="btn btn-danger hapus-info"><i
                        class="fas fa-trash"></i>
                    Delete</button>
            </div>
        </div>
    </div>
    @endforeach
</section>


@endsection
@section('script')
<script>
    $('#btn-simpan-info').on('click', function(e) {
        e.preventDefault();
        let soal = errorMessageDisplay('soal');
        let jawaban_a = errorMessageDisplay('jawaban_a');
        let jawaban_b = errorMessageDisplay('jawaban_b');
        let jawaban_c = errorMessageDisplay('jawaban_c');
        let jawaban_d = errorMessageDisplay('jawaban_d');
        let jawaban_benar = errorMessageDisplay('jawaban_benar');

        if(soal == 1 && jawaban_a== 1 && jawaban_b== 1 && jawaban_c== 1 && jawaban_d== 1 &&jawaban_benar== 1 ){
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
                        , url: '/admin/delete_soal'
                        , method: 'post'
                        , dataType: 'json'
                        , data: {
                            id_video: $(this).data('id_data'),
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
