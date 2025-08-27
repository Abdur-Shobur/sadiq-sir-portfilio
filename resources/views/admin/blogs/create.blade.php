@extends('admin.layouts.app')

@section('title', 'Create Blog Post')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Create Blog Post</h1>
    <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-secondary">
        <i class="fas fa-arrow-left"></i> Back to Blogs
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
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
                        <label for="excerpt" class="form-label">Excerpt</label>
                        <textarea class="border form-control @error('excerpt') is-invalid @enderror"
                                  id="excerpt" name="excerpt" rows="3">{{ old('excerpt') }}</textarea>
                        @error('excerpt')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                                                            <div class="mb-3">
                        <label for="content" class="form-label">Content *</label>
                        <div id="editor-container" style="height: 400px;">
                            <div id="content" class="form-control @error('content') is-invalid @enderror" style="height: 350px;">{!! old('content') !!}</div>
                        </div>
                        <input type="hidden" name="content" id="content-input" value="{{ old('content') }}">
                        @error('content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="blog_category_id" class="form-label">Category *</label>
                        <select class="form-select @error('blog_category_id') is-invalid @enderror"
                                id="blog_category_id" name="blog_category_id" required>
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('blog_category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('blog_category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status *</label>
                        <select class="form-select @error('status') is-invalid @enderror"
                                id="status" name="status" required>
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Featured Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                               id="image" name="image" accept="image/*">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Recommended size: 800x600 pixels. Max size: 2MB.</div>
                    </div>

                    <div class="mb-3">
                        <div id="image-preview" class="d-none">
                            <img id="preview-img" src="" alt="Preview" class="img-fluid rounded">
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Create Blog Post
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
#content {
    border: none !important;
    padding: 0 !important;
}
</style>
<script>
// Initialize Quill Editor
var quill = new Quill('#content', {
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
    placeholder: 'Start writing your blog content here...',
    height: 400
});

// Update hidden input with HTML content before form submission
document.querySelector('form').addEventListener('submit', function() {
    var contentInput = document.querySelector('#content-input');
    contentInput.value = quill.root.innerHTML;
});

// Also update on content change
quill.on('text-change', function() {
    var contentInput = document.querySelector('#content-input');
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
