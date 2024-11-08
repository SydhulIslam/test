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

            {{-- content --}}

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">

                        @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        @if ($errors->any())
                            <ul class="alert alert-warning">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="card">
                            <div class="card-header">
                                <h4>Role : {{ $role->name }}
                                    <a href="{{ url('roles') }}" class="btn btn-danger float-end">Back</a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action= "{{ url('roles/' . $role->id . '/give-permissions') }}" method= "POST">

                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">

                                        @error('permission')
                                            <spen class="text-danger">{{ $message }}</spen>
                                        @enderror

                                        <label for="">Permissions</label>
                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                <div class="col-md-3">
                                                    <label>
                                                        <input type="checkbox" name="permission[]"
                                                            value="{{ $permission->name }}" {{in_array($permission->id, $rolePermission)? 'checked' : ''}}/>
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary"> Update </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            {{-- end content --}}
        @endsection
