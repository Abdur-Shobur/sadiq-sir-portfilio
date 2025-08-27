@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')
<section class="blog style2 section-padding">
    <div class="container">
        <div class="sec-head mb-80">
            <div class="d-flex align-items-center">
                <div>
                    <h3 class="title-bord mb-30">Blog Posts</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($blogs as $blog)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="item">
                    <div class="info sub-title p-color d-flex align-items-center mb-20">
                        <div>
                            <a href="#">{{ $blog->category->name ?? 'Uncategorized' }}</a>
                        </div>
                        <div class="ml-30">
                            <a href="#">{{ $blog->created_at->format('F d, Y') }}</a>
                        </div>
                    </div>
                    <div class="img fit-img">
                        @if($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" />
                        @else
                            <img src="{{ asset('assets/imgs/blog/default.jpg') }}" alt="{{ $blog->title }}" />
                        @endif
                    </div>
                    <div class="cont pt-30">
                        <h5>{{ Str::limit($blog->title, 50) }}</h5>
                        <p class="mb-20">{{ Str::limit($blog->excerpt ?? $blog->content, 100) }}</p>
                        <a href="{{ route('blogs.show', $blog->slug) }}" class="butn-crev d-flex align-items-center mt-30">
                            <span class="hover-this">
                                <span class="circle hover-anim">
                                <i class="fas fa-arrow-right"></i>
                                </span>
                            </span>
                            <span class="text">Read more</span>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <h5>No blog posts available</h5>
                    <p class="text-muted">Check back soon for new content!</p>
                </div>
            </div>
            @endforelse
        </div>

        @if($blogs->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $blogs->links() }}
        </div>
        @endif
    </div>
</section>
@endsection
