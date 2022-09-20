@extends('layouts_home.main')
@section('content')
<section id="content">
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-6 offset-sm-3">
                <img src="{{ auth()->user()->foto == "" ? asset('img/svg/ilustration/sad.svg') : asset('data/foto_profile/'.auth()->user()->foto . '/'. auth()->user()->foto) }}" alt="" class="rounded-circle mb-2" width="100">
                <h3>{{ auth()->user()->name }}</h3>
                <p>{{ auth()->user()->email }}</p>
                <a href="" class="btn bg-main text-white btn-icon-split"  data-bs-toggle="modal" data-bs-target="#modal">
                    <i class="fas fa-camera"></i> Ganti Foto Profile
                </a>
            </div>
        </div>
    </div>
</section>


  <!-- Modal -->
  <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12 d-flex flex-column justify-content-center align-items-center">
                    <img id="preview" src="{{ auth()->user()->foto == "" ? asset('stisla/assets/img/avatar/avatar-1.png') : asset('data/foto_profile/'.auth()->user()->foto . '/'. auth()->user()->foto) }}" alt="" class="rounded-circle mb-2" width="100">
                    <label for="ket_simulator">Ganti foto profile</label>
                    <div class="mb-3">
                        <form action="{{ URL::to('/ubah_foto_profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <input class="form-control" type="file" required id="formFile" id="customFile" name="foto" onchange="loadFile(event)">
                      </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn bg-main text-white">ubah</button>
        </form>
        </div>
      </div>
    </div>
  </div>



@endsection

@section('script')
<script>
    var loadFile = function(event){
        var output = document.querySelector('#preview');
        output.src = URL.createObjectURL(event.target.files[0]);
    }
    $('#liProfile').addClass('active');
</script>
@endsection
