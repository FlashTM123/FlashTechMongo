# FlashTech v2.0 - Integration Guide

## 🚀 Quick Start

### 1. Run Migrations
```bash
php artisan migrate
```

This will create 3 new collections in MongoDB:
- `chat_rooms` - Store chat conversations
- `chat_messages` - Store chat messages
- `notifications` - Store all notifications

### 2. Dump Composer Autoload
```bash
composer dump-autoload
```

This loads the new helper functions from `app/Helpers/LocaleHelper.php`.

### 3. Clear Cache
```bash
php artisan config:clear
php artisan cache:clear
```

### 4. Verify Setup
Visit these routes to test:
- `http://localhost:8000/` - Should show language switcher in navbar
- `http://localhost:8000/so-sanh` - Product comparison page
- `http://localhost:8000/tro-giup` - Chat support page
- `http://localhost:8000/thong-bao` - Notifications page

---

## 📦 What's Included

### Controllers (3)
```
app/Http/Controllers/
  ├── ComparisonController.php
  ├── ChatController.php
  └── NotificationController.php
```

### Models (3)
```
app/Models/
  ├── ChatRoom.php
  ├── ChatMessage.php
  └── Notification.php
```

### Events (3)
```
app/Events/
  ├── ChatMessageSent.php
  ├── ChatRoomClosed.php
  └── NotificationCreated.php
```

### Services (1)
```
app/Services/
  └── NotificationService.php
```

### Middleware (1)
```
app/Http/Middleware/
  └── SetLocale.php
```

### Helpers (1)
```
app/Helpers/
  └── LocaleHelper.php
```

### Configurations (1)
```
config/
  └── locale.php
```

### Translations (2)
```
resources/lang/
  ├── vi/messages.php        (Vietnamese)
  └── en/messages.php        (English)
```

### Views (7)
```
resources/views/customers/
  ├── comparison/
  │   └── index.blade.php
  ├── chat/
  │   └── widget.blade.php
  ├── notifications/
  │   └── index.blade.php
  └── components/
      ├── language-switcher.blade.php
      ├── chat-widget.blade.php
      ├── notifications-widget.blade.php
      └── comparison-button.blade.php
```

### Migrations (3)
```
database/migrations/
  ├── 2026_03_18_000001_create_chat_rooms_table.php
  ├── 2026_03_18_000002_create_chat_messages_table.php
  └── 2026_03_18_000003_create_notifications_table.php
```

### Routes (Updated)
All routes are protected with `auth:customer` middleware and grouped by prefix:
- `/so-sanh/*` - Product Comparison
- `/tro-giup/*` - Chat Support
- `/thong-bao/*` - Notifications
- `/lang/{locale}` - Language Switcher

---

## 💡 Usage Examples

### 1. Using Translations
```blade
<!-- In blade templates -->
{{ __('messages.nav.home') }}

@if(is_locale('vi'))
    <p>Đây là nội dung tiếng Việt</p>
@endif

@foreach(get_available_locales() as $code => $locale)
    <a href="{{ route('language.switch', $code) }}">
        {{ $locale['flag'] }} {{ $locale['name'] }}
    </a>
@endforeach
```

### 2. Product Comparison Button
```blade
<!-- On product cards -->
@include('customers.components.comparison-button', ['product' => $product])

<!-- Or use standalone button -->
<button onclick="addToComparison('{{ $product->_id }}', '{{ $product->name }}')">
    Add to Compare
</button>
```

### 3. Creating Notifications
```php
use App\Services\NotificationService;

// When placing order
NotificationService::orderPlaced($customer, $order);

// When confirming order
NotificationService::orderConfirmed($customer, $order);

// When shipping
NotificationService::orderShipped($customer, $order);

// When delivered
NotificationService::orderDelivered($customer, $order);

// When cancelled
NotificationService::orderCancelled($customer, $order);

// When payment confirmed
NotificationService::paymentConfirmed($customer, $order);
```

### 4. Floating Widgets (Auto Included)
The chat and notifications widgets are already included in the master layout:
```blade
<!-- In Customers/Layouts/master.blade.php -->
@include('customers.components.chat-widget')
@include('customers.components.notifications-widget')
```

