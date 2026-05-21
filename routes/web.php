<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\ExperienceController as AdminExperienceController;
use App\Http\Controllers\Admin\EducationController as AdminEducationController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Models\Project;
use App\Models\Service;
use App\Models\Experience;
use App\Models\Education;
use App\Models\LoginActivity;
use Illuminate\Support\Facades\Auth;

Route::get('/', [PortfolioController::class, 'index']);
Route::get('/projects/{project}', [PortfolioController::class, 'show'])->name('projects.show');

Route::get('/dashboard', function () {
    $user = Auth::user();

    return view('dashboard', [
        'totalProjects' => Project::count(),
        'totalServices' => Service::count(),
        'totalExperiences' => Experience::count(),
        'totalEducations' => Education::count(),
        'loginCount' => $user->login_count ?? 0,
        'lastLoginAt' => $user->last_login_at,
        'loginActivities' => LoginActivity::where('user_id', $user->id)
            ->latest('logged_in_at')
            ->limit(5)
            ->get(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Projects
    Route::get('/projects', [AdminProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [AdminProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [AdminProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [AdminProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [AdminProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [AdminProjectController::class, 'destroy'])->name('projects.destroy');

    // Services
    Route::get('/services', [AdminServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [AdminServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [AdminServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{service}/edit', [AdminServiceController::class, 'edit'])->name('services.edit');
    Route::put('/services/{service}', [AdminServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{service}', [AdminServiceController::class, 'destroy'])->name('services.destroy');

    // Experiences
    Route::get('/experiences', [AdminExperienceController::class, 'index'])->name('experiences.index');
    Route::get('/experiences/create', [AdminExperienceController::class, 'create'])->name('experiences.create');
    Route::post('/experiences', [AdminExperienceController::class, 'store'])->name('experiences.store');
    Route::get('/experiences/{experience}/edit', [AdminExperienceController::class, 'edit'])->name('experiences.edit');
    Route::put('/experiences/{experience}', [AdminExperienceController::class, 'update'])->name('experiences.update');
    Route::delete('/experiences/{experience}', [AdminExperienceController::class, 'destroy'])->name('experiences.destroy');

    // Educations
    Route::get('/educations', [AdminEducationController::class, 'index'])->name('educations.index');
    Route::get('/educations/create', [AdminEducationController::class, 'create'])->name('educations.create');
    Route::post('/educations', [AdminEducationController::class, 'store'])->name('educations.store');
    Route::get('/educations/{education}/edit', [AdminEducationController::class, 'edit'])->name('educations.edit');
    Route::put('/educations/{education}', [AdminEducationController::class, 'update'])->name('educations.update');
    Route::delete('/educations/{education}', [AdminEducationController::class, 'destroy'])->name('educations.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Profile
    Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';