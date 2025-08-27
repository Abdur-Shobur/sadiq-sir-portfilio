@extends('layouts.app')

@section('title', $blog->title)

@section('content')
<section class="blog-details section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="item">
                    @if($blog->image)
                    <div class="img mb-30">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-100" />
                    </div>
                    @endif
                    
                    <div class="info sub-title p-color d-flex align-items-center mb-30">
                        <div>
                            <a href="#">{{ $blog->category->name ?? 'Uncategorized' }}</a>
                        </div>
                        <div class="ml-30">
                            <a href="#">{{ $blog->created_at->format('F d, Y') }}</a>
                        </div>
                    </div>
                    
                    <div class="cont">
                        <h2 class="mb-30">{{ $blog->title }}</h2>
                        
                        @if($blog->excerpt)
                        <div class="excerpt mb-30">
                            <p class="lead">{{ $blog->excerpt }}</p>
                        </div>
                        @endif
                        
                        <div class="content">
                            {!! $blog->content !!}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="widget mb-50">
                        <h6 class="title-bord mb-30">Recent Posts</h6>
                        @php
                            $recentBlogs = \App\Models\Blog::with('category')
                                ->where('status', 'published')
                                ->where('id', '!=', $blog->id)
                                ->latest()
                                ->take(5)
                                ->get();
                        @endphp
                        
                        @foreach($recentBlogs as $recentBlog)
                        <div class="item mb-20">
                            <div class="img">
                                @if($recentBlog->image)
                                    <img src="{{ asset('storage/' . $recentBlog->image) }}" alt="{{ $recentBlog->title }}" />
                                @else
                                    <img src="{{ asset('assets/imgs/blog/default.jpg') }}" alt="{{ $recentBlog->title }}" />
                                @endif
                            </div>
                            <div class="cont">
                                <h6><a href="{{ route('blogs.show', $recentBlog->slug) }}">{{ Str::limit($recentBlog->title, 40) }}</a></h6>
                                <span class="date">{{ $recentBlog->created_at->format('M d, Y') }}</span>
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
