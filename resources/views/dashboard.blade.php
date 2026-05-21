<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p style="font-size: 13px; color: #64748b; font-weight: 600; letter-spacing: 0.12em; text-transform: uppercase;">
                    Admin Panel
                </p>
                <h2 class="mt-1 text-xl font-semibold leading-tight text-gray-900">
                    Dashboard Portfolio
                </h2>
            </div>

            <a href="{{ url('/') }}" target="_blank" style="background: #111827; color: white; padding: 10px 18px; border-radius: 999px; text-decoration: none; font-weight: 700; font-size: 14px;">
                Lihat Website
            </a>
        </div>
    </x-slot>

    <div style="min-height: calc(100vh - 80px); background: radial-gradient(circle at top left, rgba(99,102,241,0.22), transparent 32%), radial-gradient(circle at top right, rgba(14,165,233,0.18), transparent 28%), #f3f4f6; padding: 32px 0;">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div style="position: relative; overflow: hidden; border-radius: 28px; background: linear-gradient(135deg, #0f172a, #111827 55%, #1e1b4b); padding: 34px; color: white; box-shadow: 0 25px 70px rgba(15,23,42,0.28);">
                <div style="position: absolute; width: 220px; height: 220px; border-radius: 999px; background: rgba(99,102,241,0.28); top: -80px; right: -60px; filter: blur(4px);"></div>
                <div style="position: absolute; width: 160px; height: 160px; border-radius: 999px; background: rgba(14,165,233,0.2); bottom: -70px; left: 160px; filter: blur(6px);"></div>

                <div style="position: relative; z-index: 2; display: grid; gap: 24px; grid-template-columns: 1.3fr 0.7fr; align-items: center;">
                    <div>
                        <p style="font-size: 13px; letter-spacing: 0.16em; text-transform: uppercase; color: #a5b4fc; font-weight: 700;">
                            Welcome Back
                        </p>

                        <h1 style="font-size: 40px; line-height: 1.1; font-weight: 800; margin-top: 12px;">
                            Halo, {{ Auth::user()->name }}
                        </h1>

                        <p style="margin-top: 14px; max-width: 620px; color: #cbd5e1; line-height: 1.8; font-size: 15px;">
                            Kelola seluruh konten portfolio kamu dari satu dashboard: profile, project, services, pengalaman, dan pendidikan.
                        </p>

                        <div style="margin-top: 24px; display: flex; flex-wrap: wrap; gap: 12px;">
                            <a href="{{ route('admin.profile.edit') }}" style="background: white; color: #111827; padding: 11px 18px; border-radius: 999px; text-decoration: none; font-weight: 800; font-size: 14px;">
                                Kelola Profile
                            </a>

                            <a href="{{ route('admin.projects.create') }}" style="background: rgba(255,255,255,0.12); color: white; padding: 11px 18px; border-radius: 999px; text-decoration: none; font-weight: 700; font-size: 14px; border: 1px solid rgba(255,255,255,0.18);">
                                Tambah Project
                            </a>
                        </div>
                    </div>

                    <div style="height: 220px; display: flex; align-items: center; justify-content: center;">
                        <div class="admin-animated-logo-card" style="width: 170px; height: 170px; border-radius: 34px; background: linear-gradient(135deg, rgba(255,255,255,0.22), rgba(255,255,255,0.06)); border: 1px solid rgba(255,255,255,0.24); box-shadow: 0 30px 60px rgba(0,0,0,0.28); transform: rotate(-8deg); display: flex; align-items: center; justify-content: center;">
                            <img src="{{ asset('images/abc5aab3-3b27-438a-a6b9-2adcc2a6cb9b.jpeg') }}" alt="Logo" style="width: 90px; height: auto; filter: drop-shadow(0 12px 18px rgba(0,0,0,0.35));">
                        </div>
                    </div>
                </div>
            </div>

            <div style="margin-top: 26px; display: grid; gap: 18px; grid-template-columns: repeat(4, minmax(0, 1fr));">
                <a href="{{ route('admin.projects.index') }}" style="display: block; background: rgba(255,255,255,0.86); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.8); border-radius: 22px; padding: 22px; text-decoration: none; color: #111827; box-shadow: 0 18px 40px rgba(15,23,42,0.08);">
                    <p style="font-size: 13px; color: #64748b; font-weight: 700;">Total Project</p>
                    <p style="margin-top: 12px; font-size: 38px; font-weight: 900;">{{ $totalProjects }}</p>
                    <p style="margin-top: 10px; color: #4f46e5; font-size: 14px; font-weight: 700;">Kelola →</p>
                </a>

                <a href="{{ route('admin.services.index') }}" style="display: block; background: rgba(255,255,255,0.86); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.8); border-radius: 22px; padding: 22px; text-decoration: none; color: #111827; box-shadow: 0 18px 40px rgba(15,23,42,0.08);">
                    <p style="font-size: 13px; color: #64748b; font-weight: 700;">Total Services</p>
                    <p style="margin-top: 12px; font-size: 38px; font-weight: 900;">{{ $totalServices }}</p>
                    <p style="margin-top: 10px; color: #4f46e5; font-size: 14px; font-weight: 700;">Kelola →</p>
                </a>

                <a href="{{ route('admin.experiences.index') }}" style="display: block; background: rgba(255,255,255,0.86); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.8); border-radius: 22px; padding: 22px; text-decoration: none; color: #111827; box-shadow: 0 18px 40px rgba(15,23,42,0.08);">
                    <p style="font-size: 13px; color: #64748b; font-weight: 700;">Total Experience</p>
                    <p style="margin-top: 12px; font-size: 38px; font-weight: 900;">{{ $totalExperiences }}</p>
                    <p style="margin-top: 10px; color: #4f46e5; font-size: 14px; font-weight: 700;">Kelola →</p>
                </a>

                <a href="{{ route('admin.educations.index') }}" style="display: block; background: rgba(255,255,255,0.86); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.8); border-radius: 22px; padding: 22px; text-decoration: none; color: #111827; box-shadow: 0 18px 40px rgba(15,23,42,0.08);">
                    <p style="font-size: 13px; color: #64748b; font-weight: 700;">Total Education</p>
                    <p style="margin-top: 12px; font-size: 38px; font-weight: 900;">{{ $totalEducations }}</p>
                    <p style="margin-top: 10px; color: #4f46e5; font-size: 14px; font-weight: 700;">Kelola →</p>
                </a>
            </div>

            <div style="margin-top: 26px; display: grid; gap: 18px; grid-template-columns: 1fr 1fr;">
                <div style="background: white; border-radius: 22px; padding: 24px; box-shadow: 0 18px 40px rgba(15,23,42,0.08);">
                    <h3 style="font-size: 18px; font-weight: 800; color: #111827;">
                        Menu Cepat
                    </h3>

                    <div style="margin-top: 18px; display: flex; flex-wrap: wrap; gap: 12px;">
                        <a href="{{ route('admin.projects.create') }}" style="background: #111827; color: white; padding: 10px 16px; border-radius: 10px; text-decoration: none; font-weight: 700; font-size: 14px;">Tambah Project</a>
                        <a href="{{ route('admin.services.create') }}" style="background: #111827; color: white; padding: 10px 16px; border-radius: 10px; text-decoration: none; font-weight: 700; font-size: 14px;">Tambah Service</a>
                        <a href="{{ route('admin.experiences.create') }}" style="background: #111827; color: white; padding: 10px 16px; border-radius: 10px; text-decoration: none; font-weight: 700; font-size: 14px;">Tambah Experience</a>
                        <a href="{{ route('admin.educations.create') }}" style="background: #111827; color: white; padding: 10px 16px; border-radius: 10px; text-decoration: none; font-weight: 700; font-size: 14px;">Tambah Education</a>
                    </div>
                </div>

                <div style="background: white; border-radius: 22px; padding: 24px; box-shadow: 0 18px 40px rgba(15,23,42,0.08);">
                    <h3 style="font-size: 18px; font-weight: 800; color: #111827;">
                        Activity Login
                    </h3>

                    <p style="margin-top: 10px; color: #64748b; font-size: 14px;">
                        Ringkasan aktivitas login akun admin.
                    </p>

                    <div style="margin-top: 18px; display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
                        <div style="background: #f8fafc; border-radius: 16px; padding: 16px;">
                            <p style="font-size: 13px; color: #64748b;">Total Login</p>
                            <p style="margin-top: 4px; font-size: 28px; font-weight: 900; color: #111827;">
                                {{ $loginCount }}
                            </p>
                        </div>

                        <div style="background: #f8fafc; border-radius: 16px; padding: 16px;">
                            <p style="font-size: 13px; color: #64748b;">Login Terakhir</p>
                            <p style="margin-top: 8px; font-size: 14px; font-weight: 800; color: #111827;">
                                {{ $lastLoginAt ? \Carbon\Carbon::parse($lastLoginAt)->format('d M Y, H:i') : '-' }}
                            </p>
                        </div>
                    </div>

                    <div style="margin-top: 18px;">
                        <p style="font-size: 13px; color: #64748b; font-weight: 700; margin-bottom: 10px;">
                            Riwayat Login Terbaru
                        </p>

                        <div style="display: flex; flex-direction: column; gap: 10px;">
                            @forelse ($loginActivities as $activity)
                                <div style="background: #f8fafc; border-radius: 14px; padding: 12px 14px;">
                                    <p style="font-size: 13px; font-weight: 800; color: #111827;">
                                        {{ $activity->logged_in_at ? \Carbon\Carbon::parse($activity->logged_in_at)->format('d M Y, H:i') : '-' }}
                                    </p>

                                    <p style="margin-top: 4px; font-size: 12px; color: #64748b;">
                                        IP: {{ $activity->ip_address ?? '-' }}
                                    </p>
                                </div>
                            @empty
                                <div style="background: #f8fafc; border-radius: 14px; padding: 12px 14px;">
                                    <p style="font-size: 13px; color: #64748b;">
                                        Belum ada riwayat login.
                                    </p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>