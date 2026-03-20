<!-- Floating Chat Widget -->
@auth('customer')
<div id="chat-widget-button" class="fixed bottom-8 right-8 z-40">
    <button id="chat-toggle-btn" class="btn btn-circle btn-lg btn-primary shadow-lg hover:shadow-xl transition relative group" onclick="toggleChat()" title="Chat Support">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
        </svg>
        <span id="chat-unread-badge" class="badge badge-error absolute -top-2 -right-2 hidden text-xs">0</span>
    </button>

    <!-- Chat Widget Panel -->
    <div id="chat-widget-panel" class="absolute bottom-20 right-0 w-96 h-[500px] bg-white rounded-xl shadow-2xl hidden flex flex-col z-50 border border-gray-200" style="display: none;">
        <!-- Header -->
        <div class="bg-gradient-to-r from-primary to-primary/80 text-white px-6 py-4 rounded-t-xl flex justify-between items-center shadow-md">
            <div>
                <h3 id="chat-title" class="font-bold text-lg">Hỗ Trợ Trực Tuyến</h3>
                <p class="text-xs text-primary-content/80">{{ __('common.online') }}</p>
            </div>
            <button onclick="toggleChat()" class="btn btn-ghost btn-sm text-white hover:bg-white/20">✕</button>
        </div>

        <!-- Messages Area -->
        <div id="chat-messages" class="flex-1 overflow-y-auto p-4 space-y-3 bg-gray-50"></div>

        <!-- Input Area -->
        <div class="border-t border-gray-200 bg-white p-4 rounded-b-xl">
            <form onsubmit="sendWidgetMessage(event)" class="flex gap-2">
                <input
                    type="text"
                    id="widget-message-input"
                    placeholder="Nhập tin nhắn..."
                    class="input input-bordered input-sm flex-1 focus:outline-none focus:ring-2 focus:ring-primary"
                >
                <button type="submit" id="chat-send-btn" class="btn btn-primary btn-sm px-6">
                    Gửi
                </button>
            </form>
        </div>
    </div>
</div>

<script>
// Chat translations
let chatTranslations = {
    title: 'Hỗ Trợ Trực Tuyến',
    no_agents: 'Hiện tại không có nhân viên hỗ trợ. Vui lòng để lại tin nhắn.',
    start: 'Bắt Đầu Cuộc Trò Chuyện',
    placeholder: 'Nhập tin nhắn của bạn...',
    send: 'Gửi',
    online: 'Trực Tuyến',
    offline: 'Ngoại Tuyến',
    support: 'Hỗ Trợ',
};

let chatWidgetOpen = false;
let chatRoomId = null;

// Load translations dynamically
function loadChatTranslations() {
    // Get current locale from multiple sources
    let currentLocale = sessionStorage.getItem('locale') ||
                       document.documentElement.lang ||
                       document.documentElement.getAttribute('data-locale') ||
                       'vi';
                       
    if (currentLocale === 'en') {
        chatTranslations = {
            title: 'Live Chat Support',
            no_agents: 'No support agents available. Please leave a message.',
            start: 'Start Chat',
            placeholder: 'Type your message...',
            send: 'Send',
            online: 'Online',
            offline: 'Offline',
            support: 'Support',
        };
    } else {
        chatTranslations = {
            title: 'Hỗ Trợ Trực Tuyến',
            no_agents: 'Hiện tại không có nhân viên hỗ trợ. Vui lòng để lại tin nhắn.',
            start: 'Bắt Đầu Cuộc Trò Chuyện',
            placeholder: 'Nhập tin nhắn của bạn...',
            send: 'Gửi',
            online: 'Trực Tuyến',
            offline: 'Ngoại Tuyến',
            support: 'Hỗ Trợ',
        };
    }

    updateChatUIText();
}

// Update chat UI text based on current translations
function updateChatUIText() {
    document.getElementById('chat-title').textContent = chatTranslations.title;
    document.getElementById('widget-message-input').placeholder = chatTranslations.placeholder;
    document.getElementById('chat-send-btn').textContent = chatTranslations.send;
}

function toggleChat() {
    const panel = document.getElementById('chat-widget-panel');
    chatWidgetOpen = !chatWidgetOpen;

    if (chatWidgetOpen) {
        panel.style.display = 'flex';
        loadChatStatus();
        loadChatMessages();
    } else {
        panel.style.display = 'none';
    }
}

