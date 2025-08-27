@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
<section class="work-grid section-padding">
    <div class="container">
        <div class="row mb-80">
            <div class="col-lg-4">
                <div class="sec-head">
                    <h6 class="title-bord mb-30">Gallery</h6>
                    <h3>Through the Lens</h3>
                </div>
            </div>
            <!-- filter links -->
            <div class="filtering col-lg-8 d-flex justify-content-end align-items-end">
                <div>
                    <div class="filter">
                        <span data-filter="*" class="active" data-count="{{ $galleries->count() }}">All</span>
                        @php
                            $categories = $galleries->pluck('category.name')->unique()->filter();
                        @endphp
                        @foreach($categories as $categoryName)
                            <span data-filter=".{{ Str::slug($categoryName) }}" data-count="{{ $galleries->where('category.name', $categoryName)->count() }}">{{ $categoryName }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="gallery row md-marg">
            @forelse($galleries as $gallery)
            <div class="col-lg-4 col-md-6 items {{ $gallery->category ? Str::slug($gallery->category->name) : 'uncategorized' }}">
                <div class="item mb-50">
                    <div class="img">
                        @if($gallery->image)
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" />
                        @else
                            <img src="{{ asset('assets/imgs/works/default.jpg') }}" alt="{{ $gallery->title }}" />
                        @endif
                    </div>
                    <div class="cont d-flex align-items-end mt-30">
                        <div>
                            <span class="p-color mb-5 sub-title">{{ $gallery->category->name ?? 'Uncategorized' }}</span>
                            <h6>{{ Str::limit($gallery->title, 30) }}</h6>
                            @if($gallery->description)
                                <p class="mt-2">{{ Str::limit($gallery->description, 60) }}</p>
                            @endif
                        </div>
                        <div class="ml-auto">
                            <a href="{{ route('galleries.show', $gallery->id) }}">
                                <span class="fas fa-arrow-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <h5>No gallery items available</h5>
                    <p class="text-muted">Check back soon for new gallery content!</p>
                </div>
            </div>
            @endforelse
        </div>

        @if($galleries->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $galleries->links() }}
        </div>
        @endif
    </div>
</section>
@endsection
