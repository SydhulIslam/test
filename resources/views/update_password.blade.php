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
                          <span style="font-size: 1.5rem; text-transform: capitalize;" class=" demo text-body fw-bolder">Update Password</span>
                        </div>

                        <!-- /Logo -->
                        <h4 class="mb-2">Update Password to Sneat! 👋</h4>
                        <p class="mb-4">Please Update your Password and start the adventure</p>

                        @if (session()->has('invalid'))
                            <div class="alert alert-danger">{{ session('invalid') }}</div>
                        @endif

                        @if (session()->has('email'))
                            <div class="alert alert-danger">{{ session('email') }}</div>
                        @endif

                        <form action="{{ route('password.update') }}" method="POST"  id="formAuthentication" class="mb-3"  >

                            @csrf

                            <input type="hidden" name="token" value="{{$token }}">

                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="email" class="form-label">Set New Password</label>
                                <input class="form-control" id="email"  type="email" name="email" placeholder="Your Email" value="{{ request('email') }}" readonly    />
                            </div>

                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="password" class="form-label">Set New Password</label>
                                <input value="{{old('password')}}" type="password" class="form-control" id="password" name="password" placeholder="Set new Password" />
                            </div>




                            @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Conform Password</label>
                                <input value="{{old('password_confirmation')}}" type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                       placeholder="Conform Password " />
                            </div>


                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary d-grid w-100" type="submit">Update Password</button>
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
