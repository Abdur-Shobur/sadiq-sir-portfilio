@extends('admin.layouts.app')

@section('title', 'Profile Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Profile Management</h5>
                    <a href="{{ route('admin.profiles.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Profile
                    </a>
                </div>
                <div class="card-body">
                    @if($profiles->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Logo</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Image</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($profiles as $profile)
                                        <tr>
                                            <td>{{ $profile->id }}</td>
                                            <td>
                                                @if($profile->logo)
                                                    <img src="{{ asset('storage/' . $profile->logo) }}" alt="Logo" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                                @else
                                                    <span class="text-muted">No Logo</span>
                                                @endif
                                            </td>
                                            <td>{{ $profile->email }}</td>
                                            <td>{{ $profile->phone }}</td>
                                            <td>{{ Str::limit($profile->address, 50) }}</td>
                                            <td>
                                                @if($profile->image)
                                                    <img src="{{ asset('storage/' . $profile->image) }}" alt="Image" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                                @else
                                                    <span class="text-muted">No Image</span>
                                                @endif
                                            </td>
                                            <td>{{ $profile->created_at->format('M d, Y') }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.profiles.show', $profile) }}" class="btn btn-sm btn-info">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.profiles.edit', $profile) }}" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.profiles.destroy', $profile) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this profile?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
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
                            {{ $profiles->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-user-circle fa-3x text-muted mb-3"></i>
                            <h5 class="text-muted">No profiles found</h5>
                            <p class="text-muted">Get started by creating your first profile.</p>
                            <a href="{{ route('admin.profiles.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Create Profile
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
