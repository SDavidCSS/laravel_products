<section id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand mt-2 mt-lg-0" href="{{ route('home') }}">
                <img
                    src="{{ asset('/images/vermont_logo.png') }}"
                    height="30"
                    alt="Vermont Services"
                />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">{{ __('messages.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ url('/auth/logout') }}" method="POST">
                            @csrf
                            <a class="nav-link" onclick="this.parentNode.submit();" style="cursor: pointer">{{ __('messages.logout') }} ( {{ Auth::user()->name }} )</a>
                        </form>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('messages.languages') }}
                        </a>
                        <ul class="dropdown-menu text-center" aria-labelledby="navbarScrollingDropdown">
                            <li>
                                <a class="btn btn-{{ App::getLocale() === 'en' ? 'success' : 'primary' }} me-2 btn-block mb-2" href="{{ route('language.change', ['locale' => 'en']) }}">EN</a>
                            </li>
                            <li>
                                <a class="btn btn-{{ App::getLocale() === 'sk' ? 'success' : 'primary' }} me-2 btn-block" href="{{ route('language.change', ['locale' => 'sk']) }}">SK</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" action="{{ route('home') }}" method="GET">
                    <input class="form-control me-2" type="search" name="search" placeholder="{{ __('messages.search') }}" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">{{ __('messages.search') }}</button>
                </form>
            </div>
        </div>
    </nav>
</section>
