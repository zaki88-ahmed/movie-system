

@extends('admin.layout')


@section('main')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Admin Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Review Page</li>
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
                        <form method="POST" action="{{url("dashboard/reviews/store")}}" enctype="multipart/form-data">

                            @csrf

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Stars</label>
                                            <select class="custom-select form-control" id="edit-form-cat-id" name="stars">
                                                @foreach($stars as $star)
                                                    <option >{{$star}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>isHidden</label>
                                            <input type="text" class="form-control" name="is_hidden">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Comment</label>
                                            <input type="text" class="form-control" name="comment">
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="form-group">
                                        <label>User</label>
                                        <select class="custom-select form-control" id="edit-form-cat-id" name="user_id">
                                            @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Movie</label>
                                        <select class="custom-select form-control" id="edit-form-cat-id" name="movie_id">
                                            @foreach($movies as $movie)
                                                <option value="{{$movie->id}}">{{$movie->getTranslations('title')['en']}}</option>
                                            @endforeach
                                        </select>
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




