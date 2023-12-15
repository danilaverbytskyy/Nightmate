@extends('layout')

@section('content')
    <!-- Bootstrap 5 Contact Form Snippet -->
    <div class="container px-5 my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 rounded-3 shadow-lg">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="h1 fw-light">Регистрация</div>
                        </div>

                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name Input -->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Name" data-sb-validations="required" />
                                <label for="name">Nickname</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Nickname is required.</div>
                            </div>

                            <!-- Email Input -->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="emailAddress" type="email" placeholder="Email Address" data-sb-validations="required,email" />
                                <label for="emailAddress">Email Address</label>
                                <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not valid.</div>
                            </div>

                            <div class="form-floating mb-3">
                                <input class="form-control" id="password" type="text" placeholder="Password" data-sb-validations="required" />
                                <label for="password">Password</label>
                                <div class="invalid-feedback" data-sb-feedback="password:required">Password is required.</div>
                            </div>

                            <!-- Submit success message -->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    <p>To activate this form, sign up at</p>
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>

                            <!-- Submit error message -->
                            <div class="d-none" id="submitErrorMessage">
                                <div class="text-center text-danger mb-3">Error sending message!</div>
                            </div>

                            <!-- Submit button -->
                            <div class="d-grid">
                                <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">Submit</button>
                            </div>
                        </form>
                        <!-- End of contact form -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
