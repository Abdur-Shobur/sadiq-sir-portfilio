@extends('admin.layouts.app')

@section('title', 'View Profile')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Profile Details</h5>
                    <div>
                        <a href="{{ route('admin.profiles.edit', $profile) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a href="{{ route('admin.profiles.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Profiles
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <h6 class="text-muted">Profile ID</h6>
                                <p class="fw-bold">{{ $profile->id }}</p>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-muted">Email</h6>
                                <p class="fw-bold">{{ $profile->email }}</p>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-muted">Phone</h6>
                                <p class="fw-bold">{{ $profile->phone }}</p>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-muted">Address</h6>
                                <p class="fw-bold">{{ $profile->address }}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-4">
                                <h6 class="text-muted">Logo</h6>
                                @if($profile->logo)
                                    <img src="{{ asset('storage/' . $profile->logo) }}" alt="Profile Logo" class="img-thumbnail" style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                @else
                                    <p class="text-muted">No logo uploaded</p>
                                @endif
                            </div>

                            <div class="mb-4">
                                <h6 class="text-muted">Profile Image</h6>
                                @if($profile->image)
                                    <img src="{{ asset('storage/' . $profile->image) }}" alt="Profile Image" class="img-thumbnail" style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                @else
                                    <p class="text-muted">No image uploaded</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-4">
                                <h6 class="text-muted">Created At</h6>
                                <p class="fw-bold">{{ $profile->created_at->format('F d, Y \a\t h:i A') }}</p>
                            </div>

                            <div class="mb-4">
                                <h6 class="text-muted">Last Updated</h6>
                                <p class="fw-bold">{{ $profile->updated_at->format('F d, Y \a\t h:i A') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
