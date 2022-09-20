
  <!-- Modal -->
  <div class="modal border-0 fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="container">
              <div class="row">
                  <div class="col-sm-12 ">
                      <div class="text-center">
                        <img src="{{ asset('img/svg/ilustration/lock.svg') }}" width="200">
                        <h4 class="color-main my-3 text-center">Login</h4>
                        <div id="loginMessage"></div>
                        <p class="text-danger">{{ session('fail') }}</p>
                      </div>
                      <form action="{{ URL::to('/postloginuser') }}" method="POST">
                        @csrf
                          <div class="form-group mb-3">
                              <label for="email" class="color-main">Username atau Email</label>
                              <input id="email" type="text" class="form-control my-form " name="email">
                          </div>
                          <div class="form-group mb-3">
                              <label for="password" class="color-main">password</label>
                              <input id="password" type="text" class="form-control my-form " name="password">
                          </div>
                          <div class="form-group mb-3">
                              <button type="submit" id="btn-login" class="form-control my-btn btn bg-main text-white">Login</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
