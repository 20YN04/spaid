<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="bg-white text-neutral-900 antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Spaid')</title>
    <meta name="description" content="@yield('description', __('Spaid — employer wellness for parents of neurodivergent children.'))">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root { --ink: #0a0a0a; --paper: #ffffff; --line: #111111; }
        body { font-family: ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; }
        .hairline { border: 1px solid var(--line); }
        .btn-primary { background: var(--ink); color: var(--paper); padding: 0.875rem 1.25rem; font-weight: 600; letter-spacing: 0.02em; display: inline-block; }
        .btn-primary:hover { background: #262626; }
        .btn-primary:disabled { background: #a3a3a3; cursor: not-allowed; }
        .btn-ghost { border: 1px solid var(--ink); color: var(--ink); padding: 0.875rem 1.25rem; font-weight: 600; letter-spacing: 0.02em; display: inline-block; }
        .btn-ghost:hover { background: var(--ink); color: var(--paper); }
        .lang-pill { padding: 0.25rem 0.55rem; font-size: 0.7rem; font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase; }
        .lang-pill.active { background: var(--ink); color: var(--paper); }
        .nav-link { font-size: 0.875rem; font-weight: 500; }
        .nav-link.active { font-weight: 700; }
        .section-eyebrow { font-size: 0.7rem; font-weight: 600; letter-spacing: 0.18em; text-transform: uppercase; color: #525252; }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    <header class="hairline border-x-0 border-t-0">
        <div class="mx-auto max-w-6xl px-6 py-5 flex items-center justify-between gap-6">
            <a href="{{ route('home') }}" class="font-bold tracking-tight text-lg">spaid.</a>

            <nav class="flex items-center gap-6">
                <a href="{{ route('home') }}"
                   class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">{{ __('Home') }}</a>
                <a href="{{ route('programmas.index') }}"
                   class="nav-link {{ request()->routeIs('programmas.index') ? 'active' : '' }}">{{ __("Programma's") }}</a>
                <a href="{{ route('contact.show') }}"
                   class="nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}">{{ __('Contact') }}</a>

                @php
                    $current = app()->getLocale();
                    $supported = config('app.supported_locales', ['nl', 'fr']);
                @endphp
                <div class="hairline inline-flex divide-x divide-neutral-900">
                    @foreach ($supported as $loc)
                        <a href="{{ route('locale.switch', ['locale' => $loc]) }}"
                           class="lang-pill {{ $loc === $current ? 'active' : '' }}"
                           hreflang="{{ $loc }}"
                           aria-current="{{ $loc === $current ? 'true' : 'false' }}">
                            {{ strtoupper($loc) }}
                        </a>
                    @endforeach
                </div>

                @auth
                    <a href="{{ route('dashboard') }}" class="nav-link">{{ __('Dashboard') }}</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm underline underline-offset-4">{{ __('Logout') }}</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-link">{{ __('Sign in') }}</a>
                @endauth
            </nav>
        </div>
    </header>

    @if (session('status'))
        <div class="mx-auto max-w-6xl px-6 mt-6">
            <div class="hairline px-4 py-3 text-sm">{{ session('status') }}</div>
        </div>
    @endif

    <main class="flex-1">
        @hasSection('full-bleed')
            @yield('full-bleed')
        @else
            <div class="mx-auto max-w-6xl px-6 py-12">
                @yield('content')
            </div>
        @endif
    </main>

    <footer class="hairline border-x-0 border-b-0 mt-12">
        <div class="mx-auto max-w-6xl px-6 py-10 text-xs text-neutral-500 flex flex-col sm:flex-row gap-3 sm:justify-between">
            <span>© {{ date('Y') }} {{ __('Spaid — employer wellness for parents of neurodivergent children.') }}</span>
            <span>
                <a href="mailto:office@spaid.be" class="underline underline-offset-4">office@spaid.be</a>
            </span>
        </div>
    </footer>
</body>
</html>
