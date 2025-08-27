@extends('admin.layouts.app')

@section('title', 'View Achievement')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">View Achievement</h1>
    <div>
        <a href="{{ route('admin.achievements.edit', $achievement) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i> Edit
        </a>
        <a href="{{ route('admin.achievements.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Achievements
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">{{ $achievement->title }}</h2>

                <div class="mb-3">
                    <span class="badge bg-info fs-6">{{ $achievement->period }}</span>
                </div>

                <div class="mb-3">
                    <h5>Description:</h5>
                    <p class="text-muted">{{ $achievement->description }}</p>
                </div>

                @if($achievement->link)
                    <div class="mb-3">
                        <h5>External Link:</h5>
                        <a href="{{ $achievement->link }}" target="_blank" class="btn btn-outline-primary">
                            <i class="fas fa-external-link-alt"></i> Visit Link
                        </a>
                    </div>
                @endif

                <div class="mb-3">
                    <h5>Status:</h5>
                    <span class="badge bg-{{ $achievement->is_active ? 'success' : 'secondary' }} fs-6">
                        {{ $achievement->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </div>

                <div class="mb-3">
                    <h5>Created:</h5>
                    <p class="text-muted">{{ $achievement->created_at->format('F d, Y \a\t g:i A') }}</p>
                </div>

                <div class="mb-3">
                    <h5>Last Updated:</h5>
                    <p class="text-muted">{{ $achievement->updated_at->format('F d, Y \a\t g:i A') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Image</h5>
                @if($achievement->image)
                    <img src="{{ Storage::url($achievement->image) }}" alt="{{ $achievement->title }}"
                         class="img-fluid rounded">
                @else
                    <div class="text-center py-4">
                        <i class="fas fa-trophy fa-3x text-muted"></i>
                        <p class="text-muted mt-2">No image uploaded</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Actions</h5>
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.achievements.edit', $achievement) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit Achievement
                    </a>
                    <form action="{{ route('admin.achievements.destroy', $achievement) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this achievement?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-trash"></i> Delete Achievement
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
