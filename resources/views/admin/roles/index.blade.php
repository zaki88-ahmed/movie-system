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
                    <h1 class="m-0 text-dark">Roles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Roles</li>
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
                            <h3 class="card-title">All Roles</h3>

                            <div class="card-tools">
                                <a href="{{url("dashboard/roles/create")}}" class="btn btn-sm btn-primary">
                                    Add New
                                </a>




                            </div>


                        </div>

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Delete</th>
                                    <th>Show</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                dd($admins);--}}
                                @foreach ($roles as $role)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td >{{ $role->name }}</td>
{{--                                        <td >{{ $admin->role->name }}</td>--}}


                                        <td>
                                                <a href="{{url("/dashboard/roles/delete/$role->id")}}" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-level-up-alt"></i>
{{--                                            @endif--}}
{{--                                                @if($admin->trashed())--}}
{{--                                            {{dump($admin)}}--}}
{{--                                            {{dump($admin->trashed())}}--}}
{{--                                            {{$admin = \App\Models\Admin::where('id', $admin->id)->first()}}--}}
{{--                                                <a href="{{$admin->restore()}}" class="btn btn-sm btn-success">--}}
{{--                                                        <i class="fas fa-level-down-alt"></i>--}}
{{--                                                    </a>--}}
{{--                                                <a href="{{url("/dashboard/admins/test/$admin->id")}}" class="btn btn-sm btn-success">--}}
{{--                                                    <i class="fas fa-level-down-alt"></i>--}}
{{--                                                </a>--}}
                                        </td>



                                        <td>
                                            <a class="btn btn-sm btn-primary "  href="{{url("dashboard/roles/show/$role->id")}}" >

                                            <i class="fas fa-eye"></i>

                                            </a>
                                        </td>

                                         <td>
                                            <a class="btn btn-sm btn-info "  href="{{url("dashboard/roles/edit/$role->id")}}" >

                                                <i class="fas fa-edit"></i>

                                            </a>
                                         </td>



                                @endforeach

                                </tbody>
                            </table>

                            <div class="d-flex my-3 justify-content-center">
                                {{ $roles->links() }}
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

