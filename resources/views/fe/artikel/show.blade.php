@extends('layouts.fe.master',['title' => 'Alhisan'])

@section('fe-content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>{!! $post->judul !!}</h2>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Cource Details Section ======= -->
        <section id="course-details" class="course-details">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-8">
                        <img src="{{ asset('fe') }}/img/course-details.jpg" class="img-fluid" alt="">
                        <h3>{!! $post->judul !!}</h3>
                        <p>{!! $post->body !!}</p>
                    </div>
                    <div class="col-lg-4">

                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Penulis</h5>
                            <p><a class="text-success"
                                    href="/post?author={{ $post->author->username }}">{{ $post->author->name }}</a></p>
                        </div>
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Kategori</h5>
                            <p>
                                <a class="text-success" href="/post?category={{ $post->category->slug }}">
                                    {{ $post->category->nama }}
                                </a>
                            </p>
                        </div>
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Dibuat</h5>
                            <p>{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                        <div class="course-info d-flex justify-content-between align-items-center">
                            <h5>Dilihat</h5>
                            <p>{{ formatAngka($post->dilihat) }}</p>
                        </div>
                        <div class="section-title mt-5">
                            <h2>Bagikan artikel ini</h2>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                                <a data-toggle="tooltip" title="Twitter" href="{{ $twitter }}" target="_blank"
                                    class="btn-outline-success btn mx-3 twitter">
                                    <i class="bx bxl-twitter"></i>
                                </a>
                                <a data-toggle="tooltip" title="Facebook" href="{{ $facebook }}" target="_blank"
                                    class="btn btn-outline-success facebook mx-3">
                                    <i class="bx bxl-facebook"></i>
                                </a>
                                <a data-toggle="tooltip" title="Whatsapp" href="{{ $whatsapp }}" target="_blank"
                                    class="btn-outline-success btn whatsapp mx-3">
                                    <i class="bx bxl-whatsapp"></i>
                                </a>
                                <a data-toggle="tooltip" title="Telegram" href="{{ $telegram }}" target="_blank"
                                    class="btn-outline-success btn telegram mx-3">
                                    <i class="bx bxl-telegram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
