<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> {{ $profile->full_name ?? 'Portfolio' }} </title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#050505] text-white">
    <main class="min-h-screen">

        <section class="px-6 py-8 md:px-16 lg:px-24">
            <nav class="flex items-center justify-between">
                <h1 class="text-lg font-semibold tracking-tight">
                    {{ $profile->full_name ?? 'Portfolio' }}
                </h1>

                <div class="hidden md:flex items-center gap-8 text-sm text-zinc-400">
                    <a href="#about" class="hover:text-white">About</a>
                    <a href="#services" class="hover:text-white">Services</a>
                    <a href="#projects" class="hover:text-white">Projects</a>
                    <a href="#experience" class="hover:text-white">Experience</a>
                    <a href="#education" class="hover:text-white">Education</a>
                    <a href="#contact" class="hover:text-white">Contact</a>
                </div>
            </nav>
        </section>

        <section id="about" class="px-6 pt-16 pb-24 md:px-16 lg:px-24">
            <div class="max-w-5xl">
                <p class="mb-5 text-sm uppercase tracking-[0.3em] text-zinc-500">
                    Portfolio
                </p>

                <h2 class="max-w-4xl text-5xl font-semibold tracking-tight md:text-7xl lg:text-8xl">
                    {{ $profile->headline ?? 'Digital Solutions for Modern Businesses' }}
                </h2>

                <p class="mt-8 max-w-2xl text-lg leading-8 text-zinc-400">
    {{ $profile->bio ?? 'Saya adalah Web Developer dan System Builder yang berfokus pada pembuatan website, sistem bisnis, dan aplikasi berbasis web untuk membantu operasional perusahaan menjadi lebih rapi dan efisien.' }}
                </p>

                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="#projects" class="rounded-full bg-white px-6 py-3 text-sm font-medium text-black hover:bg-zinc-200">
                        Lihat Project
                    </a>

                    <a href="#contact" class="rounded-full border border-zinc-700 px-6 py-3 text-sm font-medium text-white hover:border-zinc-400">
                        Hubungi Saya
                    </a>
                </div>
            </div>
        </section>

        <section class="px-6 pb-24 md:px-16 lg:px-24">
            <div class="grid gap-4 md:grid-cols-4">
                <div class="rounded-3xl border border-zinc-800 bg-zinc-950 p-6">
                    <p class="text-3xl font-semibold">{{ $projects->count() }}+</p>
                    <p class="mt-2 text-sm text-zinc-500">Web Project</p>
                </div>

                <div class="rounded-3xl border border-zinc-800 bg-zinc-950 p-6">
                    <p class="text-3xl font-semibold">IT</p>
                    <p class="mt-2 text-sm text-zinc-500">Development Focus</p>
                </div>

                <div class="rounded-3xl border border-zinc-800 bg-zinc-950 p-6">
                    <p class="text-3xl font-semibold">Edu</p>
                    <p class="mt-2 text-sm text-zinc-500">{{ $profile->education ?? '-' }}</p>
                </div>

                <div class="rounded-3xl border border-zinc-800 bg-zinc-950 p-6">
                    <p class="text-3xl font-semibold">{{ $profile->company ?? '-' }}</p>
                    <p class="mt-2 text-sm text-zinc-500">{{ $profile->job_title ?? '-' }}</p>
                </div>
            </div>
        </section>
        <section id="services" class="px-6 pb-24 md:px-16 lg:px-24">
    <div class="mb-10">
        <p class="mb-3 text-sm uppercase tracking-[0.3em] text-zinc-500">
            Services
        </p>

        <h2 class="text-3xl font-semibold md:text-5xl">
            Keahlian
        </h2>
    </div>

    <div class="grid gap-5 md:grid-cols-3">
        @forelse ($services as $service)
            <div class="rounded-[2rem] border border-zinc-800 bg-zinc-950 p-8 transition hover:border-zinc-600">
                <div class="mb-8 flex h-14 w-14 items-center justify-center rounded-2xl bg-white text-sm font-semibold text-black">
                    {{ $service->icon ?? 'IT' }}
                </div>

                <h3 class="text-2xl font-semibold">
                    {{ $service->title }}
                </h3>

                <p class="mt-4 text-sm leading-6 text-zinc-400">
                    {{ $service->description }}
                </p>
            </div>
        @empty
            <div class="rounded-[2rem] border border-zinc-800 bg-zinc-950 p-8">
                <p class="text-zinc-400">Belum ada layanan yang ditambahkan.</p>
            </div>
        @endforelse
    </div>
