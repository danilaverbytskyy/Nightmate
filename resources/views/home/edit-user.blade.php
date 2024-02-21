@extends('layout')

@section('content')
<div class="container">
    <form action="{{route('home.update-user')}}" class="form-change-user m-5" method="post">
        @csrf
        @method('put')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input name="email" type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$user->email}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputName" class="col-sm-2 col-form-label">Имя</label>
            <div class="col-sm-10">
                <input name="name" type="text" class="form-control" id="inputName" value="{{$user->name}}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Пароль</label>
            <div class="col-sm-10">
                <input name="password" type="password" class="form-control" id="inputPassword" value="">
                <div id="passwordHelpBlock" class="form-text">
                    Не вводите пароль, если не желаете его изменить
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-warning">Изменить профиль</button>
    </form>
</div>
@endsection