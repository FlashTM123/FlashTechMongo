<!-- Floating Notifications Widget -->
@auth('customer')
<div id="notifications-widget" class="relative z-[1005]">
    <button type="button" class="relative p-2 text-slate-500 hover:text-blue-600 hover:bg-blue-50/50 rounded-xl transition-all hover-float group flex flex-col items-center justify-center h-12 w-12" id="notifications-btn" onclick="toggleNotifications()">
        <svg class="w-5 h-5 mb-0.5 group-hover:-translate-y-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0120 15.571V11a6 6 0 10-12 0v4.571c0-.713-.273-1.39-.605-1.905L7 17h5m5 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        <span class="text-[0.6rem] font-bold tracking-tight hidden sm:block">THÔNG BÁO</span>
        <span id="notifications-badge" class="absolute top-1 right-1 bg-rose-500 text-white text-[0.65rem] font-bold px-1.5 min-w-[1.25rem] rounded-full shadow-sm border border-white text-center leading-tight hidden">0</span>
    </button>

    <!-- Notifications Dropdown Panel -->
    <div id="notifications-panel" class="absolute top-full right-0 mt-2 w-80 sm:w-96 bg-white/95 backdrop-blur-xl rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-100 hidden max-h-[400px] overflow-y-auto z-[1006]">
        <div class="p-4 border-b border-slate-100 sticky top-0 bg-white/90 backdrop-blur-sm z-10">
            <div class="flex justify-between items-center">
                <h3 class="font-semibold">{{ __('messages.notif.title') }}</h3>
                <button onclick="toggleNotifications()" class="btn btn-ghost btn-xs">✕</button>
            </div>
        </div>

        <div id="notifications-list" class="divide-y">
            <div class="p-4 text-center text-gray-500">
                {{ __('messages.notif.no_notifications') }}
            </div>
        </div>

        <div class="p-4 border-t sticky bottom-0 bg-gray-50">
            <a href="{{ route('notifications.index') }}" class="btn btn-primary btn-sm w-full">
                {{ __('messages.common.view') }} {{ __('messages.notif.title') }}
            </a>
        </div>
    </div>
</div>

<script>
let notificationsOpen = false;

function toggleNotifications() {
    const panel = document.getElementById('notifications-panel');
    notificationsOpen = !notificationsOpen;

    if (notificationsOpen) {
        panel.classList.remove('hidden');
        loadUnreadNotifications();
    } else {
        panel.classList.add('hidden');
    }
}

function loadUnreadNotifications() {
    fetch('{{ route('notifications.getUnread') }}')
        .then(response => response.json())
        .then(data => {
            const list = document.getElementById('notifications-list');
            const badge = document.getElementById('notifications-badge');

            if (data.unread_count > 0) {
                badge.textContent = data.unread_count;
                badge.classList.remove('hidden');
            } else {
                badge.classList.add('hidden');
            }

            if (data.notifications.length > 0) {
                list.innerHTML = '';
                data.notifications.forEach(notif => {
                    const notifEl = document.createElement('div');
                    notifEl.className = 'p-4 hover:bg-gray-50 cursor-pointer transition';
                    notifEl.innerHTML = `
                        <div class="flex gap-3">
                            <span class="text-2xl">${notif.icon || '🔔'}</span>
                            <div class="flex-1">
                                <h4 class="font-semibold text-sm">${notif.title}</h4>
                                <p class="text-sm text-gray-600">${notif.message}</p>
                                <p class="text-xs text-gray-500 mt-1">${notif.created_at}</p>
                            </div>
                        </div>
                    `;

                    if (notif.action_url) {
                        notifEl.onclick = () => window.location.href = notif.action_url;
                    }

                    list.appendChild(notifEl);
                });
            } else {
                list.innerHTML = '<div class="p-4 text-center text-gray-500">{{ __("messages.notif.no_notifications") }}</div>';
            }
        });
}

function markNotificationAsRead(notifId) {
    const url = `/thong-bao/${notifId}/da-doc`;
    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            loadUnreadNotifications();
        }
    })
    .catch(error => console.error('Error marking notification as read:', error));
}

// Listen for real-time notifications via Laravel Echo
document.addEventListener('DOMContentLoaded', function () {
    if (typeof window.Echo !== 'undefined') {
        const customerId = '{{ auth("customer")->id() }}';
        if (customerId) {
            window.Echo.private('customer.' + customerId)
                .listen('.notification.created', (e) => {
                    loadUnreadNotifications();
                    if (typeof flasher !== 'undefined') {
                        flasher.info(e.title || 'Bạn có thông báo mới');
                    }
                });
        }
    }
});

// Load on page load
loadUnreadNotifications();
</script>

<style>
#notifications-panel {
    min-width: 384px;
}
</style>
@endauth
