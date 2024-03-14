

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
                <form method="POST" action="{{url("dashboard/reviews/update/$review->id")}}" enctype="multipart/form-data">

                  @csrf

                  <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">

                                <label for="stars">Stars</label>
                                <select class="custom-select form-control" id="stars" name="stars">
                                    <option value="">{{$review->stars}}</option>
{{--                                    <option value="1">1</option>--}}
{{--                                    <option value="2">2</option>--}}
{{--                                    <option value="3">3</option>--}}
{{--                                    <option value="4">4</option>--}}
{{--                                    <option value="5">5</option>--}}
                                    @foreach($stars as $star)
                                        <option value="{{$star}}">{{$star}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Comment</label>
                                <input type="text" class="form-control" name="comment"  value="{{ $review->comment }}">
                            </div>
                        </div>

                    </div>
                      <div class="col-6">
                          <div class="form-group">
                              <label>IsHidden</label>
                              <input type="text" class="form-control" name="is_hidden"  value="{{ $review->is_hidden }}">
                          </div>
                          <div class="col-6">
                              <div class="form-group">
                                  <label>User</label>
                                  <select class="custom-select form-control" id="edit-form-cat-id" name="user_id">
                                  @foreach($users as $user)
                                      <option value="{{$user->id}}"
                                              @if($review->user_id == $user->id)
                                                  selected
                                          @endif>
                                          {{$user->name}}
                                      </option>
                                      @endforeach
                                      </select>
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group">
                                  <label>Movie</label>
                                  <select class="custom-select form-control" id="edit-form-cat-id" name="movie_id">
                                      @foreach($movies as $movie)
                                          <option value="{{$movie->id}}"
                                                  @if($review->movie_id == $movie->id)
                                                      selected
                                              @endif>
                                              {{$movie->getTranslations('title')['en']}}
                                          </option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                      </div>

                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" >Submit</button>
                        <a class="btn btn-sm btn-primary" href="{{url()->previous()}}">Back</a>
                    </div><!-- /.card-body -->


                </form>
              </div>



        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection




