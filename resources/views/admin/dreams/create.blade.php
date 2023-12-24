@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dream Add</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dream Add</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form class="col-md-6" action="{{ route('admin.dreams.store') }}" method="post" accept-charset="UTF-8">
                        @csrf
                        @include('admin.errors')
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
                                    <input type="text" name="title" id="title" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Content</label>
                                    <textarea id="content" name="content" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="inputUserID">User ID</label>
                                    <input type="number" name="user_id" id="user_id" class="form-control">
                                </div>
                                <a href="{{route('admin.dreams.index')}}" class="ml-1 btn btn-secondary float-left">Назад</a>
                                <input type="submit" value="Create new Dream" class="ml-1 btn btn-success float-right">
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
