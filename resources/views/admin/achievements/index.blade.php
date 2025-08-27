@extends('admin.layouts.app')

@section('title', 'Achievements')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Achievements</h1>
    <a href="{{ route('admin.achievements.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> New Achievement
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($achievements->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Period</th>
                            <th>Description</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($achievements as $achievement)
                            <tr>
                                <td>
                                    @if($achievement->image)
                                        <img src="{{ Storage::url($achievement->image) }}" alt="{{ $achievement->title }}"
                                             class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center"
                                             style="width: 50px; height: 50px;">
                                            <i class="fas fa-trophy text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $achievement->title }}</strong>
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $achievement->period }}</span>
                                </td>
                                <td>
                                    <small class="text-muted">{{ Str::limit($achievement->description, 80) }}</small>
                                </td>
                                <td>
                                    @if($achievement->link)
                                        <a href="{{ $achievement->link }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-external-link-alt"></i>
                                        </a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge bg-{{ $achievement->is_active ? 'success' : 'secondary' }}">
                                        {{ $achievement->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>{{ $achievement->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.achievements.edit', $achievement) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.achievements.destroy', $achievement) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this achievement?')"
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
                {{ $achievements->links() }}
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-trophy fa-3x text-muted mb-3"></i>
                <h5>No achievements found</h5>
                <p class="text-muted">Create your first achievement to get started.</p>
                <a href="{{ route('admin.achievements.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Create Achievement
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
