<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p style="font-size: 13px; color: #64748b; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase;">
                    Profile Management
                </p>
                <h2 class="mt-1 text-xl font-semibold leading-tight text-gray-900">
                    Kelola Profile
                </h2>
            </div>

            <a href="{{ url('/') }}" target="_blank" class="admin-btn-secondary">
                Lihat Website
            </a>
        </div>
    </x-slot>

    <div class="admin-page-bg">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="admin-card">
                <div class="admin-card-header">
                    <h3 class="admin-card-title">
                        Informasi Utama Profile
                    </h3>
                    <p class="admin-card-subtitle">
                        Data ini akan tampil pada bagian hero, profile, dan contact di website portfolio.
                    </p>
                </div>

                <form action="{{ route('admin.profile.update') }}" method="POST" class="admin-form">
                    @csrf
                    @method('PUT')

                    <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr;">
                        <div class="admin-form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" name="full_name" value="{{ old('full_name', $profile->full_name ?? '') }}" class="admin-input" placeholder="Nama lengkap kamu">
                        </div>

                        <div class="admin-form-group">
                            <label>Headline</label>
                            <input type="text" name="headline" value="{{ old('headline', $profile->headline ?? '') }}" class="admin-input" placeholder="Contoh: Web Developer & Business System Builder">
                        </div>

                        <div class="admin-form-group" style="grid-column: 1 / -1;">
                            <label>Bio</label>
                            <textarea name="bio" class="admin-textarea" placeholder="Tuliskan deskripsi singkat tentang diri kamu">{{ old('bio', $profile->bio ?? '') }}</textarea>
                        </div>

                        <div class="admin-form-group">
                            <label>Pendidikan Singkat</label>
                            <input type="text" name="education" value="{{ old('education', $profile->education ?? '') }}" class="admin-input" placeholder="Contoh: S1 Sistem Telekomunikasi">
                        </div>

                        <div class="admin-form-group">
                            <label>Pekerjaan</label>
                            <input type="text" name="job_title" value="{{ old('job_title', $profile->job_title ?? '') }}" class="admin-input" placeholder="Contoh: Fullstack Developer">
                        </div>

                        <div class="admin-form-group">
                            <label>Company / Tim</label>
                            <input type="text" name="company" value="{{ old('company', $profile->company ?? '') }}" class="admin-input" placeholder="Contoh: Cipherion Team">
                        </div>

                        <div class="admin-form-group">
                            <label>Lokasi</label>
                            <input type="text" name="location" value="{{ old('location', $profile->location ?? '') }}" class="admin-input" placeholder="Contoh: Bandung, Indonesia">
                        </div>
                    </div>

                    <div style="margin-top: 34px;" class="admin-card-header">
                        <h3 class="admin-card-title">
                            Informasi Kontak
                        </h3>
                        <p class="admin-card-subtitle">
                            Data ini akan tampil pada bagian Contact di website portfolio.
                        </p>
                    </div>

                    <div style="display: grid; gap: 24px; grid-template-columns: 1fr 1fr; margin-top: 24px;">
                        <div class="admin-form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email', $profile->email ?? '') }}" class="admin-input" placeholder="nama@email.com">
                        </div>

                        <div class="admin-form-group">
                            <label>WhatsApp / Phone</label>
                            <input type="text" name="phone" value="{{ old('phone', $profile->phone ?? '') }}" class="admin-input" placeholder="628xxxxxxxxxx">
                        </div>

                        <div class="admin-form-group">
                            <label>Instagram URL</label>
                            <input type="text" name="instagram" value="{{ old('instagram', $profile->instagram ?? '') }}" class="admin-input" placeholder="https://instagram.com/username">
                        </div>

                        <div class="admin-form-group">
                            <label>LinkedIn URL</label>
                            <input type="text" name="linkedin" value="{{ old('linkedin', $profile->linkedin ?? '') }}" class="admin-input" placeholder="https://linkedin.com/in/username">
                        </div>
                    </div>

                    <div class="admin-actions">
                        <button type="submit" class="admin-btn-primary">
                            Update Profile
                        </button>

                        <a href="{{ route('dashboard') }}" class="admin-btn-secondary">
                            Kembali ke Dashboard
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>