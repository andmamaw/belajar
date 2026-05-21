<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Profile;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Service;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = Profile::latest()->first();
        $projects = Project::orderBy('sort_order')->latest()->get();
        $experiences = Experience::latest()->get();
        $educations = Education::latest()->get();
        $services = Service::orderBy('sort_order')->latest()->get();

        return view('portfolio.index', compact('profile', 'projects', 'experiences', 'educations', 'services'));
    }

    public function show(Project $project)
    {
        $profile = Profile::latest()->first();

        return view('portfolio.show', compact('profile', 'project'));
    }
}