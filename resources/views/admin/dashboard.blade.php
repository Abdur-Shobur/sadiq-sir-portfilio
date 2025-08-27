@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="h3 mb-4">Dashboard</h1>
    </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-md-2 col-sm-6 mb-3">
        <div class="card stats-card">
            <div class="card-body text-center">
                <i class="fas fa-blog fa-2x mb-2"></i>
                <h4>{{ $stats['blogs'] }}</h4>
                <p class="mb-0">Blog Posts</p>
            </div>
        </div>
    </div>

    <div class="col-md-2 col-sm-6 mb-3">
        <div class="card stats-card">
            <div class="card-body text-center">
                <i class="fas fa-calendar fa-2x mb-2"></i>
                <h4>{{ $stats['events'] }}</h4>
                <p class="mb-0">Events</p>
            </div>
        </div>
    </div>

    <div class="col-md-2 col-sm-6 mb-3">
        <div class="card stats-card">
            <div class="card-body text-center">
                <i class="fas fa-envelope fa-2x mb-2"></i>
                <h4>{{ $stats['messages'] }}</h4>
                <p class="mb-0">Messages</p>
            </div>
        </div>
    </div>

    <div class="col-md-2 col-sm-6 mb-3">
        <div class="card stats-card">
            <div class="card-body text-center">
                <i class="fas fa-users fa-2x mb-2"></i>
                <h4>{{ $stats['subscribers'] }}</h4>
                <p class="mb-0">Subscribers</p>
            </div>
        </div>
    </div>

    <div class="col-md-2 col-sm-6 mb-3">
        <div class="card stats-card">
            <div class="card-body text-center">
                <i class="fas fa-images fa-2x mb-2"></i>
                <h4>{{ $stats['galleries'] }}</h4>
                <p class="mb-0">Gallery Items</p>
            </div>
        </div>
    </div>

    <div class="col-md-2 col-sm-6 mb-3">
        <div class="card stats-card">
            <div class="card-body text-center">
                <i class="fas fa-microscope fa-2x mb-2"></i>
                <h4>{{ $stats['researches'] }}</h4>
                <p class="mb-0">Research</p>
            </div>
        </div>
    </div>
</div>
<!-- Quick Actions -->
<div class="row mb-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary w-100">
                            <i class="fas fa-plus"></i> New Blog Post
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('admin.events.create') }}" class="btn btn-primary w-100">
                            <i class="fas fa-plus"></i> New Event
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('admin.achievements.create') }}" class="btn btn-primary w-100">
                            <i class="fas fa-plus"></i> New Achievement
                        </a>
                    </div>
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary w-100">
                            <i class="fas fa-plus"></i> New Gallery Item
                        </a>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-3 mb-2">
                        <a href="{{ route('admin.messages.index') }}" class="btn btn-primary w-100">
                            <i class="fas fa-envelope"></i> View Messages
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Recent Content -->
<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-envelope"></i> Recent Messages
                </h5>
            </div>
            <div class="card-body">
                @if($recentMessages->count() > 0)
                    @foreach($recentMessages as $message)
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <strong>{{ $message->name }}</strong>
                                <br>
                                <small class="text-muted">{{ $message->email }}</small>
                                <br>
                                <small class="text-muted">{{ Str::limit($message->message, 50) }}</small>
                            </div>
                            <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
                        </div>
                        @if(!$loop->last)
                            <hr>
                        @endif
                    @endforeach
                @else
                    <p class="text-muted">No recent messages</p>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-blog"></i> Recent Blog Posts
                </h5>
            </div>
            <div class="card-body">
                @if($recentBlogs->count() > 0)
                    @foreach($recentBlogs as $blog)
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <strong>{{ $blog->title }}</strong>
                                <br>
                                <small class="text-muted">{{ Str::limit($blog->excerpt, 50) }}</small>
                            </div>
                            <span class="badge bg-{{ $blog->status === 'published' ? 'success' : 'warning' }}">
                                {{ ucfirst($blog->status) }}
                            </span>
                        </div>
                        @if(!$loop->last)
                            <hr>
                        @endif
                    @endforeach
                @else
                    <p class="text-muted">No recent blog posts</p>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection
