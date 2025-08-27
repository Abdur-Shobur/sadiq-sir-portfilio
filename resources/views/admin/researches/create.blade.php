@extends('admin.layouts.app')

@section('title', 'Create Research')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Create Research</h1>
    <a href="{{ route('admin.researches.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to Research
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.researches.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="description" class="form-label">Short Description *</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                        <div class="form-text">Brief description of the research (max 1000 characters)</div>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="long_description" class="form-label">Detailed Description *</label>
                        <div id="editor-container" style="height: 400px;">
                            <div id="long_description" class="form-control @error('long_description') is-invalid @enderror" style="height: 350px;">{{ old('long_description') }}</div>
                        </div>
                        <input type="hidden" name="long_description" id="long_description-input" value="{{ old('long_description') }}">
                        @error('long_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="link" class="form-label">External Link</label>
                        <input type="url" class="form-control @error('link') is-invalid @enderror"
                               id="link" name="link" value="{{ old('link') }}" placeholder="https://example.com">
                        <div class="form-text">Optional external link to research details</div>
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
                        <div class="form-text">Upload an image for this research (max 2MB)</div>
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
                        <div class="form-text">Uncheck to hide this research from the frontend</div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.researches.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Create Research
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<style>
.ql-editor {
    min-height: 300px;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    font-size: 14px;
    line-height: 1.6;
    border: 1px solid #ccc;
    padding: 10px;
    border-top: none;
    border-radius: 0 0 0.375rem 0.375rem;
}
.ql-toolbar {
    border-top: 1px solid #ccc;
    border-left: 1px solid #ccc;
    border-right: 1px solid #ccc;
    border-radius: 0.375rem 0.375rem 0 0;
}
.ql-container {
    border-bottom: 1px solid #ccc;
    border-left: 1px solid #ccc;
    border-right: 1px solid #ccc;
    border-radius: 0 0 0.375rem 0.375rem;
}
#long_description {
    border: none !important;
    padding: 0 !important;
}
</style>
<script>
// Initialize Quill Editor
var quill = new Quill('#long_description', {
    theme: 'snow',
    modules: {
        toolbar: [
            [{ 'header': [1, 2, 3, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'align': [] }],
            ['link', 'image'],
            ['clean']
        ]
    },
    placeholder: 'Start writing your research details here...',
    height: 400
});

// Update hidden input with HTML content before form submission
document.querySelector('form').addEventListener('submit', function() {
    var contentInput = document.querySelector('#long_description-input');
    contentInput.value = quill.root.innerHTML;
});

// Also update on content change
quill.on('text-change', function() {
    var contentInput = document.querySelector('#long_description-input');
    contentInput.value = quill.root.innerHTML;
});

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
