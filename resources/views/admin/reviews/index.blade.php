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
                    <h1 class="m-0 text-dark">Reviews</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Reviews</li>
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
                            <h3 class="card-title">All Reviews</h3>

                            <div class="card-tools">
                                <a href="{{url("dashboard/reviews/create")}}" class="btn btn-sm btn-primary">
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
                                    <th>Stars</th>
                                    <th>Comment</th>
                                    <th>isHidden</th>
                                    <th>user_id</th>
                                    <th>movie_id</th>
                                    <th>Toggle</th>
                                    <th>Show</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                dd($admins);--}}
                                @foreach ($reviews as $review)

                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td >{{ $review->stars }}</td>
                                        <td >{{ $review->comment }}</td>
                                        <td >{{ $review->is_hidden }}</td>
                                        <td >{{ $review->user_id }}</td>
                                        <td >{{ $review->movie_id }}</td>
{{--                                        <td >{{ $admin->role->name }}</td>--}}


                                        <td>
                                            @if(is_null($review->deleted_at))
                                                <a href="{{url("/dashboard/reviews/delete/$review->id")}}" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-level-up-alt"></i>
                                                </a>
{{--                                            @endif--}}
                                            @else
{{--                                                @if($admin->trashed())--}}
{{--                                            {{dump($admin)}}--}}
{{--                                            {{dump($admin->trashed())}}--}}
{{--                                            {{$admin = \App\Models\Admin::where('id', $admin->id)->first()}}--}}
                                                    <a href="{{url("/dashboard/reviews/restore/$review->id")}}" class="btn btn-sm btn-success">
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
                                            <a class="btn btn-sm btn-primary "  href="{{url("dashboard/reviews/show/$review->id")}}" >

                                            <i class="fas fa-eye"></i>

                                            </a>
                                        </td>

                                         <td>
                                            <a class="btn btn-sm btn-info "  href="{{url("dashboard/reviews/edit/$review->id")}}" >

                                                <i class="fas fa-edit"></i>

                                            </a>
                                         </td>



                                @endforeach

                                </tbody>
                            </table>

                            <div class="d-flex my-3 justify-content-center">
                                {{ $reviews->links() }}
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

