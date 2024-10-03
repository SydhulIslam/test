@extends("comon/deshbord_layout")


@section("content")


        <!-- Menu -->
        @include('comon.menu')
        <!-- / Menu -->


        <!-- Layout container -->
        <div class="layout-page">

          <!-- Navbar -->
          @include('comon.nav')
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y ">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span>  {{$title}}</h4>

                <div class="card mb-4">

                    <div class="col-xl d-flex justify-content-center mt-5">
                        <div class="card mb-4 w-50">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Basic with Icons</h5>
                                <small class="text-muted float-end">Merged input group</small>
                            </div>
                            <div class="card-body">


                                <form id="formAuthentication" class="mb-3" action="{{route('user.store')}}" method="POST"  enctype="multipart/form-data">

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
                                        <label for="">Roles</label>
                                        <select name="roles[]" class="form-control" multiple>
                                            <option value="">Select Role</option>
                                            @foreach ($roles as $role)
                                            <option value="{{ $role }}">{{ $role }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                                            <label class="form-check-label" for="terms-conditions">
                                            I agree to
                                            <a href="javascript:void(0);">privacy policy & terms</a>
                                            </label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary d-grid w-100">Save</button>

                                </form>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- / Content -->



@endsection

