@php
    $activeBanner = $banner ?? \App\Models\Banner::where('is_active', true)->orderBy('order')->first();
    $profileData = $profile ?? \App\Models\Profile::first();
@endphp

<header class="header-digital valign">
    @if($activeBanner)
        <div class="banner-background" style="background-image: url('{{ asset('storage/' . $activeBanner->image) }}'); background-size: cover; background-position: center; position: absolute; top: 0; left: 0; right: 0; bottom: 0; z-index: -1; opacity: 0.3;"></div>
    @endif

    <div class="container ontop">
        <div class="row mb-100">
            <div class="col-lg-12">
                <div class="caption">
                    @if($activeBanner)
                        <h1>{{ $activeBanner->title }}</h1>
                        @if($activeBanner->subtitle)
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <p>{{ $activeBanner->subtitle }}</p>
                                </div>
                                <div class="col-lg-8 md-mb30">
                                    @if($activeBanner->description)
                                        <h2>{{ Str::limit($activeBanner->description, 100) }}</h2>
                                    @endif
                                </div>
                            </div>
                        @else
                            <h1>Prof. Md Sadiq Iqbal</h1>
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <p>Chairman, Department of Computer Science & Engineering</p>
                                </div>
                                <div class="col-lg-8 md-mb30">
                                    <h2>Bangladesh University</h2>
                                </div>
                            </div>
                        @endif
                    @else
                        <h1>Prof. Md Sadiq Iqbal</h1>
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <p>Chairman, Department of Computer Science & Engineering</p>
                            </div>
                            <div class="col-lg-8 md-mb30">
                                <h2>Bangladesh University</h2>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="img">
                    @if($activeBanner && $activeBanner->image)
                        <img src="{{ asset('storage/' . $activeBanner->image) }}" alt="{{ $activeBanner->title }}" />
                    @else
                        <img src="{{ asset('assets/imgs/header/4.jpg') }}" alt="" />
                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cont">
                    <div class="text mt-30" style="margin-bottom: 130px;">
                        @if($activeBanner && $activeBanner->additional_text)
                            <p>{{ $activeBanner->additional_text }}</p>
                        @else
                            <p>
                                At the Department of Computer Science & Engineering,
                                under the visionary leadership of Prof. Md Sadiq Iqbal,
                                we are committed to fostering a culture of innovation,
                                critical thinking, and academic excellence. We believe
                                in preparing students not just as en
                            </p>
                        @endif
                    </div>
                    <div class="numb">
                        <div class="o-hidden">
                            <h2>100%</h2>
                        </div>
                        <h6 class="p-color sub-title mt-10">
                            Guiding Future Technologists with Vision and Integrity.
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
