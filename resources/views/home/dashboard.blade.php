<style>
    .profile-pic {
        border-radius: 25px;
    }

    .achievements {
        border-style: solid;
        border-width: 3px;
        width: 200px;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }
</style>

@extends('layout')

@section('content')
    <div class="bg-success-subtle pt-4">
        <div class="container">
            <img src="img/cat1.jpg" height="200" width="300" class="mx-auto d-block profile-pic" alt="...">
            <h2 class="text-center">{{$userName}}</h2>
            <ul class="list-group list-group-horizontal achievements bg-warning-subtle">
                <li class="list-group-item">
                    <h3>{{$dreamQuantity}}</h3>
                    <p>Снов Записано</p>
                </li>
                <li class="list-group-item">
                    <h3>{{$daysStrike}}</h3>
                    <p>Дней Подряд</p>
                </li>
            </ul>

            <div class="accordion accordion-flush pt-3" id="accordionFlushExample">
                <div class="accordion-item">
                    @foreach($dreams as $key => $dream)
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapse{{$key}}" aria-expanded="false"
                                    aria-controls="flush-collapse{{$key}}">
                                {{$dream->created_at . ' - ' . $dream->title}}
                            </button>
                        </h2>
                        <div id="flush-collapse{{$key}}" class="accordion-collapse collapse"
                             data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                {{$dream->content}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