They show:
- **Chat Widget**: Floating button in bottom-right corner
- **Notifications Widget**: Floating bell icon in top-right corner
- Both only visible to authenticated customers

### 5. Language Switcher
The language switcher is in the navbar dropdown:
```blade
<!-- In Customers/Layouts/navbar.blade.php -->
@include('customers.components.language-switcher')
```

Allows switching between Vietnamese (🇻🇳) and English (🇬🇧).

---

## 🗄️ Database Schema

### chat_rooms
```
{
  _id: ObjectId,
  customer_id: ObjectId,      // Reference to Customer
  assigned_user_id: ObjectId, // Reference to User (support agent)
  status: String,             // 'open', 'closed', 'waiting'
  subject: String,
  last_message_at: Date,
  created_at: Date,
  updated_at: Date
}
```

### chat_messages
```
{
  _id: ObjectId,
  chat_room_id: ObjectId,    // Reference to ChatRoom
  sender_type: String,        // 'customer' or 'support'
  sender_id: ObjectId,
  sender_name: String,
  message: String,
  is_read: Boolean,
  created_at: Date,
  updated_at: Date
}
```

### notifications
```
{
  _id: ObjectId,
  customer_id: ObjectId,     // Reference to Customer
  order_id: ObjectId,        // Reference to Order (optional)
  type: String,              // 'order_placed', 'order_confirmed', etc.
  title: String,
  message: String,
  icon: String,
  is_read: Boolean,
  action_url: String,        // URL to navigate to
  created_at: Date,
  updated_at: Date
}
```

---

## 🔔 Notification Types

| Type | Title | Message | Icon |
|------|-------|---------|------|
| `order_placed` | Order #CODE created | Total: XXX₫ | 📦 |
| `order_confirmed` | Order #CODE confirmed | Waiting for shipment | ✅ |
| `order_shipped` | Order #CODE shipped | On the way | 🚚 |
| `order_delivered` | Order #CODE delivered | Thank you! | 📪 |
| `order_cancelled` | Order #CODE cancelled | Items returned to stock | ❌ |
| `payment_confirmed` | Payment confirmed | Processing order | 💳 |

---

## 🔄 Product Comparison

### Features
- Compare up to 5 products maximum
- Session-based storage (persistent across requests)
- Automatic cleanup when session expires
- AJAX add/remove without page reload
- Shows all product specs, price, brand, stock, ratings

### Data Stored Per Product
```
Size: Small (URL + quantity, ~100 bytes)
Location: Server-side session
Scope: Per user per browser
TTL: 2 hours (default session timeout)
Auto-cleanup: Yes (when session expires)
```

---

## 💬 Chat Support

### Features
- Real-time chat with support agents
- Message history stored in DB
- Unread message tracking
- Auto-polling every 3 seconds
- Status: 'waiting', 'open', 'closed'

### Flow
1. Customer clicks chat button
2. Automatically creates chat room
3. Customer can send messages
4. Messages are saved and broadcast
5. Support agent receives in admin panel (future feature)
6. Customer receives replies in real-time

### Database Relationships
```
Customer → ChatRoom (1:1 active)
ChatRoom ← ChatMessages (1:N)
```

---

## 🌍 Multi-Language Support

### Available Languages
- **vi** - Tiếng Việt (Default)
- **en** - English

### Configuration
Located in `config/locale.php`:
```php
'locales' => [
    'vi' => [
        'name' => 'Tiếng Việt',
        'flag' => '🇻🇳',
    ],
    'en' => [
        'name' => 'English',
        'flag' => '🇬🇧',
    ],
]
```

### How It Works
1. Middleware `SetLocale` checks URL parameter `?lang=en`
2. If not set, uses session value
3. If not in session, uses default locale
4. All translations use `__('messages.key')`
5. Helper functions work anywhere

### Helper Functions
```php
// Get current locale
get_current_locale()        // Returns 'vi' or 'en'

// Check current locale
is_locale('vi')             // Returns boolean

// Get locale display info
locale_name('en')           // Returns 'English'
locale_flag('en')           // Returns '🇬🇧'

// Get all available locales
get_available_locales()     // Returns config array
```

