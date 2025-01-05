@extends("comon/log_reg_layout")


@section("content")

    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="index.html" class="app-brand-link gap-2">
                  <img loading="prelaod" decoding="async" class="img-fluid" width="160" src="http://127.0.0.1:8000/assets/images/logo.png" alt="Wallet">
                </a>
              </div>

              <div class="app-brand justify-content-center">
                <span class="app-brand-text demo text-body fw-bolder">Registion</span>
              </div>
 
              <!-- /Logo -->
              <h4 class="mb-2">Adventure starts here 🚀</h4>
              <p class="mb-4">Make your app management easy and fun!</p>

              @if(session()->has('message'))
                <div class="alert alert-success">{{session('message')}}</div>
              @endif

                <form id="formAuthentication" class="mb-3" action="{{route('registion_post')}}" method="POST"  enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" autofocus />
                    </div>

                    @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror



                    <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" />
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror


                    <div class="mb-3">
                    <h6>Upload User photo</h6>
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{asset('/assets/assets/img/avatars/1.png')}}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" name="user_photo" id="upload" class="account-file-input" hidden="" accept="">
                                </label>
                            </div>
                        </div>
                    </div>
                    @error('user_photo')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <div class="mb-3 form-password-toggle">
                        <label class="form-label" for="password">Re-Write Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="password_confirmation" placeholder="············" aria-describedby="password">
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    @error('password_confirmation')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                            <label class="form-check-label" for="terms-conditions">
                            I agree to
                            <a href="javascript:void(0);">privacy policy & terms</a>
                            </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>

                </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="{{route('login')}}">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->

@endsection
