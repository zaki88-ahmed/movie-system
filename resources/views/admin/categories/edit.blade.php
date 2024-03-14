

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
                <form method="POST" action="{{url("dashboard/categories/update/$category->id")}}" enctype="multipart/form-data">

                  @csrf

                  <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Name(en)</label>
                                <input type="text" class="form-control" name="name_en" value="{{ $category->getTranslations('name')['en'] }}">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label>Name(ar)</label>
                                <input type="text" class="form-control" name="name_ar" value="{{ $category->getTranslations('name')['ar'] }}">
                            </div>
                        </div>

                    </div>
                      <div class="col-6">
                          <div class="form-group">
                              <label>Parent_id</label>
                              <select class="custom-select form-control" id="edit-form-cat-id" name="parent_id">
                                  @foreach($categories as $category)
                                      <option value="{{$category->id}}"
                                              @if($category->parent_id == $category->id)
                                                  selected
                                          @endif>
                                          {{$category->getTranslations('name')['en']}}
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




