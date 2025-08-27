@extends('admin.layouts.app')

@section('title', 'Research')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Research</h1>
    <a href="{{ route('admin.researches.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> New Research
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($researches->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($researches as $research)
                            <tr>
                                <td>
                                    @if($research->image)
                                        <img src="{{ Storage::url($research->image) }}" alt="{{ $research->title }}"
                                             class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center"
                                             style="width: 50px; height: 50px;">
                                            <i class="fas fa-microscope text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $research->title }}</strong>
                                </td>
                                <td>
                                    <small class="text-muted">{{ Str::limit($research->description, 80) }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $research->is_active ? 'success' : 'secondary' }}">
                                        {{ $research->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>{{ $research->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.researches.edit', $research) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.researches.destroy', $research) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this research?')"
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
                {{ $researches->links() }}
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-microscope fa-3x text-muted mb-3"></i>
                <h5>No research found</h5>
                <p class="text-muted">Create your first research to get started.</p>
                <a href="{{ route('admin.researches.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Create Research
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
