<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p style="font-size: 13px; color: #64748b; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase;">
                    Admin Content
                </p>
                <h2 class="mt-1 text-xl font-semibold leading-tight text-gray-900">
                    Kelola Project
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
                        <p class="admin-list-eyebrow">Project Management</p>
                        <h1 class="admin-list-title">Daftar Project Portfolio</h1>
                        <p class="admin-list-description">
                            Kelola semua project yang tampil pada halaman portfolio publik. Kamu bisa menambah, mengedit, menghapus, dan mengatur urutan project dari halaman ini.
                        </p>
                    </div>

                    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                        <a href="{{ route('admin.projects.create') }}" style="background: white; color: #0f172a; padding: 12px 18px; border-radius: 999px; text-decoration: none; font-weight: 900; font-size: 14px;">
                            + Tambah Project
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
                        Total Project:
                        <span style="font-weight: 900; color: #0f172a;">
                            {{ $projects->count() }}
                        </span>
                    </p>
                </div>
            </div>

            <div class="admin-list-card">
                <div class="admin-hybrid-row admin-hybrid-head">
                    <div>Urutan</div>
                    <div>Project</div>
                    <div>Kategori</div>
                    <div>Tech Stack</div>
                    <div style="text-align: right;">Aksi</div>
                </div>

                @forelse ($projects as $project)
                    <div class="admin-hybrid-row">
                        <div>
                            <span class="admin-badge">
                                #{{ $project->sort_order }}
                            </span>
                        </div>

                        <div>
                            <p class="admin-hybrid-title">
                                {{ $project->title }}
                            </p>

                            <p class="admin-hybrid-subtitle">
                                {{ \Illuminate\Support\Str::limit($project->description, 90) }}
                            </p>
                        </div>

                        <div>
                            <p class="admin-hybrid-text">
                                {{ $project->category ?? '-' }}
                            </p>
                        </div>

                        <div>
                            <p class="admin-hybrid-text">
                                {{ $project->tech_stack ?? '-' }}
                            </p>

                            @if ($project->project_link)
                                <a href="{{ $project->project_link }}" target="_blank" class="admin-action-link" style="font-size: 12px;">
                                    Buka Link
                                </a>
                            @endif
                        </div>

                        <div class="admin-hybrid-actions">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="admin-action-link">
                                Edit
                            </a>

                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus project ini?')">
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
                        Belum ada project. Klik tombol <strong>Tambah Project</strong> untuk membuat data pertama.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>