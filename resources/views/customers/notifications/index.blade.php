@extends('customers.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold mb-2">{{ __('messages.notif.title') }}</h1>
        </div>
        @if($notifications->total() > 0)
            <form action="{{ route('notifications.markAllAsRead') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-outline btn-sm">
                    {{ __('messages.notif.mark_all_read') }}
                </button>
            </form>
        @endif
    </div>

    @if($notifications->isEmpty())
        <div class="bg-white rounded-lg shadow p-8 text-center">
            <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0120 15.571V11a6 6 0 10-12 0v4.571c0-.713-.273-1.39-.605-1.905L7 17h5m5 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ __('messages.notif.no_notifications') }}</h2>
            <p class="text-gray-600">Không có thông báo mới lúc này</p>
        </div>
    @else
        <div class="space-y-4">
            @foreach($notifications as $notification)
                <div class="bg-white rounded-lg shadow p-6 border-l-4 @if(!$notification->is_read) border-blue-500 @else border-gray-300 @endif hover:shadow-lg transition">
                    <div class="flex justify-between items-start">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-2">
                                @if($notification->icon)
                                    <span class="text-2xl">{{ $notification->icon }}</span>
                                @else
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                @endif
                                <h3 class="font-semibold text-lg">{{ $notification->title }}</h3>
                                @if(!$notification->is_read)
                                    <span class="badge badge-primary">{{ __('messages.notif.new') }}</span>
                                @endif
                            </div>
                            <p class="text-gray-600 mb-3">{{ $notification->message }}</p>
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <span>{{ $notification->created_at->diffForHumans() }}</span>
                                @if($notification->action_url)
                                    <a href="{{ $notification->action_url }}" class="text-blue-600 hover:underline">
                                        {{ __('messages.common.view') }} →
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="flex gap-2">
                            @if(!$notification->is_read)
                                <form action="{{ route('notifications.markAsRead', $notification) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-ghost btn-sm" title="{{ __('messages.notif.mark_read') }}">
                                        ✓
                                    </button>
                                </form>
                            @endif
                            <form action="{{ route('notifications.destroy', $notification) }}" method="POST" style="display: inline;" onsubmit="return confirm('{{ __('messages.common.confirm_delete') ?? 'Xác nhận xóa?' }}');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-ghost btn-sm text-error">
                                    ✕
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $notifications->links() }}
        </div>
    @endif
</div>

<style>
.pagination {
    display: flex;
    gap: 0.5rem;
    justify-content: center;
    margin-top: 2rem;
}

.pagination a, .pagination span {
    padding: 0.5rem 0.75rem;
    border-radius: 0.375rem;
    border: 1px solid #e5e7eb;
    text-decoration: none;
    color: #1f2937;
}

.pagination a:hover {
    background-color: #f3f4f6;
}

.pagination .active span {
    background-color: #3b82f6;
    color: white;
    border-color: #3b82f6;
}

.pagination .disabled span {
    color: #d1d5db;
    cursor: not-allowed;
}
</style>
@endsection
