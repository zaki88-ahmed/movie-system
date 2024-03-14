

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
                <form method="POST" action="{{url("dashboard/movies/update/$movie->id")}}" enctype="multipart/form-data">

                  @csrf

                  <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Title(en)</label>
                                <input type="text" class="form-control" name="title_en" value="{{$movie->getTranslations('title')['en']}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Title(ar)</label>
                            <input type="text" class="form-control" name="title_ar" value="{{$movie->getTranslations('title')['ar']}}">
                        </div>
                        </div>

                    </div>
                      <div class="col-6">
                          <div class="form-group">
                              <label>Summary(en)</label>
                              <input type="text" class="form-control" name="summary_en" value="{{$movie->getTranslations('summary')['en']}}">
                          </div>
                          <div class="col-6">
                              <div class="form-group">
                                  <label>Summary(ar)</label>
                                  <input type="text" class="form-control" name="summary_ar" value="{{$movie->getTranslations('summary')['ar']}}">
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group">
                                  <label>Duration</label>
                                  <input type="text" class="form-control" name="duration" value="{{$movie->duration}}">
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group">
                                  <label>Launched Year</label>
                                  <input type="text" class="form-control" name="launched_year" value="{{$movie->launched_year}}">
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group">
                                  <label>isFree</label>
                                  <input type="text" class="form-control" name="isFree" value="{{$movie->isFree}}">
                              </div>
                          </div>
                          <div class="col-6">
                              <div class="form-group">
                                  <label> Media </label>
                                  <div class="input-group">
                                      @foreach($movie->medias()->get() as $media)
                                          <img src="{{url("storage/" . $media->url)}}" alt="No-Media" width="100px" height="100px">
                                      @endforeach
                                  </div>
                                  <br>
                                  <div class="input-group">
                                      <div class="custom-file">
                                          <input type="file" class="custom-file-input" name="media[]" multiple>
                                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                    </div>
                    <div>
                        <button type="submit" class="btn btn-success" >Submit</button>
                        <a class="btn btn-sm btn-primary" href="{{url("dashboard/movies")}}" >Back</a>
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




