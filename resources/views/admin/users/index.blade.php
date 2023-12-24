@extends('admin.layout')

@section('content')
    <div class="wrapper content-wrapper">
        <h1 class="mt-2 ml-3">Users</h1>
        <a class="btn btn-success m-3" href="{{route('admin.users.create')}}">Добавить Пользователя</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>

                <td class="project-actions">
                    <a class="btn btn-info btn-sm"
                       href="{{route('admin.users.edit', ['id' => $user->id])}}">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                    </a>
                    <form method="post" onclick="return confirm('are you sure?')"
                          action="{{route('admin.users.destroy', ['id' => $user->id])}}"
                          accept-charset="UTF-8">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </button>
                    </form>
                </td>

            </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endsection
