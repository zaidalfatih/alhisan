<div class="container d-flex align-items-center">

    <a href="index.html" class="logo mr-auto">
        <img src="{{ asset('fe/img/alhisan-logo.png') }}" class="img-fluid">
    </a>
    <nav class="nav-menu d-none d-lg-block">
        <ul>
            <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                <a href="{{ route('home') }}">Beranda</a>
            </li>
            <li class="{{ request()->routeIs('tentang') ? 'active' : '' }}">
                <a href="{{ route('tentang') }}">Tentang</a>
            </li>
            <li
                class="{{ request()->routeIs('fe-post.index') ? 'active' : '' }} {{ request()->routeIs('fe-post.show') ? 'active' : '' }}">
                <a href="{{ route('fe-post.index') }}">Artikel</a>
            </li>
            <li class="{{ request()->routeIs('kontak') ? 'active' : '' }}">
                <a href="{{ route('kontak') }}">Kontak</a>
            </li>
            <li
                class="
                {{ request()->routeIs('dakwah') ? 'active' : '' }}
                {{ request()->routeIs('sosial') ? 'active' : '' }}
                {{ request()->routeIs('wirausaha') ? 'active' : '' }}
                drop-down
                ">
                <a class="text-capitalize" href="">Kegiatan</a>
                <ul>
                    <li class="{{ request()->routeIs('dakwah') ? 'active' : '' }}"><a
                            href="{{ route('dakwah') }}">Dakwah</a></li>
                    <li class="{{ request()->routeIs('sosial') ? 'active' : '' }}"><a
                            href="{{ route('sosial') }}">Sosial</a></li>
                    <li class="{{ request()->routeIs('wirausaha') ? 'active' : '' }}"><a
                            href="{{ route('wirausaha') }}">Wirausaha</a></li>
                </ul>
            </li>
            @auth
                <li class="drop-down"><a href="" class="text-capitalize">{{ auth()->user()->username }}</a>
                    <ul>
                        <li><a href="#">Drop Down 1</a></li>
                        <li class="drop-down"><a href="#">Deep Drop Down</a>
                            <ul>
                                <li><a href="#">Deep Drop Down 1</a></li>
                                <li><a href="#">Deep Drop Down 2</a></li>
                                <li><a href="#">Deep Drop Down 3</a></li>
                                <li><a href="#">Deep Drop Down 4</a></li>
                                <li><a href="#">Deep Drop Down 5</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Drop Down 2</a></li>
                        <li><a href="#">Drop Down 3</a></li>
                        <li><a href="#">Drop Down 4</a></li>
                    </ul>
                </li>
            @endauth

        </ul>
    </nav>

    @guest
        <a href="{{ route('login') }}" class="get-started-btn">Login</a>
    @endguest
</div>
