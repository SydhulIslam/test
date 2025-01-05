@extends('comon/deshbord_layout')




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
                    <h4>Verification Notice</h4>
                </div>

                @if(session()->has('message'))
                <div class="alert alert-success">{{session('message')}}</div>
                @else
                <div class="alert alert-secondary">
                
                    <p>
                        You Must Verifi Your Email! 
                    </p>
                    <p>
                        If You did't get Verification link, Resent Verification link below button!
                    </p>
                </div>
                <form class="mb-3" action="{{route('verification.send')}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary d-grid w-100">Resent Link</button>
                </form>
                @endif




            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->

@endsection







