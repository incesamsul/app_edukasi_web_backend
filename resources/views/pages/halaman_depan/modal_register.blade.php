
  <!-- Modal -->
  <div class="modal border-0 fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="container">
              <div class="row">
                  <div class="col-sm-12 ">
                      <div class="text-center">
                        <img src="{{ asset('img/svg/ilustration/lock.svg') }}" width="200">
                        <h4 class="color-main my-3 text-center">Register</h4>
                        <div id="loginRegisterMessage"></div>
                        <p class="text-danger">{{ session('fail') }}</p>
                      </div>
                      <form action="{{ URL::to('/postloginuser') }}" method="POST">
                        @csrf
                          <div class="form-group mb-3">
                              <label for="name" class="color-main">Name</label>
                              <input id="name" type="text" class="form-control my-form " name="name">
                              <div id="errorMessage_name"></div>
                          </div>
                          <div class="form-group mb-3">
                              <label for="new_email" class="color-main">Username atau Email</label>
                              <input id="new_email" type="text" class="form-control my-form " name="new_email">
                              <div id="errorMessage_new_email"></div>
                          </div>
                          <div class="form-group mb-3">
                              <label for="password" class="color-main">password</label>
                              <input id="new_password" type="text" class="form-control my-form " name="new_password">
                              <div id="errorMessage_new_password"></div>
                          </div>
                          <div class="form-group mb-3">
                              <button type="submit" id="btn-register" class="form-control my-btn btn bg-main text-white">Register</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
