@if($about && $about->is_active)
<section class="page-intro section-padding pb-0" id="about">
    <div class="container">
        <div class="row md-marg">
            <div class="col-lg-6">
                <div class="img md-mb80">
                    <div class="row">
                        <div class="col-6">
                            @if($about->image1)
                                <img src="{{ asset('storage/' . $about->image1) }}" alt="{{ $about->title }}" />
                            @else
                                <img src="{{ asset('assets/imgs/intro/i1.jpg') }}" alt="{{ $about->title }}" />
                            @endif
                            <div class="img-icon">
                                <img src="{{ asset('assets/imgs/arw0.png') }}" alt="" />
                            </div>
                        </div>
                        <div class="col-6 mt-40">
                            @if($about->image2)
                                <img src="{{ asset('storage/' . $about->image2) }}" alt="{{ $about->title }}" />
                            @else
                                <img src="{{ asset('assets/imgs/intro/i2.jpg') }}" alt="{{ $about->title }}" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 valign">
                <div class="cont">
                    <h6 class="title-bord mb-30">{{ $about->title }}</h6>
                    <h3 class="mb-30">
                        {{ $about->subtitle }}
                    </h3>
                    <p>
                        {{ $about->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
