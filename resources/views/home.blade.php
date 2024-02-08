@php use Illuminate\Support\Facades\Auth; @endphp
@extends('layout')

@section('content')
    <main class="flex-shrink-0 bg-dark">
        <!-- Header-->
        <header class="bg-dark py-5 description">
            <!-- This div is  intentionally blank. It creates the transparent black overlay over the video which you can modify in the CSS -->
            <div class="overlay"></div>

            <!-- The HTML5 video element that will create the background video on the header -->
            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                <source src="/img/headerVideo.mp4" type="video/mp4">
            </video>

            <!-- The header content -->
            <div class="container h-100">
                <div class="d-flex h-100 text-center align-items-center">
                    <div class="w-100 text-white">
                        <h1 class="display-3">Современный трекер для записи снов</h1>
                        <p class="lead mb-0">Каждодневный способ сохранить свои уникальные ночные воспоминания</p>
                        @if(Auth::check())
                            <a class="btn text-dark bg-info-subtle btn-lg px-4 me-sm-3 mt-2"
                               href="{{route('home.dashboard')}}">Посмореть
                                Сны</a>
                        @else
                            <a class="contactbtn btn btn-light btn-lg px-4 me-sm-3 mt-2"
                               href="{{route('auth.sign-up')}}">Регистрация</a>
                            <a class="contactbtn btn btn-dark btn-lg px-4 me-sm-3 mt-2"
                               href="{{route('auth.sign-in')}}">Вход</a>
                        @endif
                    </div>
                </div>
            </div>
        </header>

        <!-- Features section-->
        <section class="py-5 bg-dark text-light" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h2 class="fw-bolder mb-0">This Is Why!</h2>
                        <h3>Вот, почему полезно записывать свои сны</h3>
                    </div>
                    <div class="col-lg-8">
                        <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <div class="col mb-5 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                            class="bi bi-collection"></i></div>
                                <h2 class="h5">Обнаружение Шаблонов</h2>
                                <p class="mb-0">Систематическое ведение дневника снов помогает выявить повторяющиеся
                                    темы. Замечание
                                    узоров в ваших снах может раскрывать скрытые тревоги, желания или нерешенные
                                    проблемы,
                                    способствуя личному росту и пониманию.</p>
                            </div>
                            <div class="col mb-5 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                            class="bi bi-building"></i></div>
                                <h2 class="h5">Саморефлексия</h2>
                                <p class="mb-0">Мечты могут предложить понимание вашего подсознания. Документируя их, вы
                                    получаете инструмент для саморефлексии, позволяющий вам исследовать свои мысли,
                                    эмоции и заботы на более глубоком уровне.</p>
                            </div>
                            <div class="col mb-5 mb-md-0 h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                            class="bi bi-toggles2"></i></div>
                                <h2 class="h5">Улучшение Креативности</h2>
                                <p class="mb-0">Мечты часто заходят в творческие и воображаемые сферы. Записывая их, вы
                                    получаете источник вдохновения для художественных начинаний, рассказов или решения
                                    проблем в вашей бодрствующей жизни.</p>
                            </div>
                            <div class="col h-100">
                                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                            class="bi bi-toggles2"></i></div>
                                <h2 class="h5">Прокачка Памяти</h2>
                                <p class="mb-0">Запись своих снов помогает укрепить память. Действие записи деталей
                                    может улучшить вашу способность вспоминать сны, предотвращая их быстрое
                                    забывание.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bootstrap 5 Contact Form Snippet -->
        <div class="container-fluid px-5 my-5 form">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card border-0 rounded-3 shadow-lg overflow-hidden">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-sm-6 d-none d-sm-block contact-form-image"></div>
                                <div class="col-sm-6 p-4 ">
                                    <div class="text-center">
                                        <div id="contactForm" class="h3 fw-light">Контактная Форма</div>
                                    </div>
                                    <form method="post" action="" data-sb-form-api-token="API_TOKEN">
                                        @csrf
                                        <!-- Name Input -->
                                        <div class="form-floating mb-4">
                                            <input class="form-control bg-dark.bg-gradient" id="name" type="text"
                                                   placeholder="Name"
                                                   data-sb-validations="required"/>
                                            <label for="name">Имя</label>
                                            <div class="invalid-feedback" data-sb-feedback="name:required">Имя
                                                обязательно.
                                            </div>
                                        </div>

                                        <!-- Email Input -->
                                        <div class="form-floating mb-4">
                                            <input class="form-control" id="emailAddress" type="email"
                                                   placeholder="Email Address" data-sb-validations="required,email"/>
                                            <label for="emailAddress">Email</label>
                                            <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email
                                                обязателен.
                                            </div>
                                            <div class="invalid-feedback" data-sb-feedback="emailAddress:email">
                                                Email адресс некорректный
                                            </div>
                                        </div>

                                        <!-- Message Input -->
                                        <div class="form-floating mb-4">
                                        <textarea class="form-control" id="message" type="text" placeholder="Message"
                                                  style="height: 10rem;" data-sb-validations="required"></textarea>
                                            <label for="message">Сообщение</label>
                                            <div class="invalid-feedback" data-sb-feedback="message:required">Сообщение
                                                обязательно
                                            </div>
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
                                            <div class="text-center text-danger mb-3">Ошибка отправления!</div>
                                        </div>

                                        <!-- Submit button -->
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-lg disabled" id="submitButton"
                                                    type="submit">
                                                Отправить
                                            </button>
                                        </div>
                                    </form>
                                    <!-- End of contact form -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog preview section-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <div class="text-center">
                            <h2 class="fw-bolder">From our blog</h2>
                            <p class="lead fw-normal text-muted mb-5">Lorem ipsum, dolor sit amet consectetur
                                adipisicing elit. Eaque fugit ratione dicta mollitia. Officiis ad.</p>
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="img/blog1.png" alt="..."/>
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">Советы</div>
                                <a class="text-decoration-none link-dark stretched-link" href="#">
                                    <h5 class="card-title mb-3">Как правильно анализировать сны</h5>
                                </a>
                                <p class="card-text mb-0">Сны у каждого
                                    человека могут иметь свои собственные символы и значения. Однако, есть некоторые
                                    общие подходы к анализу снов</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-3"
                                             src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..."/>
                                        <div class="small">
                                            <div class="fw-bold">Dr. Bekher</div>
                                            <div class="text-muted">March 12, 2023 &middot; 6 min read</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="img/blog2.jpg" alt="..."/>
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">Инсайты</div>
                                <a class="text-decoration-none link-dark stretched-link" href="#!">
                                    <h5 class="card-title mb-3">Стань машиной за 3 ночи</h5>
                                </a>
                                <p class="card-text mb-0">Спать на полу - это как тренировка для спины, только без
                                    зарядки и пота!</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-3"
                                             src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..."/>
                                        <div class="small">
                                            <div class="fw-bold">Josiah Barclay</div>
                                            <div class="text-muted">March 23, 2023 &middot; 4 min read</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            <img class="card-img-top" src="img/blog3.jpg" alt="..."/>
                            <div class="card-body p-4">
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">Советы</div>
                                <a class="text-decoration-none link-dark stretched-link" href="#!">
                                    <h5 class="card-title mb-3">Как засыпать быстрее и сделать свой сон лучше</h5>
                                </a>
                                <p class="card-text mb-0">Некоторые люди утверждают, что употребление алкоголя перед
                                    сном помогает им засыпать быстрее. Но так ли это безопасно?</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-3"
                                             src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..."/>
                                        <div class="small">
                                            <div class="fw-bold">Dr. Bekher</div>
                                            <div class="text-muted">September 14, 2023 &middot; 10 min read</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
