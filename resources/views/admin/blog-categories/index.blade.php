@extends('admin.layouts.app')

@section('title', 'Blog Categories')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Blog Categories</h1>
    <a href="{{ route('admin.blog-categories.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> New Category
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($categories->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Posts Count</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    <strong>{{ $category->name }}</strong>
                                </td>
                                <td>
                                    <code>{{ $category->slug }}</code>
                                </td>
                                <td>
                                    {{ Str::limit($category->description, 50) }}
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $category->blogs_count ?? 0 }}</span>
                                </td>
                                <td>
                                    @if($category->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.blog-categories.edit', $category) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.blog-categories.destroy', $category) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this category?')"
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
                {{ $categories->links() }}
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-tags fa-3x text-muted mb-3"></i>
                <h5>No blog categories found</h5>
                <p class="text-muted">Create your first blog category to get started.</p>
                <a href="{{ route('admin.blog-categories.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Create Category
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