function loadChatStatus() {
    fetch('{{ route('chat.widget') }}')
        .then(response => response.json())
        .then(data => {
            if (data.authenticated) {
                const oldChatRoomId = chatRoomId;
                chatRoomId = data.chat_room_id;
                
                // Subscribe to Echo channel if room exists
                if (chatRoomId && chatRoomId !== oldChatRoomId && typeof window.Echo !== 'undefined') {
                    window.Echo.private('chat-room.' + chatRoomId)
                        .listen('.message.sent', (e) => {
                            if (chatWidgetOpen) {
                                loadChatMessages();
                                loadChatStatus();
                            } else {
                                loadChatStatus();
                            }
                        });
                }
                
                const badge = document.getElementById('chat-unread-badge');
                if (data.unread_count > 0) {
                    badge.textContent = data.unread_count;
                    badge.classList.remove('hidden');
                } else {
                    badge.classList.add('hidden');
                }
            }
        });
}

function loadChatMessages() {
    if (!chatRoomId) {
        const container = document.getElementById('chat-messages');
        container.innerHTML = `<div class="flex flex-col items-center justify-center h-full text-center">
            <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <p class="text-gray-600 text-sm mb-4">${chatTranslations.no_agents}</p>
            <button onclick="createChatRoom()" class="btn btn-primary btn-sm">${chatTranslations.start}</button>
        </div>`;
        return;
    }

    const url = `/tro-giup/phong/${chatRoomId}/tin-nhan`;
    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                displayChatMessages(data.messages);
            }
        })
        .catch(error => console.error('Error loading messages:', error));
}

function displayChatMessages(messages) {
    const container = document.getElementById('chat-messages');
    container.innerHTML = '';

    if (messages.length === 0) {
        container.innerHTML = '<div class="text-center text-gray-400 py-8"><p class="text-sm">Bắt đầu cuộc trò chuyện</p></div>';
        return;
    }

    messages.forEach(msg => {
        const messageEl = document.createElement('div');
        const isCustomer = msg.sender_type === 'customer';
        messageEl.className = `flex ${isCustomer ? 'justify-end' : 'justify-start'}`;

        const messageTime = new Date(msg.created_at).toLocaleTimeString('vi-VN', {
            hour: '2-digit',
            minute: '2-digit'
        });

        messageEl.innerHTML = `
            <div class="max-w-xs">
                <div class="flex items-end gap-2">
                    ${!isCustomer ? `<div class="flex-shrink-0 w-6 h-6 rounded-full bg-primary/20 flex items-center justify-center">
                        <span class="text-xs font-bold text-primary">H</span>
                    </div>` : ''}
                    <div class="rounded-lg px-3 py-2 shadow-sm ${isCustomer ? 'bg-primary text-white rounded-br-none' : 'bg-gray-200 text-gray-900 rounded-bl-none'}">
                        <p class="text-xs font-semibold opacity-70">${msg.sender_name}</p>
                        <p class="text-sm leading-snug">${msg.message || msg.text}</p>
                        <p class="text-xs mt-1 ${isCustomer ? 'text-blue-100' : 'text-gray-500'}">${messageTime}</p>
                    </div>
                </div>
            </div>
        `;
        container.appendChild(messageEl);
    });

    container.scrollTop = container.scrollHeight;
}

function createChatRoom() {
    fetch('{{ route('chat.create') }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ subject: 'Support Request' })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            chatRoomId = data.chat_room_id;
            loadChatMessages();
        }
    });
}

function sendWidgetMessage(event) {
    event.preventDefault();
    const input = document.getElementById('widget-message-input');
    const message = input.value;

    if (!chatRoomId) {
        createChatRoom();
        return;
    }

    const url = `/tro-giup/phong/${chatRoomId}/gui-tin`;
    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ message: message })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            input.value = '';
            loadChatMessages();
        }
    })
    .catch(error => console.error('Error sending message:', error));
}

// Laravel Echo Listener will be attached dynamically when chatRoomId is received.
// Check loadChatStatus for the Echo subscription logic.

// Listen for language changes
document.addEventListener('languageChanged', (event) => {
    loadChatTranslations();
    if (chatWidgetOpen) {
        loadChatMessages();
    }
});

// Also observe for language changes via data attribute
const observer = new MutationObserver(() => {
    const htmlLang = document.documentElement.lang;
    const stored = sessionStorage.getItem('locale');
    if (htmlLang && stored && htmlLang !== stored) {
        loadChatTranslations();
    }
});

observer.observe(document.documentElement, { attributes: true, attributeFilter: ['lang'] });

// Initialize on page load
loadChatTranslations();
</script>

<style>
#chat-widget-panel {
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
}
</style>
@endauth
