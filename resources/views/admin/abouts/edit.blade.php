@extends('admin.layouts.app')

@section('title', 'Edit About Section')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Edit About Section</h1>
    <a href="{{ route('admin.abouts.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left"></i> Back to About Sections
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.abouts.update', $about) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                               id="title" name="title" value="{{ old('title', $about->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Subtitle *</label>
                        <input type="text" class="form-control @error('subtitle') is-invalid @enderror"
                               id="subtitle" name="subtitle" value="{{ old('subtitle', $about->subtitle) }}" required>
                        @error('subtitle')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description *</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description" name="description" rows="6" required>{{ old('description', $about->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">This is the main content that will be displayed in the about section.</div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="image1" class="form-label">Image 1</label>
                        <input type="file" class="form-control @error('image1') is-invalid @enderror"
                               id="image1" name="image1" accept="image/*">
                        @error('image1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Leave empty to keep current image. Max size: 2MB.</div>
                    </div>

                    @if($about->image1)
                    <div class="mb-3">
                        <label class="form-label">Current Image 1</label>
                        <div>
                            <img src="{{ asset('storage/' . $about->image1) }}"
                                 alt="Image 1"
                                 class="img-fluid rounded"
                                 style="max-width: 100%; height: auto;">
                        </div>
                    </div>
                    @endif

                    <div class="mb-3">
                        <label for="image2" class="form-label">Image 2</label>
                        <input type="file" class="form-control @error('image2') is-invalid @enderror"
                               id="image2" name="image2" accept="image/*">
                        @error('image2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Leave empty to keep current image. Max size: 2MB.</div>
                    </div>

                    @if($about->image2)
                    <div class="mb-3">
                        <label class="form-label">Current Image 2</label>
                        <div>
                            <img src="{{ asset('storage/' . $about->image2) }}"
                                 alt="Image 2"
                                 class="img-fluid rounded"
                                 style="max-width: 100%; height: auto;">
                        </div>
                    </div>
                    @endif

                    <div class="mb-3">
                        <div class="form-check">
                            <input type="hidden" name="is_active" value="0">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1"
                                   {{ old('is_active', $about->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active
                            </label>
                        </div>
                        <div class="form-text">Inactive about sections won't be displayed on the frontend</div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.abouts.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update About Section
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
