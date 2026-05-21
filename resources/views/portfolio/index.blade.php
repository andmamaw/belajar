<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ($profile->full_name ?? 'Portfolio') . ' - Portfolio' }}</title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}?v=10">
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}?v=10">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/portfolio-theme.css') }}?v=50">
</head>
<body>
@php
    $waNumber = preg_replace('/\D/', '', $profile->phone ?? '');
@endphp

<div class="portfolio-shell">
    <div class="portfolio-frame">
        <nav class="public-nav">
            <div class="public-nav-inner">
                <a href="#top" class="public-brand public-brand-text-only">
                    <span class="public-brand-name">{{ $profile->full_name ?? config('app.name', 'Portfolio') }}</span>
                </a>

                <div class="public-menu">
                    <a href="#top" class="active">Home</a>
                    <a href="#projects">Work</a>
                    <a href="#about">About</a>
                    <a href="#experience">Resume</a>
                    <a href="#contact">Contact</a>
                </div>

                @if (!empty($waNumber))
                    <a href="https://wa.me/{{ $waNumber }}" target="_blank" class="nav-cta">Let's Talk ↗</a>
                @elseif (!empty($profile->email))
                    <a href="mailto:{{ $profile->email }}" class="nav-cta">Let's Talk ↗</a>
                @else
                    <a href="#contact" class="nav-cta">Let's Talk ↗</a>
                @endif
            </div>
        </nav>

        <main id="top">
            <section class="hero hero-tall">
                <div class="container">
                    <div class="hero-main">
                        <div class="hero-copy">
                            <div class="hero-eyebrow">
                                <span class="hero-dot"></span>
                                HELLO, I'M {{ strtoupper(explode(' ', $profile->full_name ?? 'ANDI')[0]) }}
                            </div>

                            <h1 class="hero-title">
                                Build digital products with <span>clarity.</span>
                            </h1>

                            <p class="hero-desc">
                                {{ $profile->headline ?? 'Web Developer, System Builder, and Creative Founder.' }}
                                <br>
                                {{ $profile->bio ?? 'Saya membantu bisnis berkembang melalui website yang cepat, sistem yang efisien, dan solusi digital yang tepat sasaran.' }}
                            </p>

                            <div class="hero-actions">
                                <a href="#projects" class="btn-primary">View My Work →</a>
                                <a href="#contact" class="btn-ghost">Download Resume ↓</a>
                            </div>
                        </div>

                        <div class="hero-person">
                            <div class="portrait-orb"></div>

                            <div class="portrait-wrap">
                                @if (file_exists(public_path('images/profile.png')))
                                    <img 
                                        src="{{ asset('images/profile.png') }}" 
                                        alt="Profile" 
                                        class="portrait-img"
                                    >
                                @else
                                    <img 
                                        src="{{ asset('images/logo.png') }}" 
                                        alt="Profile" 
                                        class="portrait-img portrait-logo-fallback"
                                    >
                                @endif
                            </div>

                            <div class="role-card">
                                <div class="role-item">
                                    <div class="role-icon">▣</div>
                                    <div>
                                        <div class="role-label">Current Role</div>
                                        <div class="role-value">{{ $profile->job_title ?? 'Founder & Digital Strategist' }}</div>
                                    </div>
                                </div>

                                <div class="role-item">
                                    <div class="role-icon">⌖</div>
                                    <div>
                                        <div class="role-label">Location</div>
                                        <div class="role-value">{{ $profile->location ?? 'Bandung, Indonesia' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="stats-bar">
                        <div class="stat-item">
                            <div class="stat-value">{{ $projects->count() }}+</div>
                            <div class="stat-label">Projects</div>
                        </div>

                        <div class="stat-item">
                            <div class="stat-value">{{ $experiences->count() }}+</div>
                            <div class="stat-label">Experience</div>
                        </div>

                        <div class="stat-item">
                            <div class="stat-value">{{ $profile->company ?? 'Cipherion' }}</div>
                            <div class="stat-label">Personal Brand</div>
                        </div>

                        <div class="stat-item">
                            <div class="stat-value">{{ $profile->company ?? '-' }}</div>
                            <div class="stat-label">Company</div>
                        </div>

                        <div class="stat-item">
                            <div class="stat-value">{{ $profile->education ?? '-' }}</div>
                            <div class="stat-label">Education</div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="projects" class="public-section">
                <div class="container">
                    <div class="section-head-row">
                        <div>
                            <div class="section-kicker">Selected Work</div>
                            <h2 class="section-title">Featured Projects</h2>
                            <p class="section-desc">
                                Beberapa project pilihan yang menunjukkan pengalaman dalam membangun produk digital, website, dan sistem bisnis.
                            </p>
                        </div>

                        <a href="#projects" class="card-link">View All Projects →</a>
                    </div>

                    <div class="projects-row-wide">
                        @forelse ($projects->take(6) as $project)
                            <a href="{{ route('projects.show', $project) }}" class="project-card">
                                <div class="project-thumb">
                                    @if (!empty($project->image))
                                        <img 
                                            src="{{ $project->image }}" 
                                            alt="{{ $project->title }}"
                                            onerror="this.onerror=null; this.src='{{ asset('images/image.png') }}'; this.classList.add('logo-fallback');"    
                                        >
                                    @else
                                        <img src="{{ asset('images/image.png') }}" alt="{{ $project->title }}" class="logo-fallback">
                                    @endif
                                </div>

                                <div class="project-name">{{ $project->title }}</div>
                                <div class="project-category">{{ $project->category ?? 'Project' }}</div>

                                <div class="project-desc">
                                    {{ \Illuminate\Support\Str::limit($project->description, 95) }}
                                </div>

                                <div class="project-tags">
                                    @foreach (array_slice(explode(',', $project->tech_stack ?? ''), 0, 3) as $tag)
                                        @if (trim($tag) !== '')
                                            <span class="project-tag">{{ trim($tag) }}</span>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="project-arrow">→</div>
                            </a>
                        @empty
                            <div class="project-card">
                                <div class="project-name">Belum ada project</div>
                                <div class="project-desc">Tambahkan project dari dashboard admin.</div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>

            <section id="about" class="public-section public-section-muted">
                <div class="container">
                    <div class="about-layout">
                        <div class="glass-card about-card about-card-wide">
                            <div class="section-kicker">About</div>
                            <h2 class="section-title">About Me</h2>

                            <p class="about-text about-text-large">
                                {{ $profile->bio ?? 'Saya adalah developer dan founder yang berfokus pada pembangunan produk digital yang fungsional, scalable, dan berdampak.' }}
                            </p>
                        </div>

                        <div class="glass-card about-card">
                            <div class="card-title">Profile Details</div>

                            <div class="about-mini-grid">
                                <div class="about-mini-item">
                                    <div class="about-mini-label">Experience</div>
                                    <div class="about-mini-value">{{ $experiences->count() }}+ Years</div>
                                </div>

                                <div class="about-mini-item">
                                    <div class="about-mini-label">Education</div>
                                    <div class="about-mini-value">{{ $profile->education ?? '-' }}</div>
                                </div>

                                <div class="about-mini-item">
                                    <div class="about-mini-label">Work</div>
                                    <div class="about-mini-value">{{ $profile->job_title ?? '-' }}</div>
                                </div>

                                <div class="about-mini-item">
                                    <div class="about-mini-label">Company</div>
                                    <div class="about-mini-value">{{ $profile->company ?? '-' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="experience" class="public-section">
                <div class="container">
                    <div class="section-head">
                        <div class="section-kicker">Resume</div>
                        <h2 class="section-title">Experience & Education</h2>
                        <p class="section-desc">
                            Ringkasan perjalanan profesional dan pendidikan yang mendukung kemampuan dalam membangun solusi digital.
                        </p>
                    </div>

                    <div class="resume-layout">
                        <div class="glass-card mini-card resume-card">
                            <div class="card-title">Work Experience</div>

                            @forelse ($experiences as $experience)
                                <div class="timeline-item">
                                    <div class="timeline-icon">▣</div>
                                    <div>
                                        <div class="timeline-title">{{ $experience->position ?? '-' }}</div>
                                        <div class="timeline-sub">
                                            {{ $experience->company ?? '-' }}<br>
                                            {{ $experience->period ?? '-' }}<br>
                                            {{ $experience->description ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="timeline-sub">Belum ada data experience.</div>
                            @endforelse
                        </div>

                        <div id="education" class="glass-card mini-card resume-card">
                            <div class="card-title">Education</div>

                            @forelse ($educations as $education)
                                <div class="timeline-item">
                                    <div class="timeline-icon">◇</div>
                                    <div>
                                        <div class="timeline-title">{{ $education->major ?? '-' }}</div>
                                        <div class="timeline-sub">
                                            {{ $education->school_name ?? '-' }}<br>
                                            {{ $education->period ?? '-' }}<br>
                                            {{ $education->description ?? '-' }}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="timeline-sub">Belum ada data education.</div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </section>

            <section id="contact" class="public-section contact-section">
                <div class="container">
                    <div class="glass-card contact-card contact-card-wide">
                        <div>
                            <div class="section-kicker">Contact</div>
                            <h2 class="section-title">Let's Work Together</h2>

                            <p class="contact-text contact-text-large">
                                Have a project in mind or just want to say hello? I'd love to hear from you.
                                Hubungi saya untuk diskusi website, sistem bisnis, atau kerja sama digital.
                            </p>

                            <div class="hero-actions" style="margin-top: 28px;">
                                @if (!empty($waNumber))
                                    <a href="https://wa.me/{{ $waNumber }}" target="_blank" class="btn-primary">Get In Touch →</a>
                                @elseif (!empty($profile->email))
                                    <a href="mailto:{{ $profile->email }}" class="btn-primary">Get In Touch →</a>
                                @else
                                    <a href="#contact" class="btn-primary">Get In Touch →</a>
                                @endif

                                @if (!empty($profile->email))
                                    <a href="mailto:{{ $profile->email }}" class="btn-ghost">{{ $profile->email }}</a>
                                @endif
                            </div>
                        </div>

                        <div class="contact-info-list">
                            <div class="about-mini-item">
                                <div class="about-mini-label">Email</div>
                                <div class="about-mini-value">{{ $profile->email ?? '-' }}</div>
                            </div>

                            <div class="about-mini-item">
                                <div class="about-mini-label">Phone</div>
                                <div class="about-mini-value">{{ $profile->phone ?? '-' }}</div>
                            </div>

                            <div class="about-mini-item">
                                <div class="about-mini-label">Location</div>
                                <div class="about-mini-value">{{ $profile->location ?? '-' }}</div>
                            </div>
                        </div>
                    </div>

                    <footer class="footer">
                        © {{ date('Y') }} {{ $profile->full_name ?? config('app.name', 'Portfolio') }}. All rights reserved.
                    </footer>
                </div>
            </section>
        </main>
    </div>
</div>

<script>
    const nav = document.querySelector('.public-nav');
    const navLinks = document.querySelectorAll('.public-menu a[href^="#"]');

    const sections = Array.from(navLinks)
        .map(link => {
            const target = document.querySelector(link.getAttribute('href'));
            return target ? { link, target } : null;
        })
        .filter(Boolean);

    function setActiveMenu() {
        const scrollPosition = window.scrollY + 160;
        const bottomPosition = window.innerHeight + window.scrollY;
        const documentHeight = document.documentElement.scrollHeight;

        if (nav) {
            if (window.scrollY > 20) {
                nav.classList.add('is-scrolled');
            } else {
                nav.classList.remove('is-scrolled');
            }
        }

        let currentSection = sections[0];

        sections.forEach(section => {
            if (section.target.offsetTop <= scrollPosition) {
                currentSection = section;
            }
        });

        // Jika sudah hampir sampai paling bawah halaman, paksa Contact aktif
        if (bottomPosition >= documentHeight - 40) {
            const contactLink = document.querySelector('.public-menu a[href="#contact"]');
            const contactTarget = document.querySelector('#contact');

            if (contactLink && contactTarget) {
                currentSection = {
                    link: contactLink,
                    target: contactTarget
                };
            }
        }

        navLinks.forEach(link => link.classList.remove('active'));

        if (currentSection && currentSection.link) {
            currentSection.link.classList.add('active');
        }
    }

    navLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            const target = document.querySelector(this.getAttribute('href'));

            if (!target) return;

            event.preventDefault();

            navLinks.forEach(item => item.classList.remove('active'));
            this.classList.add('active');

            const offsetTop = target.offsetTop - 95;

            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });
        });
    });

    window.addEventListener('scroll', setActiveMenu);
    window.addEventListener('load', setActiveMenu);
    window.addEventListener('resize', setActiveMenu);
</script>
</body>
</html>