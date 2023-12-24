@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Edit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Edit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form class="col-md-6" action="{{ route('admin.users.update', ['id' => $user->id]) }}" method="POST" accept-charset="UTF-8">
                    @method('PUT')
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
                                <label for="inputName">Name</label>
                                <input type="text" value="{{$user->name}}" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" value="{{$user->email}}" name="email" id="email" class="form-control">
                            </div>
                            <a href="{{route('admin.users.index')}}" class="ml-1 btn btn-secondary float-left">Назад</a>
                            <input type="submit" value="Edit User" class="ml-1 btn btn-warning float-right">
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </form>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
