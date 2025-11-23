<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | FlashTech Admin Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f1f5f9;
            min-height: 100vh;
            transition: background 0.3s ease, color 0.3s ease;
        }

        [data-theme="dark"] body {
            background: #0f1419;
            color: #e2e8f0;
        }

        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        .main-content {
            flex: 1;
            margin-left: 280px;
            transition: all 0.3s ease;
            background: #f1f5f9;
        }

        [data-theme="dark"] .main-content {
            background: #0f1419;
        }

        .content-wrapper {
            padding: 2rem;
            min-height: calc(100vh - 70px);
        }

        @media (max-width: 1024px) {
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        @include('Admins.Layouts.Sidebar')

        <div class="main-content justify-center">
            <div class="content-wrapper">
                @yield('content')
            </div>
        </div>
    </div>

    <script>
        // Load saved display mode on page load
        document.addEventListener('DOMContentLoaded', function() {
            const savedDisplayMode = localStorage.getItem('display_mode') || 'light';
            const html = document.documentElement;

            function applyDisplayMode(mode) {
                if (mode === 'system') {
                    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                    html.setAttribute('data-theme', prefersDark ? 'dark' : 'light');
                } else {
                    html.setAttribute('data-theme', mode);
                }
            }

            // Apply saved mode
            applyDisplayMode(savedDisplayMode);

            // Listen for system theme changes if mode is 'system'
            if (savedDisplayMode === 'system') {
                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
                    html.setAttribute('data-theme', e.matches ? 'dark' : 'light');
                });
            }

            // Listen for storage changes from other tabs/windows
            window.addEventListener('storage', (e) => {
                if (e.key === 'display_mode') {
                    applyDisplayMode(e.newValue);
                }
            });
        });
    </script>
</body>
</html>
