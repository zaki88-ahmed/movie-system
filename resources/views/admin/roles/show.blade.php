
@extends('admin.layout')


@section('main')

{{--    {{dd($project->id)}}--}}
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{ $role->name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url("dashboard")}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url("dashboard/roles")}}">All Roles</a></li>
                <li class="breadcrumb-item active">{{ $role->name}}</li>
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

            <div class="col-md-10 offset-md-1 pb-3">

                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Role</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-lg">

                        <tbody>


                        </tbody>

                          <div class="card-body">
                              <div class="row">
                                  <div class="col-6">
                                      <div class="form-group">
                                          <label>Name</label>
                                          <label class="form-control" >{{ $role->name }}</label>
                                      </div>
                                  </div>
                                  <div class="col-6">
                                      <div class="card-body table-responsive p-0">


                        </div>
                                      </div>
                                  </div>

                              </div>
                          </div>

                          <tbody>



                          </tbody>

                      </table>
                    </div>
                    <!-- /.card-body -->
                </div>
{{--                <div class="card">--}}
{{--                    @foreach($permissions as $permission)--}}
{{--                        <li >{{$permission->name}}</li>--}}
{{--                    @endforeach--}}
{{--                </div>--}}







                <a class="btn btn-sm btn-primary" href="{{url("dashboard/roles")}}">Back</a>
            </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection



