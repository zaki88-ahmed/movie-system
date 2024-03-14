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
                    <h1 class="m-0 text-dark">All Movies</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Movies</li>
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
                                <a href="{{url("dashboard/movies/create")}}" class="btn btn-sm btn-primary">
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
                                    <th>Title(en)</th>
                                    <th>Title(ar)</th>
                                    <th>Summary(en)</th>
                                    <th>Summary(ar)</th>
                                    <th>Duration</th>
                                    <th>Lanched Year</th>
                                    <th>is Free</th>
                                    <th>Media</th>
                                    <th>Toggle</th>
                                    <th>Show</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @dump($movies);--}}
                                @foreach ($movies as $movie)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td >{{ $movie->getTranslations('title')['en']}}</td>
                                        <td >{{ $movie->getTranslations('title')['ar']}}</td>
                                        <td >{{ $movie->getTranslations('summary')['en']}}</td>
                                        <td >{{ $movie->getTranslations('summary')['ar']}}</td>
                                        <td >{{ $movie->duration }}</td>
                                        <td >{{ $movie->launched_year }}</td>
                                        <td >{{ $movie->isFree }}</td>
{{--                                        <td >{{ $movie->medias }}</td>--}}
                                        <td>
{{--                                            @dump($movie->medias()->pluck('url'))--}}
                                        @foreach($movie->medias()->get() as $media)
{{--                                                @dump(url($media->url))--}}
{{--                                            {{$media->value('url')}}--}}
{{--                                            @dump($media)--}}
{{--                                            <img src="{{"movie_medias/" . $media->url}}">--}}
{{--                                            <img src="{{"movie_medias/" . $media->url}}">--}}

                                            <img src="{{url("storage/" . $media->url)}}" alt="No-Media" width="100px" height="100px">

                                        @endforeach
                                        </td>

{{--                                        <td >{{ $movie->user->name }}</td>--}}
{{--                                        <td >{{ $movie->user->name }}</td>--}}
{{--                                        <td >{{ $movie->user->name }}</td>--}}
{{--                                        <td >{{ $movie->user->email }}</td>--}}
{{--                                        <td >{{ $movie->salary }}</td>--}}
{{--                                        <td >{{ $movie->isSuperAdmin }}</td>--}}
{{--                                        <td >{{ $admin->role->name }}</td>--}}


                                        <td>
                                            @if(!$movie->deleted_at)
                                                <a href="{{url("/dashboard/movies/delete/$movie->id")}}" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-level-up-alt"></i>
                                                </a>
                                            @else
                                                <a href="{{url("/dashboard/movies/restore/$movie->id")}}" class="btn btn-sm btn-success">
                                                    <i class="fas fa-level-down-alt"></i>
                                                </a>
                                            @endif
                                        </td>



                                        <td>
                                            <a class="btn btn-sm btn-primary "  href="{{url("dashboard/movies/show/$movie->id")}}" >

                                            <i class="fas fa-eye"></i>

                                            </a>
                                        </td>

                                         <td>
                                            <a class="btn btn-sm btn-info "  href="{{url("dashboard/movies/edit/$movie->id")}}" >

                                                <i class="fas fa-edit"></i>

                                            </a>
                                         </td>



                                @endforeach

                                </tbody>
                            </table>

                            <div class="d-flex my-3 justify-content-center">
                                {{ $movies->links() }}
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

