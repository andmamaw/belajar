<nav x-data="{ open: false }" style="background: rgba(255,255,255,0.86); backdrop-filter: blur(18px); border-bottom: 1px solid rgba(226,232,240,0.9); position: sticky; top: 0; z-index: 50;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" style="display: flex; align-items: center; gap: 12px; text-decoration: none;">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 46px; width: auto; display: block;">
                        <div style="line-height: 1.1;">
                            <p style="font-weight: 900; color: #0f172a; font-size: 15px;">MAMAW</p>
                            <p style="font-size: 11px; color: #64748b; font-weight: 700; letter-spacing: 0.08em;">ADMIN PANEL</p>
                        </div>
                    </a>
                </div>

                <div class="hidden space-x-2 sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Dashboard
                    </x-nav-link>

                    <x-nav-link :href="route('admin.profile.edit')" :active="request()->routeIs('admin.profile.*')">
                        Profile
                    </x-nav-link>

                    <x-nav-link :href="route('admin.projects.index')" :active="request()->routeIs('admin.projects.*')">
                        Project
                    </x-nav-link>

                    <x-nav-link :href="route('admin.services.index')" :active="request()->routeIs('admin.services.*')">
                        Services
                    </x-nav-link>

                    <x-nav-link :href="route('admin.experiences.index')" :active="request()->routeIs('admin.experiences.*')">
                        Experience
                    </x-nav-link>

                    <x-nav-link :href="route('admin.educations.index')" :active="request()->routeIs('admin.educations.*')">
                        Education
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <a href="{{ url('/') }}" target="_blank" style="margin-right: 14px; background: #0f172a; color: white; padding: 10px 16px; border-radius: 999px; text-decoration: none; font-size: 13px; font-weight: 800;">
                    Lihat Website
                </a>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button style="display: inline-flex; align-items: center; gap: 10px; padding: 8px 10px; border-radius: 999px; background: #f8fafc; border: 1px solid #e2e8f0; color: #0f172a; font-size: 14px; font-weight: 800;">
                            <span style="display: inline-flex; width: 32px; height: 32px; border-radius: 999px; align-items: center; justify-content: center; background: linear-gradient(135deg, #2563eb, #38bdf8); color: white;">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>

                            <span>{{ Auth::user()->name }}</span>

                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Account Setting
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" style="display: inline-flex; align-items: center; justify-content: center; padding: 10px; border-radius: 12px; background: #f1f5f9; color: #0f172a;">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden" style="border-top: 1px solid #e2e8f0; background: white;">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Dashboard
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.profile.edit')" :active="request()->routeIs('admin.profile.*')">
                Profile
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.projects.index')" :active="request()->routeIs('admin.projects.*')">
                Project
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.services.index')" :active="request()->routeIs('admin.services.*')">
                Services
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.experiences.index')" :active="request()->routeIs('admin.experiences.*')">
                Experience
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.educations.index')" :active="request()->routeIs('admin.educations.*')">
                Education
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="url('/')">
                Lihat Website
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    Account Setting
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>