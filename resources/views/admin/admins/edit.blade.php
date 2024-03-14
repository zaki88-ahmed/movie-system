

@extends('admin.layout')


@section('main')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
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

                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{url("dashboard/admins/update/$admin->id")}}" enctype="multipart/form-data">

                  @csrf

                  <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $admin->user->name }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Mail</label>
                                <input type="text" class="form-control" name="email"  value="{{ $admin->user->email }}">
                            </div>
                        </div>

                    </div>
                      <div class="col-6">
                          <div class="form-group">
                              <label>Salary</label>
                              <input type="text" class="form-control" name="salary"  value="{{ $admin->salary }}">
                          </div>
                          <div class="col-6">
                              <div class="form-group">
                                  <label>isSuperAdmin</label>
                                  <input type="text" class="form-control" name="isSuperAdmin"  value="{{ $admin->isSuperAdmin }}">
                              </div>
                          </div>

                          <div class="col-6">
                            <div class="form-group">
                                <label>Assign Role</label>
                                  <select class="custom-select form-control" id="edit-form-role-id" name="role_id">
                                  @foreach($roles as $role)
                                      <option value="{{$role->id}}"
                                              @if($role->id)
                                                  selected
                                          @endif>
                                          {{$role->name}}
                                      </option>
                                      @endforeach
                                      </select>
                              </div>
                            </div>
                        </div>
                      </div>

                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" >Submit</button>
                        <a class="btn btn-sm btn-primary" href="{{url()->previous()}}">Back</a>
                    </div>

                  </div>
                  <!-- /.card-body -->


                </form>
              </div>



        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection




