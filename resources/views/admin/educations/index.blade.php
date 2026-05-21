<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p style="font-size: 13px; color: #64748b; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase;">
                    Admin Content
                </p>
                <h2 class="mt-1 text-xl font-semibold leading-tight text-gray-900">
                    Kelola Education
                </h2>
            </div>

            <a href="{{ url('/') }}" target="_blank" class="admin-btn-secondary">
                Lihat Website
            </a>
        </div>
    </x-slot>

    <div class="admin-list-page">
        <div class="admin-list-shell">

            <div class="admin-list-hero">
                <div class="admin-list-hero-content">
                    <div>
                        <p class="admin-list-eyebrow">Education Management</p>
                        <h1 class="admin-list-title">Daftar Pendidikan</h1>
                        <p class="admin-list-description">
                            Kelola data pendidikan yang tampil pada section Education di halaman portfolio publik.
                        </p>
                    </div>

                    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                        <a href="{{ route('admin.educations.create') }}" style="background: white; color: #0f172a; padding: 12px 18px; border-radius: 999px; text-decoration: none; font-weight: 900; font-size: 14px;">
                            + Tambah Education
                        </a>

                        <a href="{{ route('dashboard') }}" style="background: rgba(255,255,255,0.14); color: white; padding: 12px 18px; border-radius: 999px; text-decoration: none; font-weight: 800; font-size: 14px; border: 1px solid rgba(255,255,255,0.22);">
                            Dashboard
                        </a>
                    </div>
                </div>
            </div>

            <div class="admin-list-toolbar">
                <div>
                    <p style="font-size: 14px; color: #64748b;">
                        Total Education:
                        <span style="font-weight: 900; color: #0f172a;">
                            {{ $educations->count() }}
                        </span>
                    </p>
                </div>
            </div>

            <div class="admin-list-card">
                <div class="admin-hybrid-row admin-hybrid-head" style="grid-template-columns: 1.4fr 1.2fr 1fr 1.8fr 140px;">
                    <div>Sekolah / Universitas</div>
                    <div>Jurusan</div>
                    <div>Period</div>
                    <div>Deskripsi</div>
                    <div style="text-align: right;">Aksi</div>
                </div>

                @forelse ($educations as $education)
                    <div class="admin-hybrid-row" style="grid-template-columns: 1.4fr 1.2fr 1fr 1.8fr 140px;">
                        <div>
                            <p class="admin-hybrid-title">
                                {{ $education->school_name }}
                            </p>
                        </div>

                        <div>
                            <p class="admin-hybrid-text">
                                {{ $education->major }}
                            </p>
                        </div>

                        <div>
                            <span class="admin-badge">
                                {{ $education->period }}
                            </span>
                        </div>

                        <div>
                            <p class="admin-hybrid-text">
                                {{ \Illuminate\Support\Str::limit($education->description, 120) }}
                            </p>
                        </div>

                        <div class="admin-hybrid-actions">
                            <a href="{{ route('admin.educations.edit', $education) }}" class="admin-action-link">
                                Edit
                            </a>

                            <form action="{{ route('admin.educations.destroy', $education) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus education ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="admin-action-danger">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="admin-empty-state">
                        Belum ada education. Klik tombol <strong>Tambah Education</strong> untuk membuat data pertama.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>