@extends('layouts_home.main')
@section('content')
<section id="content">
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-6 offset-sm-3">
                <img src="{{ asset('img/svg/ilustration/contact.svg') }}" alt="" width="350">
                <p class="my-4">Hubungi kami untuk lakukan request tambahan informasi</p>
                <button class="btn bg-main text-white"><i class="fab fa-whatsapp"></i> whatsapp</button>
            </div>
        </div>
    </div>
</section>




@endsection

@section('script')

@endsection
