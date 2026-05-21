<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Admin Mamaw') }}</title>

        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=10">
        <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}?v=10">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/admin-theme.css') }}">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <!-- Page Content -->
<main>
    @if (session('success'))
    <div 
        id="success-popup"
        style="
            position: fixed;
            top: 32px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
            background: #16a34a;
            color: white;
            padding: 14px 22px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 10px 25px rgba(0,0,0,0.18);
            min-width: 280px;
            max-width: 420px;
            text-align: center;
        "
    >
        {{ session('success') }}
    </div>

    <script>
        setTimeout(function () {
            const popup = document.getElementById('success-popup');
            if (popup) {
                popup.style.opacity = '0';
                popup.style.transform = 'translateX(-50%) translateY(-10px)';
                popup.style.transition = 'all 0.3s ease';
                setTimeout(() => popup.remove(), 300);
            }
        }, 2500);
    </script>
@endif

@if (session('error'))
    <div 
        id="error-popup"
        style="
            position: fixed;
            top: 24px;
            right: 24px;
            z-index: 9999;
            background: #dc2626;
            color: white;
            padding: 14px 20px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 10px 25px rgba(0,0,0,0.18);
            min-width: 260px;
            max-width: 360px;
        "
    >
        {{ session('error') }}
    </div>

    <script>
        setTimeout(function () {
            const popup = document.getElementById('error-popup');
            if (popup) {
                popup.style.opacity = '0';
                popup.style.transform = 'translateY(-10px)';
                popup.style.transition = 'all 0.3s ease';
                setTimeout(() => popup.remove(), 300);
            }
        }, 2500);
    </script>
@endif  

@if ($errors->any())
    <div 
        id="validation-popup"
        style="
            position: fixed;
            top: 32px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
            background: #dc2626;
            color: white;
            padding: 14px 22px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 10px 25px rgba(0,0,0,0.18);
            min-width: 280px;
            max-width: 460px;
            text-align: center;
        "
    >
        <div style="margin-bottom: 6px;">
            Data gagal disimpan.
        </div>

        <ul style="margin: 0; padding: 0; list-style: none; font-weight: 400;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    <script>
        setTimeout(function () {
            const popup = document.getElementById('validation-popup');
            if (popup) {
                popup.style.opacity = '0';
                popup.style.transform = 'translateX(-50%) translateY(-10px)';
                popup.style.transition = 'all 0.3s ease';
                setTimeout(() => popup.remove(), 300);
            }
        }, 3500);
    </script>
@endif
    {{ $slot }}
</main>
        </div>

        <!-- Session warning + auto-logout -->
        <script>
        let sessionWarningShown = false;

        const warningTime = 301 * 60 * 1000;
        const logoutTime = 300 * 60 * 1000;

        setTimeout(function () {
            sessionWarningShown = true;

            const warningBox = document.createElement('div');
            warningBox.id = 'session-warning-popup';
            warningBox.innerHTML = `
                <div style="
                    position: fixed;
                    top: 32px;
                    left: 50%;
                    transform: translateX(-50%);
                    z-index: 99999;
                    background: #0f172a;
                    color: white;
                    padding: 18px 22px;
                    border-radius: 16px;
                    box-shadow: 0 18px 45px rgba(15, 23, 42, 0.28);
                    max-width: 440px;
                    width: calc(100% - 32px);
                    text-align: center;
                    border: 1px solid rgba(255,255,255,0.15);
                ">
                    <div style="font-size: 15px; font-weight: 900;">
                        Session hampir habis
                    </div>

                    <div style="margin-top: 8px; font-size: 13px; color: #cbd5e1; line-height: 1.6;">
                        Kamu tidak aktif cukup lama. Session akan habis sekitar 5 menit lagi. Klik tombol di bawah untuk tetap aktif.
                    </div>

                    <button onclick="location.reload()" style="
                        margin-top: 14px;
                        background: #0ea5e9;
                        color: white;
                        border: none;
                        border-radius: 999px;
                        padding: 10px 18px;
                        font-size: 13px;
                        font-weight: 800;
                        cursor: pointer;
                    ">
                        Tetap Login
                    </button>
                </div>
            `;

            document.body.appendChild(warningBox);
        }, warningTime);

        setTimeout(function () {
            window.location.href = "{{ route('login') }}";
        }, logoutTime);
    </script>
    </body>
</html>
