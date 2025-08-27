@extends('admin.layouts.app')

@section('title', 'Contact Messages')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Contact Messages</h1>
</div>

<div class="card">
    <div class="card-body">
        @if($messages->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>

                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td>
                                    <strong>{{ $message->name }}</strong>
                                </td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->subject ?? 'No Subject' }}</td>
                                <td>{{ Str::limit($message->message, 50) }}</td>

                                <td>{{ $message->created_at->format('M d, Y H:i') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.messages.show', $message) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this message?')"
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
                {{ $messages->links() }}
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-envelope fa-3x text-muted mb-3"></i>
                <h5>No messages found</h5>
                <p class="text-muted">No contact messages have been received yet.</p>
            </div>
        @endif
    </div>
</div>
@endsection
