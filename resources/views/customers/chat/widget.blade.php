@extends('customers.layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold mb-2">{{ __('messages.chat.title') }}</h1>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- Chat List -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow p-4">
                <h2 class="font-semibold mb-4">Cuộc trò chuyện</h2>
                @if($chatRoom)
                    <div class="cursor-pointer p-3 bg-blue-50 rounded hover:bg-blue-100 transition">
                        <div class="flex items-center justify-between">
                            <div class="flex-1">
                                <h3 class="font-semibold text-sm">{{ $chatRoom->subject }}</h3>
                                <p class="text-xs text-gray-500">{{ $chatRoom->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                            @if($chatRoom->unreadMessages->count() > 0)
                                <span class="badge badge-error">{{ $chatRoom->unreadMessages->count() }}</span>
                            @endif
                        </div>
                    </div>
                @else
                    <button onclick="startChat()" class="btn btn-primary btn-sm w-full">
                        {{ __('messages.chat.start') }}
                    </button>
                @endif
            </div>
        </div>

        <!-- Chat Area -->
        <div class="lg:col-span-3">
            <div class="bg-white rounded-lg shadow flex flex-col h-[500px]">
                @if(!$chatRoom)
                    <div class="flex-1 flex items-center justify-center text-gray-500">
                        <div class="text-center">
                            <svg class="w-12 h-12 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                            <p>{{ __('messages.chat.no_agents') }}</p>
                            <button onclick="startChat()" class="btn btn-primary btn-sm mt-4">
                                {{ __('messages.chat.start') }}
                            </button>
                        </div>
                    </div>
                @else
                    <!-- Messages -->
                    <div class="flex-1 overflow-y-auto p-4 space-y-4" id="messagesContainer">
                        @forelse($messages as $msg)
                            <div class="flex @if($msg->sender_type === 'customer') justify-end @else justify-start @endif">
                                <div class="max-w-xs @if($msg->sender_type === 'customer') bg-blue-500 text-white @else bg-gray-200 text-gray-800 @endif rounded-lg p-3">
                                    <p class="text-sm font-semibold">{{ $msg->sender_name }}</p>
                                    <p class="text-sm">{{ $msg->message }}</p>
                                    <p class="text-xs @if($msg->sender_type === 'customer') text-blue-100 @else text-gray-500 @endif mt-1">
                                        {{ $msg->created_at->format('H:i') }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-gray-500 py-8">
                                Bắt đầu cuộc trò chuyện
                            </div>
                        @endforelse
                    </div>

                    <!-- Input -->
                    <div class="border-t p-4">
                        <form onsubmit="sendMessage(event)" class="flex gap-2">
                            <input
                                type="text"
                                id="messageInput"
                                placeholder="{{ __('messages.chat.placeholder') }}"
                                class="input input-bordered flex-1"
                                required
                            >
                            <button type="submit" class="btn btn-primary">
                                {{ __('messages.chat.send') }}
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
function startChat() {
    fetch('{{ route('chat.create') }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            subject: 'Support Request'
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    });
}

function sendMessage(event) {
    event.preventDefault();
    const message = document.getElementById('messageInput').value;
    const chatRoomId = '{{ $chatRoom->_id ?? "" }}';

    if (!chatRoomId) {
        alert('Vui lòng bắt đầu cuộc trò chuyện');
        return;
    }

    fetch(`{{ route('chat.sendMessage', '') }}/${chatRoomId}/gui-tin`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ message: message })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('messageInput').value = '';
            location.reload();
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
@endsection
