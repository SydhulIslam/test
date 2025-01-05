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

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category /</span> Edit & Create </h4>

                @if(session()->has('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @endif

                @if(session()->has('danger'))
                <div class="alert alert-danger">{{session('danger')}}</div>
                @endif

                <!-- Basic Layout & Basic with Icons -->
                <div class="row">
                    <!-- Basic Layout -->

                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0"> {{$title}} </h5>
                            </div>
                            <div class="card-body">

                                <form method="POST" action="{{route('category.update', $category->id)}}" enctype="multipart/form-data" >

                                @csrf
                                @method('put')

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="basic-default-name" placeholder="John Doe" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Category Slug</label>
                                        <div class="col-sm-10">
                                            <input
                                            type="text"
                                            name="slug"
                                            value="{{ $category->slug }}"
                                            class="form-control"
                                            id="basic-default-company"
                                            placeholder="ACME Inc."
                                            />
                                        </div>
                                    </div>




                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Update Category</button>
                                            <button type="submit" class="btn btn-danger">Cancle</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-xxl">
                        <!-- Hoverable Table rows -->
                        <div class="card">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h5 class="card-header">Hoverable rows</h5>
                                </div>
                                <div class="col-lg-8">
                                    <form class="d-flex card-header" action="{{route('blog.index')}}">
                                        <input class="form-control me-2 rounded" type="search" value=" {{ $keyword }} " name="search" id="" placeholder="Search Bar">
                                        <button type="send" class="btn btn-info" >Search</button>
                                    </form>
                                </div>
                            </div>

                            <div class="table-responsive text-nowrap">
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">

                                @foreach($categoryes->all() as $category)
                                <tr>

                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong> {{$category->id}} </strong></td>

                                    <td>{{$category->name}}</td>


                                    <td>
                                        <div class="d-grid gap-2 col-6 mx-auto">

                                            <a class="dropdown-item btn btn-primary" href="{{route('category.edit', $category->id)}}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>

                                            <form method="post" action="{{route('category.destroy', $category->id)}}">

                                                @csrf
                                                @method('DELETE')


                                                <div class="modal fade" id="smallModal{{$category->id}}" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel2">Remove Category : {{$category->name}}</h5>
                                                                <button
                                                                    type="button"
                                                                    class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"
                                                                ></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <hr>
                                                                <p> Are You Sure, You Removed this Category !! </p>
                                                                <hr>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"> Close </button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#smallModal{{$category->id}}"> Remove </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                            </div>

                            <div class="col-12">
                                <nav class="mt-4">
                                    <!-- pagination -->
                                    <nav class="mb-md-50">
                                        <ul class="pagination justify-content-center">
                                            {{ $categoryes->links("vendor.pagination.bootstrap-4") }}
                                        </ul>
                                    </nav>
                                </nav>
                            </div>

                        </div>
                        <!--/ Hoverable Table rows -->


                    </div>

                </div>
                
            </div>
            <!-- / Content -->

            @endsection
