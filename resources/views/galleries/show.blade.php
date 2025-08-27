@extends('layouts.app')

@section('title', $gallery->title)

@section('content')
<section class="gallery-details section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="item">
                    @if($gallery->image)
                    <div class="img mb-30">
                        <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-100" />
                    </div>
                    @endif
                    
                    <div class="cont">
                        <div class="info sub-title p-color d-flex align-items-center mb-30">
                            <div>
                                <a href="#">{{ $gallery->category->name ?? 'Uncategorized' }}</a>
                            </div>
                            <div class="ml-30">
                                <a href="#">{{ $gallery->created_at->format('F d, Y') }}</a>
                            </div>
                        </div>
                        
                        <h2 class="mb-30">{{ $gallery->title }}</h2>
                        
                        @if($gallery->description)
                        <div class="description">
                            <p>{{ $gallery->description }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="widget mb-50">
                        <h6 class="title-bord mb-30">Recent Gallery Items</h6>
                        @php
                            $recentGalleries = \App\Models\Gallery::with('category')
                                ->where('id', '!=', $gallery->id)
                                ->latest()
                                ->take(5)
                                ->get();
                        @endphp
                        
                        @foreach($recentGalleries as $recentGallery)
                        <div class="item mb-20">
                            <div class="img">
                                @if($recentGallery->image)
                                    <img src="{{ asset('storage/' . $recentGallery->image) }}" alt="{{ $recentGallery->title }}" />
                                @else
                                    <img src="{{ asset('assets/imgs/works/default.jpg') }}" alt="{{ $recentGallery->title }}" />
                                @endif
                            </div>
                            <div class="cont">
                                <h6><a href="{{ route('galleries.show', $recentGallery->id) }}">{{ Str::limit($recentGallery->title, 40) }}</a></h6>
                                <span class="category">{{ $recentGallery->category->name ?? 'Uncategorized' }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
