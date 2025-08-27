@extends('admin.layouts.app')

@section('title', 'Banners')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Banners</h1>
    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> New Banner
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($banners->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $banner)
                            <tr>
                                <td>
                                    @if($banner->image)
                                        <img src="{{ asset('storage/' . $banner->image) }}"
                                             alt="{{ $banner->title }}"
                                             style="width: 80px; height: 60px; object-fit: cover; border-radius: 4px;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center"
                                             style="width: 80px; height: 60px; border-radius: 4px;">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $banner->title }}</strong>
                                </td>
                                <td>
                                    {{ Str::limit($banner->subtitle, 30) }}
                                </td>
                                <td>
                                    @if($banner->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark">{{ $banner->order }}</span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.banners.edit', $banner) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this banner?')"
                                              style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $banners->links() }}
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-images fa-3x text-muted mb-3"></i>
                <h5>No banners found</h5>
                <p class="text-muted">Create your first banner to get started.</p>
                <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Create Banner
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
