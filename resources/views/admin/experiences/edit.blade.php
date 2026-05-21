<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p style="font-size: 13px; color: #64748b; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase;">
                    Experience Management
                </p>
                <h2 class="mt-1 text-xl font-semibold leading-tight text-gray-900">
                    Edit Experience
                </h2>
            </div>

            <a href="{{ route('admin.experiences.index') }}" class="admin-btn-secondary">
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="admin-page-bg">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h3 class="admin-card-title">{{ $experience->position }}</h3>
                    <p class="admin-card-subtitle">
                        Perbarui data pengalaman kerja. Perubahan akan langsung tampil di website portfolio.
                    </p>
                </div>

                <form action="{{ route('admin.experiences.update', $experience) }}" method="POST" class="admin-form">
                    @csrf
                    @method('PUT')

                    <div class="admin-form-grid">
                        <div class="admin-form-group">
                            <label>Posisi</label>
                            <input type="text" name="position" value="{{ old('position', $experience->position) }}" class="admin-input">
                        </div>

                        <div class="admin-form-group">
                            <label>Company</label>
                            <input type="text" name="company" value="{{ old('company', $experience->company) }}" class="admin-input">
                        </div>

                        <div class="admin-form-group">
                            <label>Period</label>
                            <input type="text" name="period" value="{{ old('period', $experience->period) }}" class="admin-input">
                        </div>

                        <div class="admin-form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" class="admin-textarea">{{ old('description', $experience->description) }}</textarea>
                        </div>
                    </div>

                    <div class="admin-actions">
                        <button type="submit" class="admin-btn-primary">
                            Update Experience
                        </button>

                        <a href="{{ route('admin.experiences.index') }}" class="admin-btn-secondary">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>