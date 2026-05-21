<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p style="font-size: 13px; color: #64748b; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase;">
                    Project Management
                </p>
                <h2 class="mt-1 text-xl font-semibold leading-tight text-gray-900">
                    Edit Project
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
                    <h3 class="admin-card-title">{{ $project->title }}</h3>
                    <p class="admin-card-subtitle">
                        Perbarui data project. Perubahan akan langsung tampil di halaman portfolio.
                    </p>
                </div>

                <form action="{{ route('admin.projects.update', $project) }}" method="POST" class="admin-form">
                    @csrf
                    @method('PUT')

                    <div class="admin-form-grid">
                        <div class="admin-form-group">
                            <label>Judul Project</label>
                            <input type="text" name="title" value="{{ old('title', $project->title) }}" class="admin-input">
                        </div>

                        <div class="admin-form-group">
                            <label>Kategori</label>
                            <input type="text" name="category" value="{{ old('category', $project->category) }}" class="admin-input">
                        </div>

                        <div class="admin-form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" class="admin-textarea">{{ old('description', $project->description) }}</textarea>
                        </div>

                        <div class="admin-form-group">
                            <label>URL Gambar</label>
                            <input type="text" name="image" value="{{ old('image', $project->image) }}" class="admin-input">
                        </div>

                        <div class="admin-form-group">
                            <label>Tech Stack</label>
                            <input type="text" name="tech_stack" value="{{ old('tech_stack', $project->tech_stack) }}" class="admin-input">
                        </div>

                        <div class="admin-form-group">
                            <label>Link Project</label>
                            <input type="text" name="project_link" value="{{ old('project_link', $project->project_link) }}" class="admin-input">
                        </div>

                        <div class="admin-form-group">
                            <label>Urutan</label>
                            <input type="number" name="sort_order" value="{{ old('sort_order', $project->sort_order) }}" class="admin-input">
                        </div>
                    </div>

                    <div class="admin-actions">
                        <button type="submit" class="admin-btn-primary">
                            Update Project
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