@extends('comon/log_reg_layout')


@section('content')
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                              <img loading="prelaod" decoding="async" class="img-fluid" width="160" src="http://127.0.0.1:8000/assets/images/logo.png" alt="Wallet">
                            </a>
                        </div>

                        <div class="app-brand justify-content-center">
                          <span style="font-size: 1.5rem; text-transform: capitalize;" class=" demo text-body fw-bolder">Reset Password</span>
                        </div>

                        <!-- /Logo -->
                        <h4 class="mb-2"> Welcome to Sneat! 👋 Reset Password </h4>
                        <p class="mb-4"> Please sign-in to your account and start the adventure </p>

                        @if (session()->has('invalid'))
                            <div class="alert alert-danger">{{ session('invalid') }}</div>
                        @endif

                        @if (session()->has('massage'))
                            <div class="alert alert-success">{{ session('massage') }}</div>
                        @endif
                        @if (session()->has('email'))
                            <div class="alert alert-danger">{{ session('email') }}</div>
                        @endif

                        <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('password.email') }}" >

                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" />
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror




                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary d-grid w-100" type="submit">Reset Password</button>
                            </div>
                        </form>


                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
