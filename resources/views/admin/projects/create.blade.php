<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p style="font-size: 13px; color: #64748b; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase;">
                    Project Management
                </p>
                <h2 class="mt-1 text-xl font-semibold leading-tight text-gray-900">
                    Tambah Project
                </h2>
            </div>

            <a href="{{ route('admin.projects.index') }}" class="admin-btn-secondary">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="admin-page-bg">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h3 class="admin-card-title">Informasi Project</h3>
                    <p class="admin-card-subtitle">
                        Isi data project yang akan tampil di halaman portfolio publik.
                    </p>
                </div>

                <form action="{{ route('admin.projects.store') }}" method="POST" class="admin-form">
                    @csrf

                    <div class="admin-form-grid">
                        <div class="admin-form-group">
                            <label>Judul Project</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="admin-input" placeholder="Contoh: AmalySystem">
                        </div>

                        <div class="admin-form-group">
                            <label>Kategori</label>
                            <input type="text" name="category" value="{{ old('category') }}" class="admin-input" placeholder="Contoh: Web Application">
                        </div>

                        <div class="admin-form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" class="admin-textarea" placeholder="Tuliskan penjelasan singkat mengenai project ini">{{ old('description') }}</textarea>
                        </div>

                        <div class="admin-form-group">
                            <label>URL Gambar</label>
                            <input type="text" name="image" value="{{ old('image') }}" class="admin-input" placeholder="https://...">
                        </div>

                        <div class="admin-form-group">
                            <label>Tech Stack</label>
                            <input type="text" name="tech_stack" value="{{ old('tech_stack') }}" class="admin-input" placeholder="Contoh: Laravel, Supabase, Tailwind">
                        </div>

                        <div class="admin-form-group">
                            <label>Link Project</label>
                            <input type="text" name="project_link" value="{{ old('project_link') }}" class="admin-input" placeholder="https://domainproject.com">
                        </div>

                        <div class="admin-form-group">
                            <label>Urutan</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="admin-input" placeholder="1">
                        </div>
                    </div>

                    <div class="admin-actions">
                        <button type="submit" class="admin-btn-primary">
                            Simpan Project
                        </button>

                        <a href="{{ route('admin.projects.index') }}" class="admin-btn-secondary">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>