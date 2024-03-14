
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
            <h1 class="m-0 text-dark">{{$movie->title}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url("dashboard")}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url("dashboard/movies")}}">OAll Movies</a></li>
                <li class="breadcrumb-item active">{{$movie->getTranslations('title')['en']}}</li>
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
                      <h3 class="card-title">Movie</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-lg">

                        <tbody>

                          <tr>
                            <th>Title(en)</th>
                            <td>{{ $movie->getTranslations('title')['en'] }}</td>
                            <td>
                          </tr>
                          <tr>
                              <th>Title(ar)</th>
                              <td>{{ $movie->getTranslations('title')['ar'] }}</td>
                              <td>
                          </tr>

                          <tr>
                              <th>Summary(en)</th>
                              <td>{{ $movie->getTranslations('summary')['en'] }}</td>
                              <td>
                          </tr>
                          <tr>
                              <th>Summary(ar)</th>
                              <td>{{ $movie->getTranslations('summary')['ar']}}</td>
                              <td>
                          </tr>
                          <tr>
                              <th>Duration</th>
                              <td>{{ $movie->duration  }}</td>
                              <td>
                          </tr>
                          <tr>
                              <th>Launched Year</th>
                              <td>{{ $movie->launched_year }}</td>
                              <td>
                          </tr>

                          <tr>
                              <th>isFree</th>
                              <td>{{ $movie->isFree}}</td>
                              <td>
                          </tr>
                          <tr>
                              <th>Media</th>
                              <td>
                                  @foreach($movie->medias()->get() as $media)
                                      <img src="{{url("storage/" . $media->url)}}" alt="No-Media" width="100px" height="100px">
                                  @endforeach
                              </td>
                              <td>
{{--                              @foreach($movie->medias()->get() as $media)--}}
{{--                                  @dump($media)--}}
{{--                                  <img src="{{url("storage/" . $media->url)}}" alt="No-Media" width="100px" height="100px">--}}
{{--                              @endforeach--}}
{{--                              @dump($movie->medias()->get()->pluck('url'))--}}
{{--                              @if($movie->medias()->get()->url))--}}
{{--                              <td>--}}
{{--                                  @foreach($movie->medias()->get() as $media)--}}
{{--                                      <img src="{{url("storage/" . $media->url)}}" alt="No-Media" width="100px" height="100px">--}}

{{--                              @endforeach--}}
{{--                              <td>--}}
{{--                              @endif--}}

                          </tr>


{{--                          <tr>--}}
{{--                            <th>Image</th>--}}
{{--                            <td>--}}
{{--                              <img src="{{asset("uploads/$exam->img")}}" height="50px">--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                          </tr>--}}





                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                </div>


                <a class="btn btn-sm btn-primary" href="{{url()->previous()}}">Back</a>

            </div>




        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection



