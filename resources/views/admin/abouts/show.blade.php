@extends('admin.layouts.app')

@section('title', 'View About Section')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">View About Section</h1>
    <div>
        <a href="{{ route('admin.abouts.edit', $about) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i> Edit
        </a>
        <a href="{{ route('admin.abouts.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Back to About Sections
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="mb-4">
                    <h4>{{ $about->title }}</h4>
                    <h5 class="text-muted">{{ $about->subtitle }}</h5>
                </div>

                <div class="mb-4">
                    <h6>Description:</h6>
                    <p class="text-muted">{{ $about->description }}</p>
                </div>

                <div class="mb-4">
                    <h6>Status:</h6>
                    @if($about->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </div>

                <div class="mb-4">
                    <h6>Created:</h6>
                    <p class="text-muted">{{ $about->created_at->format('F d, Y \a\t g:i A') }}</p>
                </div>

                <div class="mb-4">
                    <h6>Last Updated:</h6>
                    <p class="text-muted">{{ $about->updated_at->format('F d, Y \a\t g:i A') }}</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-4">
                    <h6>Images:</h6>
                    <div class="row">
                        @if($about->image1)
                            <div class="col-12 mb-3">
                                <label class="form-label">Image 1:</label>
                                <img src="{{ asset('storage/' . $about->image1) }}"
                                     alt="Image 1"
                                     class="img-fluid rounded"
                                     style="max-width: 100%; height: auto;">
                            </div>
                        @endif

                        @if($about->image2)
                            <div class="col-12 mb-3">
                                <label class="form-label">Image 2:</label>
                                <img src="{{ asset('storage/' . $about->image2) }}"
                                     alt="Image 2"
                                     class="img-fluid rounded"
                                     style="max-width: 100%; height: auto;">
                            </div>
                        @endif

                        @if(!$about->image1 && !$about->image2)
                            <div class="col-12">
                                <div class="text-center py-4">
                                    <i class="fas fa-image fa-2x text-muted mb-2"></i>
                                    <p class="text-muted">No images uploaded</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
