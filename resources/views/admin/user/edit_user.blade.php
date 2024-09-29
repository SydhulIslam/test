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
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> {{$title}}</h4>

                <div class="card mb-4">

                    <div class="col-xl d-flex justify-content-center mt-5">
                        <div class="card mb-4 w-50">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Basic with Icons</h5>
                                <small class="text-muted float-end">Merged input group</small>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{route('user.update', $user->id)}}" enctype="multipart/form-data" >

                                    @csrf
                                    @method('put')

                                    <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-fullname">User Name</label>
                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="input-group input-group-merge">
                                            <input type="text" name="name" value="{{$user->name}}" class="form-control" id="basic-icon-default-fullname" placeholder="Post Title" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
                                        </div>
                                    </div>




                                    <div class="mb-3 mt-5">
                                        <h6>User Photo</h6>
                                    </div>

                                    <div class="d-flex align-items-start align-items-sm-center gap-4 mb-5">
                                        <img src="/storage/images/{{$user->user_photo}}" alt="Blog Thumbnail" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                                        <div class="button-wrapper">

                                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                <span class="d-none d-sm-block">Upload Thumbnail</span>
                                                <i class="bx bx-upload d-block d-sm-none"></i>
                                                <input type="file" name="user_photo" id="upload" class="account-file-input" hidden="" value="/storage/images/{{$user->user_photo}}" accept="image/png, image/jpeg">
                                            </label>

                                            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                                <i class="bx bx-reset d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Reset</span>
                                            </button>

                                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">User E-mail</label>
                                        <input class="form-control" type="email" id="email" name="email" value="{{$user->email}}" placeholder="User E-mail">
                                    </div>

                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password" placeholder="············" aria-describedby="password">
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>

                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="password">Re-Write Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password" placeholder="············" aria-describedby="password">
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>


                                    <button type="submit" class="btn rounded-pill btn-primary">Publish Post</button>
                                    <button type="submit" class=" ms-3 btn rounded-pill btn-danger">Cancle</button>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- / Content -->



@endsection

