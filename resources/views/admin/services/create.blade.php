<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p style="font-size: 13px; color: #64748b; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase;">
                    Service Management
                </p>
                <h2 class="mt-1 text-xl font-semibold leading-tight text-gray-900">
                    Tambah Service
                </h2>
            </div>

            <a href="{{ route('admin.services.index') }}" class="admin-btn-secondary">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="admin-page-bg">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h3 class="admin-card-title">Informasi Service</h3>
                    <p class="admin-card-subtitle">
                        Isi layanan atau keahlian yang akan tampil di section Services pada portfolio.
                    </p>
                </div>

                <form action="{{ route('admin.services.store') }}" method="POST" class="admin-form">
                    @csrf

                    <div class="admin-form-grid">
                        <div class="admin-form-group">
                            <label>Judul Service</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="admin-input" placeholder="Contoh: Website Development">
                        </div>

                        <div class="admin-form-group">
                            <label>Icon</label>
                            <input type="text" name="icon" value="{{ old('icon') }}" class="admin-input" placeholder="Contoh: Web">
                        </div>

                        <div class="admin-form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" class="admin-textarea" placeholder="Tuliskan deskripsi layanan">{{ old('description') }}</textarea>
                        </div>

                        <div class="admin-form-group">
                            <label>Urutan</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', 0) }}" class="admin-input" placeholder="1">
                        </div>
                    </div>

                    <div class="admin-actions">
                        <button type="submit" class="admin-btn-primary">
                            Simpan Service
                        </button>

                        <a href="{{ route('admin.services.index') }}" class="admin-btn-secondary">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>