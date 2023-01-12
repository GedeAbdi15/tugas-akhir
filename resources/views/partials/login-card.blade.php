<div class="card justify-content-center" style="width: 25rem;">
    <div class="card-body">
        {{-- <img src="{{url('/image/telkom.png')}}" class="card-img-top" alt="telkom"> --}}
        <img src="assets/image/telkom.png" class="card-img-top" alt="telkom">
        <h4 class="card-title">Login</h4>
        <form>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control" id="exampleInputNama">
            
          </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">ID</label>
              <input type="text" class="form-control" id="exampleInputId">
              
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            
            <a href="/home">
                <div class="d-grid gap-2 col mx-auto">
                    <button class="btn btn-primary" type="button">
                      <div class="text">
                        Submit
                      </div>
                    </button>
                </div>
            </a> 
          </form>

          <div class="row mt-2 ">
              <div class="col">
                  <p>Belum Punya Akun?</p>
              </div>
              <div class="col">
                  <a href="/register">Register</a>
              </div>
          </div>

        </div>
    </div>
</div>