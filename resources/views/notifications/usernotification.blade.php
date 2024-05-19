@extends('layouts.user')

@section('title', 'Notifications')

@section('contents')


    <div style="background-color: #f2f2f2; padding: 20px; border: 1px solid #ccc;">
        <h1 style="color: #333;">Your Notifications</h1>

        @if ($notifications->isEmpty())
            <p>No notifications</p>
        @else
            <p>You have {{ $notifications->count() }} notifications</p>
            <ul>
                @foreach ($notifications as $notification)
                    <li style="background-color: #fff; padding: 10px; margin-bottom: 10px;">
                        <span style="color: #333;">{{ $notification->data['message'] }} - {{ $notification->created_at->diffForHumans() }}</span>
                        @if (is_null($notification->read_at))
                            <a href="{{ route('notifications.markAsRead', $notification->id) }}" style="color: #007bff; text-decoration: underline;">Mark as read</a>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

@endsection('contents')