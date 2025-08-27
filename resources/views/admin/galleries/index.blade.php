@extends('admin.layouts.app')

@section('title', 'Gallery')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Gallery</h1>
    <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> New Gallery Item
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($galleries->count() > 0)
            <div class="row">
                @foreach($galleries as $gallery)
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="card h-100">
                            @if($gallery->image)
                                <img src="{{ Storage::url($gallery->image) }}" class="card-img-top"
                                     alt="{{ $gallery->title }}" style="height: 200px; object-fit: cover;">
                            @else
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center"
                                     style="height: 200px;">
                                    <i class="fas fa-image fa-3x text-muted"></i>
                                </div>
                            @endif
                            <div class="card-body">
                                <h6 class="card-title">{{ $gallery->title }}</h6>
                                <p class="card-text small text-muted">
                                    {{ Str::limit($gallery->description, 100) }}
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        Category: {{ $gallery->category->name ?? 'Uncategorized' }}
                                    </small>
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="btn-group w-100" role="group">
                                    <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this gallery item?')"
                                          style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center">
                {{ $galleries->links() }}
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-images fa-3x text-muted mb-3"></i>
                <h5>No gallery items found</h5>
                <p class="text-muted">Create your first gallery item to get started.</p>
                <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Create Gallery Item
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
