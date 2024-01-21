@extends('layout')

@section('content')
    <div class="container px-5 my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 rounded-3 shadow-lg">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="h1 fw-light">Регистрация</div>
                        </div>
                        <div class="container px-5 my-5">
                            <form id="contactForm" method="post" action="{{route('auth.store')}}" novalidate>
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="name">Name</label>
                                    <input class="form-control" name="name" id="name" type="text" placeholder="Name" required />
                                    <div class="invalid-feedback">Name is required.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="emailAddress">Email Address</label>
                                    <input class="form-control" name="email" id="emailAddress" type="email" placeholder="Email Address" required />
                                    <div class="invalid-feedback">Email Address is required.</div>
                                    <div class="invalid-feedback">Email Address is not valid.</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <input class="form-control" name="password" id="password" type="password" placeholder="Password" required />
                                    <div class="invalid-feedback">Password is required.</div>
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
                                    <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS for form validation -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript for form validation -->
    <script>
        (function () {
            'use strict';

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation');

            // Loop over them and prevent submission
            Array.from(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
@endsection
