@extends('layouts.fe.master',['title' => 'Alhisan'])

@section('fe-content')
    <main id="main" data-aos="fade-in">

        <div class="breadcrumbs">
            <div class="container">
                <h2 class="text-uppercase">Artikel</h2>
            </div>
        </div>

        <section id="courses" class="courses">
            <div class="container" data-aos="fade-up">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6">
                        <form action="/post">
                            <div class="form-row align-items-center">
                                <div class="input-group mb-2">
                                    @if (request('category'))
                                        <input type="hidden" value="{{ request('category') }}" name="category">
                                    @endif
                                    @if (request('author'))
                                        <input type="hidden" value="{{ request('author') }}" name="author">
                                    @endif
                                    <input autocomplete="off" type="text" class="form-control" id="inlineFormInputGroup"
                                        value="{{ request('search') }}" name="search" placeholder="Search">
                                    <div class="input-group-prepend">
                                        <button type="submit" class="input-group-text btn btn-outline-success">
                                            Cari</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @if ($posts->count())
                    <div class="row" data-aos="zoom-in" data-aos-delay="100">
                        @foreach ($posts as $post)
                            <div class="col-lg-6 col-md-6 d-flex align-items-stretch mt-4">
                                <div class="course-item shadow">
                                    <img src="{{ $post->getGambar() }}" width="800px" class="img-fluid" style="max-height:533px;">
                                    <div class="course-content">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4>
                                                <a href="/post?category={{ $post->category->slug }}"
                                                    class="text-white text-decoration-none">
                                                    {!! $post->category->nama !!}
                                                </a>
                                            </h4>
                                            <p class="price">$169</p>
                                        </div>

                                        <h3><a href="{{ route('fe-post.show', $post->slug) }}">{!! $post->judul !!}</a>
                                        </h3>
                                        <p>{!! $post->excerpt !!}</p>
                                        <div class="trainer d-flex justify-content-between align-items-center">
                                            <div class="trainer-profile d-flex align-items-center">
                                                <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                                                <a href="/post?author={{ $post->author->username }}"
                                                    class="text-dark">
                                                    Oleh: {!! $post->author->name !!}
                                                </a>
                                            </div>
                                            <div class="trainer-rank d-flex align-items-center">
                                                <p class="pt-3 pr-3">{{ $post->created_at->diffForHumans() }}</p>
                                                <i class="bx bx-user"></i>&nbsp;{{ formatAngka($post->dilihat) }}
                                                &nbsp;&nbsp;
                                                <a href="{{ route('fe-post.show', $post->slug) }}"
                                                    class="btn btn-outline-success rounded">Lihat</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row my-5 d-flex justify-content-center">
                        <p class="shadow">
                            {{ $posts->links() }}
                        </p>
                    </div>
                @else
                    <div class="section-title mt-5">
                        <p class="text-center">Artikel tidak ada</p>
                    </div>
                @endif
            </div>
        </section>
    </main>
@endsection
