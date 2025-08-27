@extends('admin.layouts.app')

@section('title', 'View Banner')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">View Banner</h1>
    <div>
        <a href="{{ route('admin.banners.edit', $banner) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i> Edit Banner
        </a>
        <a href="{{ route('admin.banners.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Back to Banners
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <h4>{{ $banner->title }}</h4>
                @if($banner->subtitle)
                    <p class="text-muted">{{ $banner->subtitle }}</p>
                @endif
                @if($banner->description)
                    <p>{{ $banner->description }}</p>
                @endif
                @if($banner->additional_text)
                    <div class="mt-3">
                        <h6>Additional Text:</h6>
                        <p>{{ $banner->additional_text }}</p>
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                @if($banner->image)
                    <img src="{{ asset('storage/' . $banner->image) }}"
                         alt="{{ $banner->title }}"
                         class="img-fluid rounded">
                @endif
                <div class="mt-3">
                    <p><strong>Status:</strong>
                        @if($banner->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </p>
                    <p><strong>Order:</strong> {{ $banner->order }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
