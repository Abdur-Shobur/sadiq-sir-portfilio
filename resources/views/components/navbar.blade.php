@php
    $profileData = $profile ?? \App\Models\Profile::first();
@endphp

<nav class="navbar navbar-expand-lg bord blur">
    <div class="container o-hidden">
        <!-- Logo -->
        <a class="logo icon-img-100" href="/">
            @if($profileData && $profileData->logo)
                <img src="{{ asset('storage/' . $profileData->logo) }}" alt="logo" />
            @else
                <img src="{{ asset('assets/imgs/logo-light.png') }}" alt="logo" />
            @endif
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"><i class="fas fa-bars"></i></span>
        </button>

        <!-- navbar links -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <span class="rolling-text">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#about">
                        <span class="rolling-text"> About </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/research">
                        <span class="rolling-text"> Research </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blogs">
                        <span class="rolling-text"> Blog </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#events">
                        <span class="rolling-text"> Events </span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="contact-button">
            <a href="/#contact" class="butn butn-sm butn-bg main-colorbg radius-5">
                <span class="text">Let's contact</span>
            </a>
        </div>
    </div>
</nav>
