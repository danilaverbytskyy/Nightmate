<style>

</style>

@extends('layout')

@section('content')
    <div class="bg-success-subtle pt-4">
        <div class="container">
            <div class="vault">
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

                <div class="accordion accordion-flush pt-3 pb-3" id="accordionFlushExample">
                    <div class="d-grid gap-2">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                            <i class="fa-solid fa-plus"></i> Добавить Сон
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                             tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Добавить сон</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('dream.store')}}" method="post">
                                            @csrf
                                            @if($errors->any())
                                                <ul>
                                                @foreach($errors as $error)
                                                        <li>{{$error->message()}}</li>
                                                @endforeach
                                                </ul>
                                            @endif
                                            <div class="form-floating mb-3">
                                                <input name="date" type="date" class="form-control" id="floatingDate" value="{{ date('Y-m-d') }}">
                                                <label for="floatingDate">Дата</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input name="title" type="text" class="form-control" id="floatingInput"
                                                       placeholder="name@example.com">
                                                <label for="floatingInput">Название</label>
                                            </div>
                                            <div class="form-floating">
                                                <textarea name="content" class="form-control" placeholder="Напишите сюжет сна здесь"
                                                          id="floatingTextarea2" style="height: 40vh"></textarea>
                                                <label for="floatingTextarea2">Сюжет Сна</label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Закрыть
                                                </button>
                                                <button type="submit" class="btn btn-primary">Добавить</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    </div>
@endsection
