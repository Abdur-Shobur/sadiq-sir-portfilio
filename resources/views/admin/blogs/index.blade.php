@extends('admin.layouts.app')

@section('title', 'Blog Posts')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Blog Posts</h1>
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> New Blog Post
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($blogs->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                            <tr>
                                <td>
                                    @if($blog->image)
                                        <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}"
                                             class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center"
                                             style="width: 50px; height: 50px;">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $blog->title }}</strong>
                                    @if($blog->excerpt)
                                        <br>
                                        <small class="text-muted">{{ Str::limit($blog->excerpt, 50) }}</small>
                                    @endif
                                </td>
                                <td>{{ $blog->category->name ?? 'Uncategorized' }}</td>
                                <td>
                                    <span class="badge bg-{{ $blog->status === 'published' ? 'success' : 'warning' }}">
                                        {{ ucfirst($blog->status) }}
                                    </span>
                                </td>
                                <td>{{ $blog->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this blog post?')"
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
                {{ $blogs->links() }}
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-blog fa-3x text-muted mb-3"></i>
                <h5>No blog posts found</h5>
                <p class="text-muted">Create your first blog post to get started.</p>
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Create Blog Post
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
