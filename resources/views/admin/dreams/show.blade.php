@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dream Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dream Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Title</label>
                            <input type="text" value="{{$dream->title}}" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Content</label>
                            <textarea id="content" name="content" class="form-control"
                                      rows="4">{{$dream->content}}</textarea>
                        </div>
                        <a href="{{route('admin.dreams.index')}}" class="ml-1 btn btn-secondary float-left">Назад</a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
