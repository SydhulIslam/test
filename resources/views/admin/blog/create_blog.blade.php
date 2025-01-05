@extends('comon/deshbord_layout')


@section('content')
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
            <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Create New Blog</h4>

                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <small class="text-muted float-end">Create New Blog</small>
                    </div>

                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <div class="card-body">

                        <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">

                            @csrf

                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Blog Title</label>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="input-group input-group-merge">
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                        id="basic-icon-default-fullname" placeholder="Post Title" aria-label="John Doe"
                                        aria-describedby="basic-icon-default-fullname2">
                                </div>



                            </div>


                            <div class="mb-3">
                                <h6>Upload Thumbnail</h6>
                            </div>

                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img src="{{ old('thumbnail') }}" alt="Blog Thumbnail" class="d-block rounded"
                                    height="100" width="100" id="uploadedAvatar">
                                <div class="button-wrapper">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload Thumbnail</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input type="file" name="thumbnail" id="upload" class="account-file-input"
                                            hidden="" value="{{ old('thumbnail') }}" accept="image/png, image/jpeg">
                                    </label>
                                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                    </button>

                                    <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-company">Post Excerpt</label>

                                @error('excerpt')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="input-group input-group-merge">
                                    <textarea id="basic-icon-default-message" name= "excerpt" rows="3" class="form-control" placeholder="Post Content"
                                        aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2">{{ old('excerpt') }}  </textarea>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-message">Post Content</label>

                                @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="input-group input-group-merge">
                                    <textarea id="basic-icon-default-message" name= "content" rows="5" class="form-control" placeholder="Post Content"
                                        aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2">{{ old('content') }} </textarea>
                                </div>
                            </div>




                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-phone">category</label>

                                @error('category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <select class="form-select" name= "category_id" id="exampleFormControlSelect1"
                                    aria-label="Default select example">

                                    @foreach ($categories as $category)
                                        <option value= "{{ $category->id }}"
                                            @if ($category->id == old('category_id')) selected="selected" @endif>
                                            {{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>





                            <button type="submit" class="btn rounded-pill btn-primary">Publish Post</button>
                            <button type="submit" class=" ms-3 btn rounded-pill btn-danger">Cancle</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- / Content -->
    @endsection
