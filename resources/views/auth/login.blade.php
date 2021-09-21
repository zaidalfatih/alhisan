@extends('layouts.fe.master',['title' => 'Alhisan'])

@section('fe-content')
    <main id="main">

        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Login</h2>
            </div>
        </div>

        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="row mt-5 d-flex justify-content-center">
                    <div class="col-lg-6 mt-5 mt-lg-0">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label class="pt-2">Email</label>
                                </div>
                                <div class="col-md-10 form-group">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Masukan email anda" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label class="pt-2">Password</label>
                                </div>
                                <div class="col-md-10 form-group">
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Masukan password anda" />
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="get-started-btn btn" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
