@extends('layouts.fe.master',['title' => 'Alhisan'])

@section('fe-content')
    <main id="main">

        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Register</h2>
            </div>
        </div>

        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="row mt-5 d-flex justify-content-center">
                    <div class="col-lg-8 mt-5 mt-lg-0">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="@error('name') is-invalid @enderror form-control" name="name"
                                    placeholder="Nama lengkap anda" />
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="username"
                                        class="form-control @error('username') is-invalid @enderror"
                                        placeholder="Username" />
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" placeholder="Email" />
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <input type="password" name="password"
                                        class="@error('password') is-invalid @enderror form-control"
                                        placeholder="Password" />
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="password"
                                        class="@error('password_confirmation') is-invalid @enderror form-control"
                                        name="password_confirmation" placeholder="Ulangi Password" />
                                    @error('password_confirmation')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn get-started-btn">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
