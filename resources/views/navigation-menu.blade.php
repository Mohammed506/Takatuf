{{-- <nav class="navbar navbar-expand-md navbar-light bg-white border-bottom sticky-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand me-4" href="/dashboard">
            <x-jet-application-mark width="36" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                @if (auth()->user()->role_id == 1)
                    <x-jet-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>
                @endif
                @if (auth()->user()->role_id == 2)
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('volunteer.opportunities.index') }}" :active="request()->routeIs('volunteer.opportunities.index')">
                        {{ __('My Opportunities') }}
                    </x-jet-nav-link>
                @endif
                @if (auth()->user()->role_id == 3)
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('organization.opportunities.index') }}" :active="request()->routeIs('organization.opportunities.index')">
                        {{ __('My Opportunities') }}
                    </x-jet-nav-link>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav align-items-baseline">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <x-jet-dropdown id="teamManagementDropdown">
                        <x-slot name="trigger">
                            {{ Auth::user()->currentTeam->name }}

                            <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Team Management -->
                            <h6 class="dropdown-header">
                                {{ __('Manage Team') }}
                            </h6>

                            <!-- Team Settings -->
                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                {{ __('Team Settings') }}
                            </x-jet-dropdown-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <hr class="dropdown-divider">

                            <!-- Team Switcher -->
                            <h6 class="dropdown-header">
                                {{ __('Switch Teams') }}
                            </h6>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" />
                            @endforeach
                        </x-slot>
                    </x-jet-dropdown>
                @endif

                <!-- Settings Dropdown -->
                @auth
                    <x-jet-dropdown id="settingsDropdown">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <img class="rounded-circle" width="32" height="32"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            @else
                                @if (Auth::user()->role_id == 2)
                                    {{ Auth::user()->volunteer_username }}
                                @endif
                                @if (Auth::user()->role_id == 3)
                                    {{ Auth::user()->organization_name }}
                                @endif


                                <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <h6 class="dropdown-header small text-muted">
                                {{ __('Manage Account') }}
                            </h6>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <hr class="dropdown-divider">

                            <!-- Authentication -->
                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                                                                                 document.getElementById('logout-form').submit();">
                                {{ __('Log out') }}
                            </x-jet-dropdown-link>
                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                @endauth
            </ul>
        </div>
    </div>
</nav> --}}
<style>
    .side-navbar {
        width: 180px;
        height: 100%;
        position: fixed;
        margin-left: -300px;
        background-color: #f2f9f9;
        transition: 0.5s;
    }

    .nav-link:active,
    .nav-link:focus,
    .nav-link:hover,
    .nav-item:hover {
        color: #04afaf;
    }



    .my-container {
        transition: 0.4s;
    }

    .active-nav {
        margin-left: 0;

    }

    /* for main section */
    .active-cont {
        margin-left: 180px;
    }

    #menu-btn {
        background-color: transparent;
        color: #fff;
        margin-left: -50px;
    }

    .nav-link .fa {
        transition: all 1s;
    }

    .nav-link:hover .fa {
        transform: rotate(360deg);
    }

</style>

<div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
    <ul class="nav flex-column text-white w-100">
        <a href="/dashboard" class="nav-link h3  my-2" style="padding: 0.5rem 1rem">

            <x-jet-application-mark width="36" />

        </a>

        <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            <div class="nav-item">
                <i class="fa fas fa-home"></i>
                <span> {{ __('Home') }}</span>
            </div>

        </x-jet-nav-link>
        @if (auth()->user()->role_id == 3)
            <x-jet-nav-link special=";width:max-content" href="{{ route('organization.opportunities.index') }}"
                :active="request()->routeIs('organization.opportunities.index')">
                <div class="nav-item">
                    <i class="fa fa-solid fa-handshake-simple"></i><span
                        style="margin-left:4px ">{{ __('My Opportunities') }}</span>
                </div>
            </x-jet-nav-link>
        @endif
        @if (auth()->user()->role_id == 1)
            <x-jet-nav-link special=";width:max-content" href="{{ route('admin.volunteers.index') }}"
                :active="request()->routeIs('admin.volunteers.index')">
                <div class="nav-item">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span style="margin-left:4px ">{{ __('Volunteers') }}</span>
                </div>
            </x-jet-nav-link>
            <x-jet-nav-link special=";width:max-content" href="{{ route('admin.organizations.index') }}"
                :active="request()->routeIs('admin.organizations.index')">
                <div class="nav-item">
                    <i class="fa fa-solid fa-city"></i><span style="margin-left:4px ">{{ __('Organizations') }}</span>
                </div>
            </x-jet-nav-link>
            <x-jet-nav-link special=";width:max-content" href="{{ route('admin.opportunities.index') }}"
                :active="request()->routeIs('admin.opportunities.index')">
                <div class="nav-item">
                    <i class="fa fa-solid fa-handshake-simple"></i><span
                        style="margin-left:4px ">{{ __('Opportunities') }}</span>
                </div>
            </x-jet-nav-link>
        @endif

        @if (auth()->user()->role_id == 3)
            <x-jet-nav-link href="{{ route('organization.enrollments.index') }}" :active="request()->routeIs('organization.enrollments.index')">
                <div class="nav-item">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                    <span> {{ __('Enrollments') }}</span>
                </div>
            </x-jet-nav-link>
        @endif
        @if (auth()->user()->role_id == 2)
            <x-jet-nav-link href="{{ route('volunteer.enrollments.index') }}" :active="request()->routeIs('volunteer.enrollments.index')">
                <div class="nav-item">
                    <i class="fa fa-pencil" aria-hidden="true"></i>

                    <span> {{ __('Enrollment') }}</span>
                </div>
            </x-jet-nav-link>
        @endif


        <x-jet-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
            <div class="nav-item">
                <i class="fa fa-solid fa-user"></i>
                <span> {{ __('Profile') }}</span>
            </div>
        </x-jet-nav-link>
        <x-jet-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <div class="nav-item">
                <i class="fa fa-solid fa-arrow-right-from-bracket"></i>
                <span> {{ __('Log out') }}</span>
            </div>

        </x-jet-nav-link>
        <form method="POST" id="logout-form" action="{{ route('logout') }}">
            @csrf
        </form>



        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                {{ __('API Tokens') }}
            </x-jet-dropdown-link>
        @endif



        <!-- Authentication -->


    </ul>

    <span href="#" class=" h4 w-100 mb-5" style="padding: 1.9rem">
        <a href=""><i class="bx bxl-instagram-alt " style="color:#008989"></i></a>
        <a href=""><i class="bx bxl-twitter px-2 " style="color:#008989"></i></a>
        <a href=""><i class="bx bxl-facebook " style="color:#008989"></i></a>
    </span>
</div>