</section>
        <section id="projects" class="px-6 pb-24 md:px-16 lg:px-24">
            <div class="mb-10 flex items-end justify-between gap-6">
                <div>
                    <p class="mb-3 text-sm uppercase tracking-[0.3em] text-zinc-500">
                        Selected Work
                    </p>
                    <h2 class="text-3xl font-semibold md:text-5xl">
                        Project Saya
                    </h2>
                </div>
            </div>

            <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($projects as $project)
                    <article class="group rounded-[2rem] border border-zinc-800 bg-zinc-950 p-6 transition hover:border-zinc-600">
                        <div class="mb-8 h-48 overflow-hidden rounded-[1.5rem] bg-gradient-to-br from-zinc-800 to-zinc-950">
                            @if ($project->image)
                                <img src="{{ $project->image }}" alt="{{ $project->title }}" class="h-full w-full object-cover">
                            @else
                                <div class="flex h-full items-center justify-center">
                                    <span class="text-sm text-zinc-500">Project Preview</span>
                                </div>
                            @endif
                        </div>

                        <p class="mb-3 text-sm text-zinc-500">
                            {{ $project->category }}
                        </p>

                        <h3 class="text-2xl font-semibold tracking-tight">
                            {{ $project->title }}
                        </h3>

                        <p class="mt-4 text-sm leading-6 text-zinc-400">
                            {{ $project->description }}
                        </p>

                        <p class="mt-6 text-sm text-zinc-500">
                            {{ $project->tech_stack }}
                        </p>

                        <div class="mt-6 flex flex-wrap gap-3">
                            <a href="{{ route('projects.show', $project) }}" class="inline-flex rounded-full border border-zinc-700 px-5 py-2 text-sm text-white hover:border-zinc-400">
                                Detail
                            </a>

                            @if ($project->project_link)
                                <a href="{{ $project->project_link }}" target="_blank" class="inline-flex rounded-full bg-white px-5 py-2 text-sm font-medium text-black hover:bg-zinc-200">
                                    View Project
                                </a>
                            @endif
                        </div>
                    </article>
                @empty
                    <div class="rounded-3xl border border-zinc-800 bg-zinc-950 p-6">
                        <p class="text-zinc-400">Belum ada project yang ditambahkan.</p>
                    </div>
                @endforelse
            </div>
        </section>

        <section id="experience" class="px-6 pb-24 md:px-16 lg:px-24">
    <div class="rounded-[2rem] border border-zinc-800 bg-zinc-950 p-8 md:p-10">
        <p class="mb-3 text-sm uppercase tracking-[0.3em] text-zinc-500">
            Profile
        </p>

        <h2 class="text-3xl font-semibold md:text-5xl">
            {{ $profile->headline ?? 'Web Developer & Business System Builder' }}
        </h2>

        <div class="mt-8 grid gap-6 md:grid-cols-3">
            <div>
                <p class="text-sm text-zinc-500">Pendidikan</p>
                <p class="mt-2 text-lg">{{ $profile->education ?? '-' }}</p>
            </div>

            <div>
                <p class="text-sm text-zinc-500">Pekerjaan</p>
                <p class="mt-2 text-lg">{{ $profile->job_title ?? '-' }}</p>
            </div>

            <div>
                <p class="text-sm text-zinc-500">Perusahaan / Tim</p>
                <p class="mt-2 text-lg">{{ $profile->company ?? '-' }}</p>
            </div>
        </div>

        <div class="mt-12">
            <p class="mb-6 text-sm uppercase tracking-[0.3em] text-zinc-500">
                Experience
            </p>

            <div class="space-y-5">
                @forelse ($experiences as $experience)
                    <div class="rounded-3xl border border-zinc-800 bg-black/40 p-6">
                        <div class="flex flex-col gap-2 md:flex-row md:items-start md:justify-between">
                            <div>
                                <h3 class="text-xl font-semibold">
                                    {{ $experience->position }}
                                </h3>

                                <p class="mt-1 text-sm text-zinc-500">
                                    {{ $experience->company }}
                                </p>
                            </div>

                            <p class="text-sm text-zinc-500">
                                {{ $experience->period }}
                            </p>
                        </div>

                        <p class="mt-4 text-sm leading-6 text-zinc-400">
                            {{ $experience->description }}
                        </p>
                    </div>
                @empty
                    <div class="rounded-3xl border border-zinc-800 bg-black/40 p-6">
                        <p class="text-zinc-400">Belum ada pengalaman kerja yang ditambahkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
