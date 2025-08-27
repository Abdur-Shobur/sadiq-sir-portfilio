@extends('admin.layouts.app')

@section('title', 'Events')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Events</h1>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> New Event
    </a>
</div>

<div class="card">
    <div class="card-body">
        @if($events->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Date & Time</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>
                                    @if($event->image)
                                        <img src="{{ Storage::url($event->image) }}" alt="{{ $event->title }}"
                                             class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-light d-flex align-items-center justify-content-center"
                                             style="width: 50px; height: 50px;">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $event->title }}</strong>
                                    <br>
                                    <small class="text-muted">{{ Str::limit($event->description, 50) }}</small>
                                </td>
                                <td>
                                    @if($event->event_date)
                                        <strong>{{ $event->event_date->format('M d, Y') }}</strong>
                                        @if($event->time)
                                            <br>
                                            <small class="text-muted">{{ $event->time }}</small>
                                        @endif
                                    @else
                                        <span class="text-muted">No date set</span>
                                    @endif
                                </td>
                                <td>{{ $event->location ?? 'No location' }}</td>
                                <td>
                                    <span class="badge bg-{{ $event->status === 'upcoming' ? 'primary' : ($event->status === 'ongoing' ? 'success' : 'secondary') }}">
                                        {{ ucfirst($event->status) }}
                                    </span>
                                </td>
                                <td>{{ $event->created_at->format('M d, Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this event?')"
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
                {{ $events->links() }}
            </div>
        @else
            <div class="text-center py-4">
                <i class="fas fa-calendar fa-3x text-muted mb-3"></i>
                <h5>No events found</h5>
                <p class="text-muted">Create your first event to get started.</p>
                <a href="{{ route('admin.events.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Create Event
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
