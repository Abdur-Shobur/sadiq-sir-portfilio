@extends('admin.layouts.app')

@section('title', 'View Message')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">View Message</h1>
    <div>

        <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Back to Messages
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-envelope"></i> Message Details
                </h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong>From:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $message->name }} ({{ $message->email }})
                    </div>
                </div>

                @if($message->subject)
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <strong>Subject:</strong>
                        </div>
                        <div class="col-md-9">
                            {{ $message->subject }}
                        </div>
                    </div>
                @endif

                <div class="row mb-3">
                    <div class="col-md-3">
                        <strong>Date:</strong>
                    </div>
                    <div class="col-md-9">
                        {{ $message->created_at->format('F d, Y \a\t g:i A') }}
                    </div>
                </div>



                <hr>

                <div class="row">
                    <div class="col-12">
                        <strong>Message:</strong>
                        <div class="mt-2 p-3 bg-light rounded">
                            {!! nl2br(e($message->message)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-cogs"></i> Actions
                </h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">


                    <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject ?? 'Your message' }}"
                       class="btn btn-primary">
                        <i class="fas fa-reply"></i> Reply via Email
                    </a>

                    <form action="{{ route('admin.messages.destroy', $message) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this message?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            <i class="fas fa-trash"></i> Delete Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
