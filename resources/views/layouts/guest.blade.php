<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'MAMAW') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=10">
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}?v=10">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/admin-theme.css') }}">
</head>

<body style="font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;">
    <div style="
        min-height: 100vh;
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        background:
            radial-gradient(circle at top left, rgba(37,99,235,0.24), transparent 34%),
            radial-gradient(circle at bottom right, rgba(56,189,248,0.2), transparent 30%),
            linear-gradient(135deg, #f8fafc 0%, #eef2ff 100%);
    ">
        <div style="
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px;
            background: linear-gradient(135deg, #0f172a, #111827 55%, #1d4ed8);
            color: white;
            position: relative;
            overflow: hidden;
        ">
            <div style="position: absolute; width: 260px; height: 260px; border-radius: 999px; background: rgba(56,189,248,0.18); top: -90px; right: -80px;"></div>
            <div style="position: absolute; width: 200px; height: 200px; border-radius: 999px; background: rgba(37,99,235,0.2); bottom: -80px; left: 80px;"></div>

            <div style="position: relative; z-index: 2; max-width: 560px;">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 72px; width: auto; margin-bottom: 34px; filter: drop-shadow(0 16px 24px rgba(0,0,0,0.25));">

                <p style="font-size: 13px; color: #bfdbfe; font-weight: 800; letter-spacing: 0.16em; text-transform: uppercase;">
                    Portfolio Admin System
                </p>

                <h1 style="margin-top: 14px; font-size: 46px; line-height: 1.08; font-weight: 900;">
                    Kelola portfolio kamu dari satu dashboard.
                </h1>

                <p style="margin-top: 18px; color: #cbd5e1; font-size: 15px; line-height: 1.8;">
                    Update profile, project, services, pengalaman kerja, dan pendidikan tanpa perlu menyentuh Supabase secara manual.
                </p>

                <div style="margin-top: 30px; display: grid; gap: 12px;">
                    <div style="background: rgba(255,255,255,0.10); border: 1px solid rgba(255,255,255,0.16); padding: 14px 16px; border-radius: 18px;">
                        <strong>Full-stack Laravel</strong>
                        <p style="margin-top: 4px; color: #cbd5e1; font-size: 13px;">Admin panel terhubung ke database Supabase.</p>
                    </div>

                    <div style="background: rgba(255,255,255,0.10); border: 1px solid rgba(255,255,255,0.16); padding: 14px 16px; border-radius: 18px;">
                        <strong>Modern Portfolio</strong>
                        <p style="margin-top: 4px; color: #cbd5e1; font-size: 13px;">Konten website bisa dikelola langsung dari dashboard.</p>
                    </div>
                </div>
            </div>
        </div>

        <div style="display: flex; align-items: center; justify-content: center; padding: 40px;">
            <div style="width: 100%; max-width: 440px;">
                <div style="text-align: center; margin-bottom: 28px;">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 54px; width: auto; margin: 0 auto 14px;">
                    <h2 style="font-size: 26px; font-weight: 900; color: #0f172a;">Admin Access</h2>
                    <p style="margin-top: 8px; color: #64748b; font-size: 14px;">Masuk untuk mengelola isi website portfolio.</p>
                </div>

                <div style="
                    background: rgba(255,255,255,0.92);
                    border: 1px solid rgba(219,234,254,0.95);
                    border-radius: 26px;
                    padding: 28px;
                    box-shadow: 0 24px 70px rgba(15,23,42,0.12);
                ">
                    {{ $slot }}
                </div>

                <p style="text-align: center; margin-top: 20px; color: #94a3b8; font-size: 12px;">
                    © {{ date('Y') }} {{ config('app.name', 'MAMAW') }}. Admin Portfolio System.
                </p>
            </div>
        </div>
    </div>

    <style>
        @media (max-width: 900px) {
            body > div {
                grid-template-columns: 1fr !important;
            }

            body > div > div:first-child {
                display: none !important;
            }

            body > div > div:last-child {
                min-height: 100vh;
                padding: 24px !important;
            }
        }
    </style>
</body>
</html>