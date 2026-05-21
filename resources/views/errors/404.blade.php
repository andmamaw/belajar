<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=10">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="margin: 0; font-family: Inter, ui-sans-serif, system-ui; background: radial-gradient(circle at top left, rgba(14,165,233,0.22), transparent 34%), linear-gradient(135deg, #f8fafc, #eef2ff);">
    <main style="min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 24px;">
        <div style="max-width: 560px; width: 100%; text-align: center; background: white; border-radius: 28px; padding: 42px 32px; box-shadow: 0 24px 70px rgba(15,23,42,0.12); border: 1px solid #dbeafe;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 68px; width: auto; margin: 0 auto 24px;">

            <p style="font-size: 14px; color: #0ea5e9; font-weight: 900; letter-spacing: 0.18em; text-transform: uppercase;">
                Error 404
            </p>

            <h1 style="margin-top: 12px; font-size: 38px; line-height: 1.1; font-weight: 900; color: #0f172a;">
                Halaman tidak ditemukan
            </h1>

            <p style="margin-top: 16px; color: #64748b; font-size: 15px; line-height: 1.8;">
                Link yang kamu buka mungkin salah, sudah dipindahkan, atau tidak tersedia.
            </p>

            <div style="margin-top: 28px; display: flex; justify-content: center; gap: 12px; flex-wrap: wrap;">
                <a href="{{ url('/') }}" style="background: #0ea5e9; color: white; padding: 12px 18px; border-radius: 999px; text-decoration: none; font-weight: 800;">
                    Kembali ke Website
                </a>

                <a href="{{ route('dashboard') }}" style="background: #e5e7eb; color: #0f172a; padding: 12px 18px; border-radius: 999px; text-decoration: none; font-weight: 800;">
                    Dashboard
                </a>
            </div>
        </div>
    </main>
</body>
</html>