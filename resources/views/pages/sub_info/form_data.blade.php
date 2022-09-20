<form id="formInfo" action="{{ URL::to('/admin/simpan_sub_info') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="judul">judul</label>
        <input type="hidden" name="id_sub_info" value="{{ $edit ? $edit->id_sub_info :'' }}">
        <input type="hidden" name="info" class="form-control" value="{{ $id_info }}">
        <input type="text" name="judul" class="form-control" id="judul" value="{{ $edit ? $edit->judul_sub_info : '' }}">
        <div id="errorMessage_judul"></div>
    </div>

    <div class="form-group">
        <label for="foto1">Foto </label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="foto1" name="foto1">
            <label class="custom-file-label" for="foto1">Pilih
                File</label>
            <div id="errorMessage_foto1"></div>
        </div>
    </div>
    {{-- <div class="form-group">
        <label for="foto2">Foto slide 2</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="foto2" name="foto2">
            <label class="custom-file-label" for="foto2">Pilih
                File</label>
            <div id="errorMessage_foto2"></div>
        </div>
    </div>
    <div class="form-group">
        <label for="foto3">Foto slide 3</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="foto3" name="foto3">
            <label class="custom-file-label" for="foto3">Pilih
                File</label>
            <div id="errorMessage_foto3"></div>
        </div>
    </div> --}}
    <div class="form-group">
        <label for="deskripsi">deskripsi</label>
        <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10">{{ $edit ? $edit->deskripsi : '' }}</textarea>
        <div id="errorMessage_deskripsi"></div>
    </div>
    <div class="form-group">
        <button data-edit='@json($edit)' type="submit" class="btn bg-main text-white" id="btn-simpan-info">Simpan</button>
    </div>
</form>
