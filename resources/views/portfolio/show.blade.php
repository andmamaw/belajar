<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $project->title }} - {{ $profile->full_name ?? 'Portfolio' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#050505] text-white">
    <main class="min-h-screen px-6 py-8 md:px-16 lg:px-24">

        <nav class="mb-20 flex items-center justify-between">
            <a href="/" class="text-lg font-semibold tracking-tight">
                {{ $profile->full_name ?? 'Portfolio' }}
            </a>

            <a href="/" class="rounded-full border border-zinc-700 px-5 py-2 text-sm text-white hover:border-zinc-400">
                Back
            </a>
        </nav>

        <section class="max-w-5xl">
            <p class="mb-5 text-sm uppercase tracking-[0.3em] text-zinc-500">
                Project Detail
            </p>

            <h1 class="text-5xl font-semibold tracking-tight md:text-7xl">
                {{ $project->title }}
            </h1>

            <p class="mt-6 text-lg text-zinc-500">
                {{ $project->category }}
            </p>

            <div class="mt-12 h-80 overflow-hidden rounded-[2rem] border border-zinc-800 bg-gradient-to-br from-zinc-800 to-zinc-950">
                @if ($project->image)
                    <img src="{{ $project->image }}" alt="{{ $project->title }}" class="h-full w-full object-cover">
                @else
                    <div class="flex h-full items-center justify-center">
                        <span class="text-sm text-zinc-500">Project Preview</span>
                    </div>
                @endif
            </div>

            <div class="mt-12 grid gap-8 md:grid-cols-[1.5fr_1fr]">
                <div class="rounded-[2rem] border border-zinc-800 bg-zinc-950 p-8">
                    <p class="mb-3 text-sm uppercase tracking-[0.3em] text-zinc-500">
                        Description
                    </p>

                    <p class="text-base leading-8 text-zinc-300">
                        {{ $project->description }}
                    </p>
                </div>

                <div class="rounded-[2rem] border border-zinc-800 bg-zinc-950 p-8">
                    <p class="mb-3 text-sm uppercase tracking-[0.3em] text-zinc-500">
                        Tech Stack
                    </p>

                    <p class="text-base leading-8 text-zinc-300">
                        {{ $project->tech_stack }}
                    </p>

                    @if ($project->project_link)
                        <a href="{{ $project->project_link }}" target="_blank" class="mt-8 inline-flex rounded-full bg-white px-6 py-3 text-sm font-medium text-black hover:bg-zinc-200">
                            Open Project
                        </a>
                    @endif
                </div>
            </div>
        </section>

    </main>
</body>
</html>