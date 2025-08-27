<section class="services section-padding" id="research">
    <div class="container">
        <div class="sec-head mb-80">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="title-bord mb-30">Research</h6>
                    <h3 class="fw-600 fz-50 text-u d-rotate wow">Research Areas</h3>
                </div>
                @if($researches->count() > 4)
                <div class="ml-auto">
                    <div class="swiper-arrow-control">
                        <div class="swiper-button-prev">
                            <span class="fas fa-arrow-left"></span>
                        </div>
                        <div class="swiper-button-next">
                            <span class="fas fa-arrow-right"></span>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

        @if($researches->count() > 0)
        <div class="serv-swiper" data-carousel="swiper" data-loop="true" data-space="40">
            <div id="content-carousel-container-unq-serv" class="swiper-container" data-swiper="container" style="overflow: hidden">
                <div class="swiper-wrapper">
                    @foreach($researches as $research)
                    <div class="swiper-slide">
                        <div class="item-box">
                            <div class="icon mb-40 opacity-5">
                                @if($research->image)
                                    <img src="{{ Storage::url($research->image) }}" alt="{{ $research->title }}" style="width: 60px; height: 60px; object-fit: cover;" />
                                @else
                                    <img src="{{ asset('assets/imgs/serv-icons/3.png') }}" alt="{{ $research->title }}" />
                                @endif
                            </div>
                            <h5 class="mb-15">
                                {{ $research->title }}
                            </h5>
                            <p>
                                {{ Str::limit($research->description, 120) }}
                            </p>
                            <a href="{{ route('research.show', $research->id) }}" class="rmore mt-30">
                                <span class="sub-title text-white">Read More</span>
                                <img src="{{ asset('assets/imgs/arrow-right.png') }}" alt="" class="icon-img-20 ml-5" />
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @else
        <div class="text-center py-5">
            <h5>No research available at the moment</h5>
            <p class="text-muted">Check back later for research updates.</p>
        </div>
        @endif
    </div>
</section>
