@php
    $achievements = \App\Models\Achievement::where('is_active', true)->latest()->take(6)->get();
@endphp

@if($achievements->count() > 0)
<section class="services-inline2 section-padding sub-bg bord-bottom-grd bord-top-grd">
    <div class="container ontop">
        <div class="sec-head mb-80">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="title-bord mb-30">Achievements</h6>
                    <p>Celebrating Milestones and Success Stories</p>
                </div>
            </div>
        </div>

        @foreach($achievements as $index => $achievement)
        <div class="item {{ $loop->last ? 'pb-0' : '' }}">
            <div class="row md-marg align-items-end">
                <div class="col-lg-4">
                    <div>
                        <span class="num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <div>
                            <span class="sub-title main-color mb-10">{{ $achievement->period }}</span>
                            <h2>{{ $achievement->title }}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="text md-mb80">
                        <p>{{ $achievement->description }}</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="img fit-img">
                        @if($achievement->image)
                            <img src="{{ Storage::url($achievement->image) }}" alt="{{ $achievement->title }}" />
                        @else
                            <img src="{{ asset('assets/imgs/serv-img/' . (($index % 3) + 1) . '.jpg') }}" alt="{{ $achievement->title }}" />
                        @endif
                        @if($achievement->link)
                            <a href="{{ $achievement->link }}" target="_blank">
                            <i class="fas fa-arrow-right"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif
