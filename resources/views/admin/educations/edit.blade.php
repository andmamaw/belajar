<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p style="font-size: 13px; color: #64748b; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase;">
                    Education Management
                </p>
                <h2 class="mt-1 text-xl font-semibold leading-tight text-gray-900">
                    Edit Education
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
                    <h3 class="admin-card-title">{{ $education->school_name }}</h3>
                    <p class="admin-card-subtitle">
                        Perbarui data pendidikan. Perubahan akan langsung tampil di website portfolio.
                    </p>
                </div>

                <form action="{{ route('admin.educations.update', $education) }}" method="POST" class="admin-form">
                    @csrf
                    @method('PUT')

                    <div class="admin-form-grid">
                        <div class="admin-form-group">
                            <label>Sekolah / Universitas</label>
                            <input type="text" name="school_name" value="{{ old('school_name', $education->school_name) }}" class="admin-input">
                        </div>

                        <div class="admin-form-group">
                            <label>Jurusan</label>
                            <input type="text" name="major" value="{{ old('major', $education->major) }}" class="admin-input">
                        </div>

                        <div class="admin-form-group">
                            <label>Period</label>
                            <input type="text" name="period" value="{{ old('period', $education->period) }}" class="admin-input">
                        </div>

                        <div class="admin-form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" class="admin-textarea">{{ old('description', $education->description) }}</textarea>
                        </div>
                    </div>

                    <div class="admin-actions">
                        <button type="submit" class="admin-btn-primary">
                            Update Education
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