<section id="education" class="px-6 pb-24 md:px-16 lg:px-24">
    <div class="mb-10">
        <p class="mb-3 text-sm uppercase tracking-[0.3em] text-zinc-500">
            Education
        </p>

        <h2 class="text-3xl font-semibold md:text-5xl">
            Pendidikan
        </h2>
    </div>

    <div class="space-y-5">
        @forelse ($educations as $education)
            <div class="rounded-[2rem] border border-zinc-800 bg-zinc-950 p-8">
                <div class="flex flex-col gap-2 md:flex-row md:items-start md:justify-between">
                    <div>
                        <h3 class="text-2xl font-semibold">
                            {{ $education->major }}
                        </h3>

                        <p class="mt-2 text-zinc-400">
                            {{ $education->school_name }}
                        </p>
                    </div>

                    <p class="text-sm text-zinc-500">
                        {{ $education->period }}
                    </p>
                </div>

                <p class="mt-6 text-sm leading-6 text-zinc-400">
                    {{ $education->description }}
                </p>
            </div>
        @empty
            <div class="rounded-[2rem] border border-zinc-800 bg-zinc-950 p-8">
                <p class="text-zinc-400">Belum ada data pendidikan yang ditambahkan.</p>
            </div>
        @endforelse
    </div>
</section>
        <section id="contact" class="px-6 pb-16 md:px-16 lg:px-24">
    <div class="rounded-[2rem] border border-zinc-800 bg-zinc-950 p-8 md:p-10">
        <p class="mb-3 text-sm uppercase tracking-[0.3em] text-zinc-500">
            Contact
        </p>

        <h2 class="text-3xl font-semibold md:text-5xl">
            Let's build something useful.
        </h2>

        <p class="mt-6 max-w-2xl text-base leading-7 text-zinc-400">
            Hubungi saya untuk kebutuhan website, sistem bisnis, dashboard, atau pengembangan aplikasi berbasis web.
        </p>

        <div class="mt-10 grid gap-4 md:grid-cols-2">
            @if ($profile?->email)
                <a href="mailto:{{ $profile->email }}" class="rounded-3xl border border-zinc-800 bg-black/40 p-6 hover:border-zinc-600">
                    <p class="text-sm text-zinc-500">Email</p>
                    <p class="mt-2 text-lg">{{ $profile->email }}</p>
                </a>
            @endif

            @if ($profile?->phone)
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $profile->phone) }}" target="_blank" class="rounded-3xl border border-zinc-800 bg-black/40 p-6 hover:border-zinc-600">
                    <p class="text-sm text-zinc-500">WhatsApp</p>
                    <p class="mt-2 text-lg">{{ $profile->phone }}</p>
                </a>
            @endif

            @if ($profile?->instagram)
                <a href="{{ $profile->instagram }}" target="_blank" class="rounded-3xl border border-zinc-800 bg-black/40 p-6 hover:border-zinc-600">
                    <p class="text-sm text-zinc-500">Instagram</p>
                    <p class="mt-2 text-lg">Open Instagram</p>
                </a>
            @endif

            @if ($profile?->linkedin)
                <a href="{{ $profile->linkedin }}" target="_blank" class="rounded-3xl border border-zinc-800 bg-black/40 p-6 hover:border-zinc-600">
                    <p class="text-sm text-zinc-500">LinkedIn</p>
                    <p class="mt-2 text-lg">Open LinkedIn</p>
                </a>
            @endif
        </div>
    </div>

    <div class="border-t border-zinc-800 pt-8 mt-12">
        <p class="text-sm text-zinc-500">
            © {{ date('Y') }} {{ $profile->full_name ?? 'Portfolio' }}. Built with Laravel and Supabase.
        </p>
    </div>
</section>

    </main>
</body>
</html>