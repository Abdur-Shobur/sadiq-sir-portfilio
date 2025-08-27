@extends('admin.layouts.app')

@section('title', 'About Sections')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">About Sections</h1>
    <a href="{{ route('admin.abouts.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> New About Section
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($abouts->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Images</th>
                            <th>Title</th>
                            <th>Subtitle</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($abouts as $about)
                            <tr>
                                <td>
                                    <div class="d-flex gap-2">
                                        @if($about->image1)
                                            <img src="{{ asset('storage/' . $about->image1) }}"
                                                 alt="Image 1"
                                                 style="width: 60px; height: 45px; object-fit: cover; border-radius: 4px;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center"
                                                 style="width: 60px; height: 45px; border-radius: 4px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                        @if($about->image2)
                                            <img src="{{ asset('storage/' . $about->image2) }}"
                                                 alt="Image 2"
                                                 style="width: 60px; height: 45px; object-fit: cover; border-radius: 4px;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center"
                                                 style="width: 60px; height: 45px; border-radius: 4px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <strong>{{ $about->title }}</strong>
                                </td>
                                <td>
                                    {{ Str::limit($about->subtitle, 40) }}
                                </td>
                                <td>
                                    @if($about->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $about->created_at->format('M d, Y') }}
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.abouts.show', $about) }}" class="btn btn-sm btn-outline-info">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.abouts.edit', $about) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.abouts.destroy', $about) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this about section?')"
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
                {{ $abouts->links() }}
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-user fa-3x text-muted mb-3"></i>
                <h5>No about sections found</h5>
                <p class="text-muted">Create your first about section to get started.</p>
                <a href="{{ route('admin.abouts.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Create About Section
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
