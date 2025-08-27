@extends('layouts.app')

@section('title', $research->title . ' - Research')

@section('content')

<!-- ==================== Start Blog ==================== -->
<section class="blog section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="main-post">
                    <!-- Post Header -->
                    <div class="post-header mb-50">
                        <div class="d-flex align-items-center mb-20">
                            <a href="{{ route('research.index') }}" class="back-btn">
                                <i class="fas fa-arrow-left"></i> Back to Research
                            </a>
                        </div>
                        <h1 class="post-title">{{ $research->title }}</h1>
                        <div class="post-meta">
                            <span class="date">
                                <i class="fas fa-calendar"></i>
                                {{ $research->created_at->format('M d, Y') }}
                            </span>
                        </div>
                    </div>

                    <!-- Post Image -->
                    @if($research->image)
                    <div class="post-img mb-40">
                        <img src="{{ Storage::url($research->image) }}" alt="{{ $research->title }}" class="img-fluid">
                    </div>
                    @endif

                    <!-- Post Description -->
                    <div class="post-description mb-40">
                        <p class="lead">{{ $research->description }}</p>
                    </div>

                    <!-- Post Content -->
                    @if($research->long_description)
                    <div class="post-content">
                        <div class="research-details">
                            {!! $research->long_description !!}
                        </div>
                    </div>
                    @endif

                    <!-- External Link -->
                    @if($research->link)
                    <div class="post-footer mt-50">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="post-tags">
                                <span class="tag">Research</span>
                            </div>
                            <a href="{{ $research->link }}" target="_blank" class="btn btn-primary">
                                <i class="fas fa-external-link-alt"></i> View Research
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sidebar">
                    <!-- Related Research -->
                    @if($relatedResearches->count() > 0)
                    <div class="widget">
                        <h5 class="widget-title">Related Research</h5>
                        <div class="widget-content">
                            @foreach($relatedResearches as $related)
                            <div class="related-post">
                                <div class="related-post-img">
                                    @if($related->image)
                                        <img src="{{ Storage::url($related->image) }}" alt="{{ $related->title }}">
                                    @else
                                        <div class="no-image">
                                            <i class="fas fa-microscope"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="related-post-content">
                                    <h6><a href="{{ route('research.show', $related->id) }}">{{ $related->title }}</a></h6>
                                    <p>{{ Str::limit($related->description, 80) }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Research Navigation -->
                    <div class="widget">
                        <h5 class="widget-title">Research Navigation</h5>
                        <div class="widget-content">
                            <ul class="nav-list">
                                <li><a href="{{ route('research.index') }}">All Research</a></li>
                                <li><a href="{{ route('blogs.index') }}">Blog Posts</a></li>
                                <li><a href="{{ route('galleries.index') }}">Gallery</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
/* Research Details Styles */
.research-details {
    line-height: 1.8;
    color: #fff;
    font-size: 16px;
}

.research-details h1, .research-details h2, .research-details h3, .research-details h4, .research-details h5, .research-details h6 {
    margin-top: 2rem;
    margin-bottom: 1rem;
    font-weight: 600;
    color: #333;
}

.research-details h1 {
    font-size: 28px;
    border-bottom: 3px solid #667eea;
    padding-bottom: 10px;
}

.research-details h2 {
    font-size: 24px;
    border-bottom: 2px solid #667eea;
    padding-bottom: 8px;
}

.research-details h3 {
    font-size: 20px;
    color: #667eea;
}

.research-details h4 {
    font-size: 18px;
    color: #667eea;
}

.research-details p {
    margin-bottom: 1.5rem;
}

.research-details ul, .research-details ol {
    margin-bottom: 1.5rem;
    padding-left: 2rem;
}

.research-details li {
    margin-bottom: 0.75rem;
}

.research-details img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    margin: 2rem 0;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.research-details blockquote {
    border-left: 4px solid #667eea;
    padding: 20px;
    margin: 2rem 0;
    font-style: italic;
    color: #666;
    background: linear-gradient(135deg, #f8f9ff 0%, #e8f0ff 100%);
    border-radius: 0 10px 10px 0;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
}

.research-details table {
    width: 100%;
    border-collapse: collapse;
    margin: 2rem 0;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.research-details table th,
.research-details table td {
    border: 1px solid #e9ecef;
    padding: 15px 20px;
    text-align: left;
}

.research-details table th {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    font-weight: 600;
}

.research-details table tr:nth-child(even) {
    background: #f8f9fa;
}

/* Post Styles */
.post-header {
    text-align: center;
    padding-bottom: 30px;
    border-bottom: 1px solid #eee;
}

.post-title {
    font-size: 36px;
    font-weight: 700;
    color: #fff;
    margin-bottom: 20px;
    line-height: 1.3;
}

.post-meta {
    color: #fff;
    font-size: 14px;
}

.post-meta .date {
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.post-description .lead {
    font-size: 18px;
    color: #fff;
    line-height: 1.6;
    font-weight: 400;
}

.post-img img {
    width: 100%;
    height: auto;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: #667eea;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.back-btn:hover {
    color: #764ba2;
    transform: translateX(-5px);
}

/* Sidebar Styles */
.sidebar {
    padding-left: 30px;
}

.widget {
    background: #232323;
    border-radius: 15px;
    padding: 30px;
    margin-bottom: 30px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
}

.widget-title {
    font-size: 20px;
    font-weight: 600;
    color: #fff;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #667eea;
}

.related-post {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
    padding-bottom: 20px;
    border-bottom: 1px solid #f0f0f0;
}

.related-post:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.related-post-img {
    width: 80px;
    height: 80px;
    border-radius: 10px;
    overflow: hidden;
    flex-shrink: 0;
}

.related-post-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.related-post-img .no-image {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 24px;
}

.related-post-content h6 {
    margin-bottom: 8px;
    font-size: 14px;
    line-height: 1.4;
}

.related-post-content h6 a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.related-post-content h6 a:hover {
    color: #667eea;
}

.related-post-content p {
    font-size: 12px;
    color: #fff;
    margin: 0;
    line-height: 1.4;
}

.nav-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.nav-list li {
    margin-bottom: 10px;
}

.nav-list a {
    display: block;
    padding: 12px 15px;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.3s ease;
    border-left: 3px solid transparent;
}

.nav-list a:hover {
    background: #000;
    color: #667eea;
    border-left-color: #667eea;
    transform: translateX(5px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .post-title {
        font-size: 28px;
    }

    .sidebar {
        padding-left: 0;
        margin-top: 40px;
    }

    .widget {
        padding: 20px;
    }

    .related-post {
        flex-direction: column;
        text-align: center;
    }

    .related-post-img {
        width: 100%;
        height: 150px;
        margin-bottom: 15px;
    }
}
</style>
@endpush
