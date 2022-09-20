@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah data {{ $jenis_informasi }}</h4>
                </div>
                <div class="card-body">
                    @include('pages.sub_info.form_data')
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($sub_info as $row)
        <div class="col-sm-3">
            <div class="card p-4">
                <img src="{{ asset($row->foto1) }}"
                class="d-block w-100" alt="...">
                <h4 class="my-3">{{ $row->judul_info }}</h4>
                <div class="card-body my-card-body p-0">
                    <p>{{ $row->deskripsi }}</p>
                </div>
                <button data-id_sub_info="{{ $row->id_sub_info }}" class="btn btn-danger hapus-info"><i
                        class="fas fa-trash"></i>
                    Delete</button>
                    <a href="{{ URL::to('/admin/sub_info/' . $row->id_info . '/' . $row->id_sub_info) }}" class="btn btn-warning mt-3"><i
                        class="fas fa-pen"></i>
                    Edit</a>
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
        let dataEdit = $(this).data('edit');
        if(dataEdit.length == 0){
            let judul = errorMessageDisplay('judul');
            let foto1 = validateFotoDisplay('foto1');
            // let foto2 = validateFotoDisplay('foto2');
            // let foto3 = validateFotoDisplay('foto3');
            let deskripsi = errorMessageDisplay('deskripsi');

            // if(judul == 1 && foto1 == 1 && foto2 == 1 && foto3 == 1 && deskripsi == 1){
            if(judul == 1 && foto1 == 1 && deskripsi == 1){
                $('#formInfo').submit();
            }
        } else {
            let judul = errorMessageDisplay('judul');
            // let foto1 = validateFotoDisplay('foto1');
            // let foto2 = validateFotoDisplay('foto2');
            // let foto3 = validateFotoDisplay('foto3');
            let deskripsi = errorMessageDisplay('deskripsi');

            // if(judul == 1 && foto1 == 1 && foto2 == 1 && foto3 == 1 && deskripsi == 1){
            if(judul == 1 && deskripsi == 1){
                $('#formInfo').submit();
            }
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
                        , url: '/admin/hapus_sub_info'
                        , method: 'post'
                        , dataType: 'json'
                        , data: {
                            id_sub_info: $(this).data('id_sub_info'),
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



</script>
@endsection
