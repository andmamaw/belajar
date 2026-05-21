<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p style="font-size: 13px; color: #64748b; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase;">
                    Education Management
                </p>
                <h2 class="mt-1 text-xl font-semibold leading-tight text-gray-900">
                    Tambah Education
                </h2>
            </div>

            <a href="{{ route('admin.educations.index') }}" class="admin-btn-secondary">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="admin-page-bg">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h3 class="admin-card-title">Informasi Education</h3>
                    <p class="admin-card-subtitle">
                        Isi data pendidikan yang akan tampil di section Education pada portfolio.
                    </p>
                </div>

                <form action="{{ route('admin.educations.store') }}" method="POST" class="admin-form">
                    @csrf

                    <div class="admin-form-grid">
                        <div class="admin-form-group">
                            <label>Sekolah / Universitas</label>
                            <input type="text" name="school_name" value="{{ old('school_name') }}" class="admin-input" placeholder="Contoh: Universitas Pendidikan Indonesia">
                        </div>

                        <div class="admin-form-group">
                            <label>Jurusan</label>
                            <input type="text" name="major" value="{{ old('major') }}" class="admin-input" placeholder="Contoh: S1 Sistem Telekomunikasi">
                        </div>

                        <div class="admin-form-group">
                            <label>Period</label>
                            <input type="text" name="period" value="{{ old('period') }}" class="admin-input" placeholder="Contoh: 2020 - 2024">
                        </div>

                        <div class="admin-form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" class="admin-textarea" placeholder="Tuliskan deskripsi pendidikan">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="admin-actions">
                        <button type="submit" class="admin-btn-primary">
                            Simpan Education
                        </button>

                        <a href="{{ route('admin.educations.index') }}" class="admin-btn-secondary">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>