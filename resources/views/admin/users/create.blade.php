@extends('admin.layout')

@section('content')
    <div class="wrapper content-wrapper">
        <form class="col-md-6" action="{{ route('admin.users.store') }}" method="post" accept-charset="UTF-8">
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
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="text" name="password" id="password" class="form-control">
                    </div>
                    <a href="{{route('admin.users.index')}}" class="ml-1 btn btn-secondary float-left">Назад</a>
                    <input type="submit" value="Create new User" class="ml-1 btn btn-success float-right">
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </form>
    </div>
@endsection
