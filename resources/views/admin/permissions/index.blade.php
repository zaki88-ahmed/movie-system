@extends('admin.layout')

@section('main')


 //https://adminlte.io/themes/v3/

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Admins</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Permissions</li>
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
                <div class="col-12">



                    @include('admin.inc.messages')


                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Permissions</h3>

{{--                            <div class="card-tools">--}}
{{--                                <a href="{{url("dashboard/permissions/create")}}" class="btn btn-sm btn-primary">--}}
{{--                                    Add New--}}
{{--                                </a>--}}




{{--                            </div>--}}


                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Show</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                dd($admins);--}}
                                @foreach ($permissions as $permission)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td >{{ $permission->name }}</td>
{{--                                        <td >{{ $admin->role->name }}</td>--}}
                                        <td>
                                            <a class="btn btn-sm btn-primary "  href="{{url("dashboard/permissions/show/$permission->id")}}" >

                                            <i class="fas fa-eye"></i>

                                            </a>
                                        </td>

                                @endforeach

                                </tbody>
                            </table>

                            <div class="d-flex my-3 justify-content-center">
                                {{ $permissions->links() }}
{{--                                {{ $admins }}--}}
                            </div>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->













@endsection



@section('scripts')

    <script>


    </script>

@endsection

