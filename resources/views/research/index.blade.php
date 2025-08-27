@extends('layouts.app')

@section('title', 'Research - Prof. Md Sadiq Iqbal')

@section('content')

<!-- ==================== Start Blog ==================== -->
<section class="blog section-padding">
    <div class="container">
        <div class="sec-head mb-80">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="title-bord mb-30">Research</h6>
                    <h3 class="fw-600 fz-50 text-u d-rotate wow">Research Areas</h3>
                </div>
            </div>
        </div>

        @if($researches->count() > 0)
        <div class="row">
            @foreach($researches as $research)
            <div class="col-lg-4 col-md-6 mb-50">
                <div class="blog-card">
                    <div class="blog-img">
                        @if($research->image)
                            <img src="{{ Storage::url($research->image) }}" alt="{{ $research->title }}">
                        @else
                            <div class="no-image">
                                <i class="fas fa-microscope"></i>
                            </div>
                        @endif
                        <div class="blog-overlay">
                            <a href="{{ route('research.show', $research->id) }}" class="btn btn-primary">
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="date">
                                <i class="fas fa-calendar"></i>
                                {{ $research->created_at->format('M d, Y') }}
                            </span>
                        </div>
                        <h5 class="blog-title">
                            <a href="{{ route('research.show', $research->id) }}">{{ $research->title }}</a>
                        </h5>
                        <p class="blog-excerpt">{{ Str::limit($research->description, 120) }}</p>
                        <a href="{{ route('research.show', $research->id) }}" class="read-more">
                            Read More <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($researches->hasPages())
        <div class="d-flex justify-content-center mt-50">
            {{ $researches->links() }}
        </div>
        @endif
        @else
        <div class="text-center py-5">
            <div class="no-research">
                <i class="fas fa-microscope fa-4x text-muted mb-4"></i>
                <h4>No Research Available</h4>
                <p class="text-muted">Check back later for research updates.</p>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection

@push('styles')
<style>
/* Blog Card Styles */
.blog-card {
    background: #232323;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
}

.blog-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
}

.blog-img {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.blog-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.blog-card:hover .blog-img img {
    transform: scale(1.1);
}

.blog-img .no-image {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 48px;
}

.blog-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(102, 126, 234, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.blog-card:hover .blog-overlay {
    opacity: 1;
}

.blog-overlay .btn {
    background: white;
    color: #667eea;
    border: none;
    padding: 15px 20px;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    transition: all 0.3s ease;
}

.blog-overlay .btn:hover {
    transform: scale(1.1);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.blog-content {
    padding: 30px;
    background: #232323;
    color: #fff;
}

.blog-meta {
    margin-bottom: 15px;
}

.blog-meta .date {
    color: #fff;
    font-size: 14px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.blog-title {
    margin-bottom: 15px;
    font-size: 20px;
    font-weight: 600;
    line-height: 1.4;
}

.blog-title a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.blog-title a:hover {
    color: #667eea;
}

.blog-excerpt {
    color: #fff;
    line-height: 1.6;
    margin-bottom: 20px;
}

.read-more {
    color: #667eea;
    text-decoration: none;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

.read-more:hover {
    color: #764ba2;
    transform: translateX(5px);
}

.read-more i {
    font-size: 12px;
    transition: transform 0.3s ease;
}

.read-more:hover i {
    transform: translateX(3px);
}

/* No Research Styles */
.no-research {
    padding: 60px 20px;
}

.no-research i {
    opacity: 0.3;
}

.no-research h4 {
    color: #333;
    margin-bottom: 15px;
}

/* Pagination Styles */
.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
}

.pagination .page-link {
    background: white;
    border: 1px solid #e9ecef;
    color: #667eea;
    padding: 10px 15px;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.pagination .page-link:hover {
    background: #667eea;
    color: white;
    border-color: #667eea;
    transform: translateY(-2px);
}

.pagination .page-item.active .page-link {
    background: #667eea;
    border-color: #667eea;
    color: white;
}

.pagination .page-item.disabled .page-link {
    background: #f8f9fa;
    color: #6c757d;
    border-color: #e9ecef;
}

/* Responsive Design */
@media (max-width: 768px) {
    .blog-content {
        padding: 20px;
    }

    .blog-title {
        font-size: 18px;
    }

    .blog-img {
        height: 200px;
    }

    .blog-img .no-image {
        font-size: 36px;
    }
}
</style>
@endpush
