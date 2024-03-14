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
                        <li class="breadcrumb-item active">Admins</li>
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
                            <h3 class="card-title">All Admins</h3>

                            <div class="card-tools">
                                <a href="{{url("dashboard/admins/create")}}" class="btn btn-sm btn-primary">
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
                                    <th>Email</th>
                                    <th>Salary</th>
                                    <th>isSuperAdmin</th>
                                    <th>Toggle</th>
                                    <th>Show</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                dd($admins);--}}
                                @foreach ($admins as $admin)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td >{{ $admin->user->name }}</td>
                                        <td >{{ $admin->user->email }}</td>
                                        <td >{{ $admin->salary }}</td>
                                        <td >{{ $admin->isSuperAdmin }}</td>
{{--                                        <td >{{ $admin->role->name }}</td>--}}


                                        <td>
                                            @if(is_null($admin->deleted_at))
                                                <a href="{{url("/dashboard/admins/delete/$admin->id")}}" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-level-up-alt"></i>
                                                </a>
{{--                                            @endif--}}
                                            @else
{{--                                                @if($admin->trashed())--}}
{{--                                            {{dump($admin)}}--}}
{{--                                            {{dump($admin->trashed())}}--}}
{{--                                            {{$admin = \App\Models\Admin::where('id', $admin->id)->first()}}--}}
                                                    <a href="{{url("/dashboard/admins/restore/$admin->id")}}" class="btn btn-sm btn-success">
                                                        <i class="fas fa-level-down-alt"></i>
                                                    </a>
{{--                                                <a href="{{$admin->restore()}}" class="btn btn-sm btn-success">--}}
{{--                                                        <i class="fas fa-level-down-alt"></i>--}}
{{--                                                    </a>--}}
{{--                                                <a href="{{url("/dashboard/admins/test/$admin->id")}}" class="btn btn-sm btn-success">--}}
{{--                                                    <i class="fas fa-level-down-alt"></i>--}}
{{--                                                </a>--}}
                                               @endif
                                        </td>



                                        <td>
                                            <a class="btn btn-sm btn-primary "  href="{{url("dashboard/admins/show/$admin->id")}}" >

                                            <i class="fas fa-eye"></i>

                                            </a>
                                        </td>

                                         <td>
                                            <a class="btn btn-sm btn-info "  href="{{url("dashboard/admins/edit/$admin->id")}}" >

                                                <i class="fas fa-edit"></i>

                                            </a>
                                         </td>



                                @endforeach

                                </tbody>
                            </table>

                            <div class="d-flex my-3 justify-content-center">
                                {{ $admins->links() }}
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

