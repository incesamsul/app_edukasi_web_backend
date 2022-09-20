@extends('layouts.v_template')

@section('content')
<section class="section">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah data kategori</h4>
                </div>
                <div class="card-body">
                    <form id="formInfo" action="{{ URL::to('/admin/simpan_kategori') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_kategori">nama_kategori</label>
                            <input type="hidden" name="id_kategori" value="{{ $edit ? $edit->id_kategori :'' }}">
                            <input value="{{ $edit ? $edit->nama_kategori :'' }}" type="text" name="nama_kategori" class="form-control" id="nama_kategori">
                            <div id="errorMessage_nama_kategori"></div>
                        </div>

                        <div class="form-group">
                            <label for="foto1">Foto ilustrasi</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto1" name="foto1">
                                <label class="custom-file-label" for="foto1">Pilih
                                    File</label>
                                <div id="errorMessage_foto1"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10">{{ $edit ? $edit->deskripsi_kategori :'' }}</textarea>
                            <div id="errorMessage_deskripsi"></div>
                        </div>
                        <div class="form-group">
                            <button data-edit='@json($edit)' type="submit" class="btn bg-main text-white" id="btn-simpan-info">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($kategori as $row)
        <div class="col-sm-3">
            <div class="card p-4">
                <img src="{{ asset( $row->ilustrasi_kategori )}}"
                class="d-block w-100" alt="...">
                <h4 class="my-3">{{ $row->nama_kategori }}</h4>
                <div class="card-body my-card-body p-0">
                    <p>{{ $row->deskripsi_kategori }}</p>
                </div>
                <button data-id_kategori="{{ $row->id_kategori }}" class="btn btn-danger hapus-info"><i
                        class="fas fa-trash"></i>
                    Delete</button>
                <a href="{{ URL::to('/admin/kategori/' . $row->id_kategori) }}" class="btn btn-warning mt-3"><i
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
        if (dataEdit.length == 0){
            let nama_kategori = errorMessageDisplay('nama_kategori');
            let foto1 = validateFotoDisplay('foto1');
            let deskripsi = errorMessageDisplay('deskripsi');

            if(nama_kategori == 1 && foto1 == 1  && deskripsi == 1){
                $('#formInfo').submit();
            }
        } else {
            let nama_kategori = errorMessageDisplay('nama_kategori');
            let deskripsi = errorMessageDisplay('deskripsi');

            if(nama_kategori == 1  && deskripsi == 1){
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
                        , url: '/admin/hapus_kategori'
                        , method: 'post'
                        , dataType: 'json'
                        , data: {
                            id_kategori: $(this).data('id_kategori'),
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

    $('#liKategori').addClass('active');

</script>
@endsection