---

## ⚙️ Advanced Configuration

### Broadcasting (Optional - For Real-Time)
#### Using Laravel WebSockets
```bash
composer require beyondcode/laravel-websockets
php artisan websockets:serve
```

#### Using Pusher
```env
BROADCAST_DRIVER=pusher
PUSHER_APP_ID=xxx
PUSHER_APP_KEY=xxx
PUSHER_APP_SECRET=xxx
PUSHER_APP_CLUSTER=mt1
```

#### Enable Echo (Client-Side)
```bash
npm install laravel-echo pusher-js
```

```javascript
// In resources/js/bootstrap.js
import Echo from 'laravel-echo';
window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true,
});
```

### Polling vs Real-Time
- **Current**: Uses polling (AJAX every 3-5 seconds)
- **With Broadcasting**: Real-time updates via WebSocket
- **Polling advantages**: No extra infrastructure needed
- **Broadcasting advantages**: Instant updates, less server load

---

## 🧪 Testing

### Test Language Switching
```bash
# Command line
php artisan tinker
>>> session()->put('locale', 'en')
>>> app()->setLocale('en')
>>> __('messages.nav.home')
=> "Home"
```

### Test Product Comparison
1. Go to any product page
2. Click "Add to Compare"
3. Go to `/so-sanh` to view comparison
4. Add more products (max 5)
5. Clear comparison

### Test Chat
1. Login as customer
2. Click chat icon
3. Send message
4. Message should appear
5. Check DB for stored messages

### Test Notifications
1. Login as customer
2. Go to `/thong-bao`
3. Should see notifications
4. Bell icon shows unread count

---

## 🔐 Security Notes

### Authorization
All features are protected with `auth:customer` middleware:
- Customers can only see their own chat rooms
- Customers can only see their own notifications
- Only correct owner can perform actions

### Validation
- Message length limited to 1000 chars
- Product comparison limited to 5 items
- Notification cleanup by customer only

### Data Protection
- MongoDB proper indexing on relationships
- No direct ID exposure in URLs
- CSRF protection on all POST/DELETE requests

---

## 📊 Performance Tips

### Optimize Queries
```php
// Use eager loading for relationships
ChatRoom::with('messages', 'customer')->get();

// Limit results
Notification::where('customer_id', $id)->limit(10)->get();
```

### Index MongoDB Collections
```javascript
db.chat_rooms.createIndex({ "customer_id": 1 });
db.chat_messages.createIndex({ "chat_room_id": 1 });
db.notifications.createIndex({ "customer_id": 1, "is_read": 1 });
```

### Cache Notifications Count
Consider caching unread count to reduce queries.

---

## 📋 Troubleshooting

| Issue | Cause | Solution |
|-------|-------|----------|
| Language not switching | Browser cache | Clear cache, try incognito mode |
| Chat not working | Migration not run | Run `php artisan migrate` |
| Notifications not showing | NotificationService not called | Check order creation code |
| Widgets not visible | Components not included | Check master.blade.php |
| Database error | Collections not created | Run migration again |

---

## 🔜 Future Enhancements

1. **Admin Panel** (Filament)
   - ChatRoom Resource to manage conversations
   - Notification Resource to view all notifications
   - Dashboard widget for pending chats

2. **Advanced Chat**
   - File attachments
   - Typing indicators
   - Chat departments/routing
   - Canned responses

3. **Analytics**
   - Notification delivery tracking
   - Chat satisfaction rating
   - Comparison data insights

4. **Mobile Optimization**
   - Mobile app push notifications
   - Native chat interface
   - Comparison share functionality

---

## 📞 Support

For issues or questions:
1. Check logs: `storage/logs/laravel.log`
2. Test in tinker: `php artisan tinker`
3. Verify MongoDB connection: `DB::connection('mongodb')->getPdo()`
4. Check routes: `php artisan route:list`

---

**Version**: 2.0  
**Last Updated**: 18/03/2026  
**Framework**: Laravel 12 + MongoDB  
**Author**: FlashTech Development Team
