@extends('admin.layouts.app')

@section('title', 'Create Achievement')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Create Achievement</h1>
    <a href="{{ route('admin.achievements.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to Achievements
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.achievements.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title *</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                               id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="period" class="form-label">Period *</label>
                        <input type="text" class="form-control @error('period') is-invalid @enderror"
                               id="period" name="period" value="{{ old('period') }}"
                               placeholder="e.g., 08/2008 – 07/2014" required>
                        <div class="form-text">Enter the period in format like "08/2008 – 07/2014"</div>
                        @error('period')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description *</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                        <div class="form-text">Describe the achievement in detail</div>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label">External Link</label>
                        <input type="url" class="form-control @error('link') is-invalid @enderror"
                               id="link" name="link" value="{{ old('link') }}" placeholder="https://example.com">
                        <div class="form-text">Optional external link to achievement details</div>
                        @error('link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                               id="image" name="image" accept="image/*">
                        <div class="form-text">Upload an image for this achievement (max 2MB)</div>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div id="image-preview" class="d-none">
                            <strong>Image Preview:</strong>
                            <img id="preview-img" src="" alt="Preview" class="img-fluid rounded mt-2">
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input type="hidden" name="is_active" value="0">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1"
                                   {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Active
                            </label>
                        </div>
                        <div class="form-text">Uncheck to hide this achievement from the frontend</div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.achievements.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Create Achievement
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
// Image preview functionality
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('d-none');
        }
        reader.readAsDataURL(file);
    } else {
        preview.classList.add('d-none');
    }
});
</script>
@endpush
