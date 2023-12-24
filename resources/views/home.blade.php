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
                    <a class="contactbtn btn btn-light btn-lg px-4 me-sm-3 mt-2" href="{{route('pages.sign-up')}}">Регистрация</a>
                    <a class="contactbtn btn btn-dark btn-lg px-4 me-sm-3 mt-2" href="{{route('pages.log-in')}}">Вход</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Features section-->
    <section class="py-5 bg-dark text-light" id="features">
        <div class="container px-5 my-5">
            <div class="row gx-5">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h2 class="fw-bolder mb-0">Here's Why!</h2>
                    <h3>It is good for you to write your dreams down</h3>
                </div>
                <div class="col-lg-8">
                    <div class="row gx-5 row-cols-1 row-cols-md-2">
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-collection"></i></div>
                            <h2 class="h5">Pattern Recognition</h2>
                            <p class="mb-0">Consistent dream journaling helps identify recurring themes. Recognizing
                                patterns in your dreams may unveil hidden anxieties, desires, or unresolved issues,
                                contributing to personal growth and understanding.</p>
                        </div>
                        <div class="col mb-5 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-building"></i></div>
                            <h2 class="h5">Self-Reflection</h2>
                            <p class="mb-0">Dreams can offer insights into your subconscious. By documenting them, you
                                gain a tool for self-reflection, allowing you to explore your thoughts, emotions, and
                                concerns on a deeper level.</p>
                        </div>
                        <div class="col mb-5 mb-md-0 h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-toggles2"></i></div>
                            <h2 class="h5">Creativity Boost</h2>
                            <p class="mb-0">Dreams often tap into creative and imaginative realms. Writing them down
                                provides a source of inspiration for artistic endeavors, storytelling, or
                                problem-solving in your waking life.</p>
                        </div>
                        <div class="col h-100">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i
                                    class="bi bi-toggles2"></i></div>
                            <h2 class="h5">Memory Retention</h2>
                            <p class="mb-0">Recording your dreams helps reinforce memory. The act of writing down
                                details can enhance your ability to recall dreams, preventing them from fading away as
                                quickly.</p>
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
                            <div class="col-sm-6 d-none d-sm-block form-image"></div>
                            <div class="col-sm-6 p-4 ">
                                <div class="text-center">
                                    <div id="contactForm" class="h3 fw-light">Контактная Форма</div>
                                </div>
                                <form method="post" action="" data-sb-form-api-token="API_TOKEN">
                                    @csrf
                                    <!-- Name Input -->
                                    <div class="form-floating mb-3">
                                        <input class="form-control bg-dark.bg-gradient" id="name" type="text" placeholder="Name"
                                               data-sb-validations="required"/>
                                        <label for="name">Имя</label>
                                        <div class="invalid-feedback" data-sb-feedback="name:required">Имя обязательно.</div>
                                    </div>

                                    <!-- Email Input -->
                                    <div class="form-floating mb-3">
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
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" id="message" type="text" placeholder="Message"
                                                  style="height: 10rem;" data-sb-validations="required"></textarea>
                                        <label for="message">Сообщение</label>
                                        <div class="invalid-feedback" data-sb-feedback="message:required">Сообщение обязательно</div>
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
                                        <button class="btn btn-primary btn-lg disabled" id="submitButton" type="submit">
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
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!">
                                <h5 class="card-title mb-3">How to analyse your dreams</h5>
                            </a>
                            <p class="card-text mb-0">Some quick example text to build on the card title and make up
                                the bulk of the card's content.</p>
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
                        <img class="card-img-top" src="img/blog1.png" alt="..."/>
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">Media</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!">
                                <h5 class="card-title mb-3">Another blog post title</h5>
                            </a>
                            <p class="card-text mb-0">This text is a bit longer to illustrate the adaptive height of
                                each card. Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
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
                        <img class="card-img-top" src="img/blog1.png" alt="aaaaaaa..."/>
                        <div class="card-body p-4">
                            <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                            <a class="text-decoration-none link-dark stretched-link" href="#!">
                                <h5 class="card-title mb-3">How to fall asleep faster and sleep better</h5>
                            </a>
                            <p class="card-text mb-0">If you're having trouble sleeping, knowing how to sleep better can
                                make a big difference.</p>
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle me-3"
                                         src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..."/>
                                    <div class="small">
                                        <div class="fw-bold">Josiah Barclay</div>
                                        <div class="text-muted">September 14, 2023 &middot; 10 min read</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Call to action-->
            <aside class="bg-secondary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                <div
                    class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                    <div class="mb-4 mb-xl-0">
                        <div class="fs-3 fw-bold text-white">New products, delivered to you.</div>
                        <div class="text-white-50">Sign up for our newsletter for the latest updates.</div>
                    </div>
                    <div class="ms-xl-4">
                        <div class="input-group mb-2">
                            <input class="form-control" type="text" placeholder="Email address..."
                                   aria-label="Email address..." aria-describedby="button-newsletter"/>
                            <button class="btn btn-outline-light" id="button-newsletter" type="button">Sign
                                up
                            </button>
                        </div>
                        <div class="small text-white-50">We care about privacy, and will never share your data.
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </section>
</main>
@endsection
