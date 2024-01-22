@extends('layout')

@section('content')
    <div class="auth-form">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card border-0 shadow rounded-3 my-5">
                        <div class="card-body p-4 p-sm-5">
                            <h5 class="card-title text-center mb-5 fw-light fs-5">Вход</h5>
                            <form method="get" action="{{ route('auth.enter') }}" class="needs-validation" novalidate>
                                @csrf
                                <div class="form-floating mb-3">
                                    <input name="email" type="email" class="form-control" id="floatingEmail" placeholder="name@example.com" required>
                                    <label for="floatingEmail">Email</label>
                                    <div class="invalid-feedback">Пожалуйста, введите корректный email.</div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                                    <label for="floatingPassword">Пароль</label>
                                    <div class="invalid-feedback">Пожалуйста, введите пароль.</div>
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="d-grid">
                                    <input value="Войти" class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">
                                </div>
                                <hr class="my-4">
                                <div class="d-grid mb-2">
                                    <a href="{{ route('auth.sign-up') }}" class="text-center">Еще не зарегистрированы?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        (function () {
            'use strict'

            let forms = document.querySelectorAll('.needs-validation');

            Array.from(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endsection
