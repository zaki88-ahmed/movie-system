

@extends('admin.layout')


@section('main')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Role Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Role Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">


                    <div class="col-12 pb-3">

                        @include('admin.inc.errors')

                            <form method="POST" action="{{url("dashboard/roles/store")}}" enctype="multipart/form-data">


                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                @foreach($permissions as $permission)
                                                    <div class="list-group-item">
                                                        {{-- <input  type="checkbox" id="scales" name="permission[{{$permission->id}}]"  /> --}}
                                                        {{-- <input  type="checkbox" id="scales" name="permission[]  "  /> --}}
                                                        <input  type="checkbox" id="scales" name="rolePermission[{{ $permission->id }}]  "  />
                                                        <label for="scales">{{$permission->name}}</label>
{{--                                                        <label>--}}
{{--                                                            @php $checked = in_array($permission->name, old('permissions', [])) @endphp--}}
{{--                                                            <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"{{ $checked ? ' checked' : '' }}> {{ $permission->name }}--}}
{{--                                                        </label>--}}
                                            </div>

                                                @endforeach

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-success" >Submit</button>
                                    <a class="btn btn-sm btn-primary" href="{{url()->previous()}}">Back</a>
                                </div>

                            </form>

                        </div>
                        <!-- /.card-body -->



                    <!-- /.card-header -->
                        <!-- form start -->


                </div>



                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection




