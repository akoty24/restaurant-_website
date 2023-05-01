@extends('front.layout.app')


<!-- ======= Hero Section ======= -->
@section('content')


<section id="hero" class="hero d-flex align-items-center section-bg">

    <div class="container">
        @foreach ($covers as $cover)
            <div class="row justify-content-between gy-5">
                <div
                        class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                    <h2 data-aos="fade-up">{{ $cover->title }}</h2>
                    <p data-aos="fade-up" data-aos-delay="100">{{ $cover->description }}</p>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        <a href="{{ '#book-a-table' }}" class="btn-book-a-table">Book a Table</a>
                        <a href="{{ $cover->video }}" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
                    </div>

                </div>
                <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                    <img src="{{ url('admin/img/cover/', $cover->image) }}" class="img-fluid" alt="" data-aos="zoom-out"
                         data-aos-delay="300">
                </div>
            </div>
        @endforeach
    </div>
</section><!-- End Hero Section -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>About Us</h2>
                @foreach ($abouts as $about)
                <p>Learn More <span>{{ $about->title }}</span></p>
            </div>

            <div class="row gy-4">
                <div class="col-lg-7 position-relative about-img" style="background-image: url('{{ url('admin/img/about/',$about->background_image) }}') ;"
                     data-aos="fade-up" data-aos-delay="150">
                    <div class="call-us position-absolute">
                        <h4>{{ $about->contact }}</h4>
                        <p>+2 {{ $about->phone }}</p>
                    </div>
                </div>
                <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                    <div class="content ps-0 ps-lg-5">
                        <p class="fst-italic">
                            {{ $about->description }}
                        </p>

                        <div class="position-relative mt-4">
                            <img src="{{ url('admin/img/about/',$about->image) }}" class="img-fluid" alt="">
                            <a href="{{ $about->video }}" class="glightbox play-btn"></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section><!-- End About Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">
                @foreach ($wcys as $wcy)
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="why-box">
                            <h3>{{ $wcy->title1 }}</h3>
                            <p>
                                {{ $wcy->desc1 }}
                            </p>
                            <div class="text-center">
                                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Why Box -->

                    <div class="col-lg-8 d-flex align-items-center">
                        <div class="row gy-4">

                            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-clipboard-data"></i>
                                    <h4>{{ $wcy->title2 }}</h4>
                                    <p>{{ $wcy->desc2 }}</p>
                                </div>
                            </div><!-- End Icon Box -->

                            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-gem"></i>
                                    <h4>{{ $wcy->title3 }}</h4>
                                    <p>{{ $wcy->desc3 }}</p>
                                </div>
                            </div><!-- End Icon Box -->

                            <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-inboxes"></i>
                                    <h4>{{ $wcy->title4 }}</h4>
                                    <p>{{ $wcy->desc4}}</p>
                                </div>
                            </div><!-- End Icon Box -->
                            @endforeach
                        </div>
                    </div>

            </div>

        </div>
    </section><!-- End Why Us Section -->


    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter">
        <div class="container" data-aos="zoom-out">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        @if(\App\Models\Chef::class)
                        <span data-purecounter-start="0" data-purecounter-end="{{\App\Models\Chef::all()->count()}}" data-purecounter-duration="1" class="purecounter"></span>
                       @endif
                        <p>Chefs</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{\App\Models\User::all()->count()}}" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Clients</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{\App\Models\Category::all()->count()}}" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Categories</p>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="{{\App\Models\Product::all()->count()}}" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Products</p>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>
    </section><!-- End Stats Counter Section -->

    <!-- ======= Menu Section ======= -->
            <section id="menu" class="menu">
                <div class="container" data-aos="fade-up">
                    <div class="section-header">
                        <h2>Our Menu</h2>
                        <p>Check Our <span>Yummy Menu</span></p>
                    </div>
                    <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        @isset($categories)
                            @foreach ($categories as $category)
                        <li class="nav-item" >
                            <a href="{{route('index',['category'=>$category->id])}}" class="nav-link show">
                                <h4 >{{ $category->name }}</h4>
                            </a>
                        </li><!--End tab nav item-->
                            @endforeach
                        @endisset
                    </ul>
                    <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
                        <div class="tab-pane fade active show" id="menu">

                            <div class="tab-header text-center">
                                <p>Menu</p>
                                <h3>{{ $categoryName }}</h3>
                            </div>

                            <div class="row gy-5">

                                @foreach ($products as $menuItem)
                                    <div class="col-lg-4 menu-item">
                                        <a href="{{ url('admin/img/product/',$menuItem->image) }}" class="glightbox"><img src="{{ url('admin/img/product/',$menuItem->image) }}" class="menu-img img-fluid" alt=""></a>
                                        <h4>{{ $menuItem->name }}</h4>
                                        <p class="ingredients">
                                        {{ $menuItem->desc }}
                                        <p class="price">
                                            {{ "$".$menuItem->price }}
                                        </p>
                                    </div><!-- Menu Item -->
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </section>

{{--            <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">--}}
{{--                @foreach ($categories as $category)--}}
{{--                    <li class="nav-item">--}}
{{--                        <a href="category={{$category->id}}" class="nav-link show " data-bs-toggle="tab">--}}
{{--                            <h4>{{ $category->name }}</h4></a>--}}
{{--                    </li><!-- End tab nav item -->--}}

{{--                @endforeach--}}
{{--            </ul>--}}


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Testimonials</h2>
                <p>What Are They <span>Saying About Us</span></p>
            </div>

            <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <div class="row gy-4 justify-content-center">
                                    <div class="col-lg-6">
                                        <div class="testimonial-content">
                                            <p>
                                                <i class="bi bi-quote quote-icon-left"></i>
                                                {{ $testimonial->review }}
                                                <i class="bi bi-quote quote-icon-right"></i>
                                            </p>
                                            <h3>{{ $testimonial->name }}</h3>
                                            <h4>{{ $testimonial->title }}</h4>
                                            <div class="stars">
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                                        class="bi bi-star-fill"></i>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-2 text-center">
                                        <img src="{{url('admin/img/testimonial/',$testimonial->image) }}"
                                             class="img-fluid testimonial-img" alt="">
                                    </div>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Event Section ======= -->
    <section id="events" class="events">
        <div class="container-fluid" data-aos="fade-up">

            <div class="section-header">
                <h2>Events</h2>
                <p>Share <span>Your Moments</span> In Our Restaurant</p>
            </div>

            <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @foreach ($events as $event)
                        <div class="swiper-slide event-item d-flex flex-column justify-content-end"
                             style="background-image: url('{{ url('admin/img/event/',$event->image,) }}')">
                            <h3>{{ $event->title }}</h3>
                            <div class="price align-self-start">{{ "$" . $event->price }}</div>
                            <p class="description">
                                {{ $event->desc }}
                            </p>
                        </div><!-- End Event item -->
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section>><!-- End Event Section -->

    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Chefs</h2>
                <p>Our <span>Proffesional</span> Chefs</p>
            </div>

            <div class="row gy-4">
                @foreach ($chefs as $chef)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                         data-aos-delay="100">
                        <div class="chef-member">
                            <div class="member-img">
                                <img src="{{ url('admin/img/chef/',$chef->image) }}" class="img-fluid" alt="">
                                {{--                 <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                            </div> --}}
                            </div>
                            <div class="member-info">
                                <h4>{{ $chef->name }}</h4>
                                <span>{{ $chef->title }}</span>
                                <p>{{ $chef->desc }}</p>
                            </div>
                        </div>
                    </div><!-- End Chefs Member -->
                @endforeach

            </div>

        </div>
    </section><!-- End Chefs Section -->

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
            <div class="section-header">
                <h2>Book A Table</h2>
                <p>Book <span>Your Stay</span> With Us</p>
            </div>

            <div class="row g-0">

                <div class="col-lg-4 reservation-img" style="background-image: url('{{ asset('admin/img/reservation.jpg') }}');" data-aos="zoom-out" data-aos-delay="200"></div>

                <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('submitBookTable')}}" method="POST" style="margin-left: 60px;margin-right: 20px">

                        @csrf
                        <div class="row gy-4">
                                     <div class="col-lg-4 col-md-6">
                                         <input type="text" class="form-control" name="name" placeholder="Full Name"
                                                aria-label="Full Name"data-rule="minlen:4"
                                                data-msg="Please enter at least 4 chars">
                                     </div>
                                     <div class="col-lg-4 col-md-6">
                                         <input type="email" class="form-control" name="email" placeholder="Email"
                                                aria-label="Email" data-rule="email" data-msg="Please enter a valid email">
                                     </div>
                                     <div class="col-lg-4 col-md-6">
                                         <input type="text" class="form-control" name="phone"
                                                placeholder="Mobile Number" aria-label="Mobile Number"data-rule="minlen:10"
                                                data-msg="Please enter at least 10 chars">
                                     </div>
                                     <div class="col-lg-4 col-md-6">
                                         <input type="date" class="form-control" name="date" placeholder="Date"
                                                aria-label="Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars"
                                                min="{{ date('Y-m-d') }}">
                                     </div>
                                     <div class="col-lg-4 col-md-6">
                                         <input type="time" class="form-control" name="time" placeholder="Time"
                                                data-rule="minlen:4" data-msg="Please enter at least 4 chars" aria-label="Time">
                                     </div>
                                     <div class="col-lg-4 col-md-6">
                                         <input type="number" class="form-control" name="people"
                                                placeholder="Count of People" aria-label="Count of People" data-rule="minlen:4"
                                                data-msg="Please enter at least 4 chars">
                                     </div>
                                     <div class="form-group mt-3">
                                    <textarea class="form-control" name="message" placeholder="Leave a comment here" rows="5"
                                              id="floatingTextarea"></textarea>
                                     </div>
                                     <div class="form-group">
                                         <label for="exampleInputTitle" hidden>User</label>

                                         <input name="user_id" class="form-control" value="" id="exampleInputTitle" hidden>

                                     </div>
                                 </div>
                                 <div class="d-grid gap-2 col-6 mx-auto">
                                     <button class="btn btn-danger" name="submit" type="submit">Book Table</button>
                                 </div>
                    </form>
                </div><!-- End Reservation Form -->

            </div>

        </div>
        </div>
    </section><!-- End Book A Table Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>gallery</h2>
                <p>Check <span>Our Gallery</span></p>
            </div>

            <div class="gallery-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    @foreach ($galleries as $gallery)
                        <div class="swiper-slide">
                            <a class="glightbox" data-gallery="images-gallery" href="{{ url('admin/img/gallery/',$gallery->image) }}"><img src="{{ url('admin/img/gallery/',$gallery->image) }}" class="img-fluid" alt="">
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Contact</h2>
                <p>Need Help? <span>Contact Us</span></p>
            </div>
            @foreach ($contacts as $contact)
                <div class="mb-3">
                    <iframe style="border:0; width: 100%; height: 350px;" src="{{ $contact->map }}" frameborder="0"
                            allowfullscreen></iframe>
                </div><!-- End Google Maps -->

                <div class="row gy-4">

                    <div class="col-md-6">
                        <div class="info-item  d-flex align-items-center">
                            <i class="icon bi bi-map flex-shrink-0"></i>
                            <div>
                                <h3>Our Address</h3>
                                <p>{{ $contact->address }}</p>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item d-flex align-items-center">
                            <i class="icon bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>{{ $contact->email }}</p>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item  d-flex align-items-center">
                            <i class="icon bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>+2 {{ $contact->phone }}</p>
                            </div>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="col-md-6">
                        <div class="info-item  d-flex align-items-center">
                            <i class="icon bi bi-share flex-shrink-0"></i>
                            <div>
                                <h3>Opening Hours</h3>
                                <div>{{ $contact->hours }}</div>
                            </div>
                        </div>
                    </div><!-- End Info Item -->
                    @endforeach
                </div>
                <br>
                <form action="{{route('send.message')}}" method="post" role="form">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-xl-6 form-group">
                            <input type="text" class="form-control" name="name" placeholder="Full Name"
                                   aria-label="Full Name"data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        </div>
                        <div class="col-xl-6 form-group">
                            <input type="mail" class="form-control" name="email" placeholder="Email"
                                   aria-label="Email" data-rule="email" data-msg="Please enter a valid email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Subject"
                                   aria-label="Subject" data-rule="minlen:6" data-msg="Please enter at least 6 chars">
                        </div>
                        <div class="form-group">
                        <textarea class="form-control" name="message" placeholder="Leave a comment here" rows="5"
                                  id="floatingTextarea"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-danger" name="submit" type="submit">Send Message</button>
                    </div>
                </form>


        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection

