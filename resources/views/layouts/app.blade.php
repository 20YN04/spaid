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
        #cookie-banner { position: fixed; bottom: 1rem; left: 1rem; right: 1rem; z-index: 50; background: var(--ink); color: var(--paper); padding: 1.25rem; max-width: 56rem; margin: 0 auto; display: none; }
        #cookie-banner.is-visible { display: flex; flex-direction: column; gap: 0.75rem; }
        @media (min-width: 640px) { #cookie-banner.is-visible { flex-direction: row; align-items: center; justify-content: space-between; gap: 1.5rem; } }
        #cookie-banner button { font-weight: 600; padding: 0.6rem 1rem; font-size: 0.85rem; }
        #cookie-banner .accept { background: var(--paper); color: var(--ink); }
        #cookie-banner .reject { background: transparent; color: var(--paper); border: 1px solid var(--paper); }
        #cookie-banner a { color: var(--paper); text-decoration: underline; text-underline-offset: 0.25rem; }
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
        <div class="mx-auto max-w-6xl px-6 py-10 text-xs text-neutral-500 grid grid-cols-1 sm:grid-cols-12 gap-6">
            <div class="sm:col-span-5 space-y-2">
                <p class="font-semibold text-neutral-900">Spaid BV</p>
                <p>{{ __('Registered office: Leuven, Belgium') }}</p>
                <p>BTW BE 0000.000.000 · KBO 0000.000.000</p>
                <p><a href="mailto:office@spaid.be" class="underline underline-offset-4">office@spaid.be</a></p>
            </div>
            <div class="sm:col-span-4 space-y-2">
                <p class="font-semibold text-neutral-900">{{ __('Legal') }}</p>
                <ul class="space-y-1">
                    <li><a href="{{ route('legal.privacy') }}" class="hover:underline underline-offset-4">{{ __('Privacy policy') }}</a></li>
                    <li><a href="{{ route('legal.terms') }}" class="hover:underline underline-offset-4">{{ __('Terms & conditions') }}</a></li>
                    <li><a href="{{ route('legal.cookies') }}" class="hover:underline underline-offset-4">{{ __('Cookie policy') }}</a></li>
                    <li><a href="{{ route('legal.accessibility') }}" class="hover:underline underline-offset-4">{{ __('Accessibility statement') }}</a></li>
                </ul>
            </div>
            <div class="sm:col-span-3 space-y-2 sm:text-right">
                <p class="font-semibold text-neutral-900">© {{ date('Y') }} Spaid</p>
                <p>{{ __('Employer wellness for parents of neurodivergent children.') }}</p>
            </div>
        </div>
    </footer>

    <div id="cookie-banner" role="dialog" aria-live="polite" aria-label="{{ __('Cookie consent') }}">
        <div class="text-sm leading-relaxed sm:flex-1">
            <p class="font-semibold mb-1">{{ __('We respect your privacy.') }}</p>
            <p>
                {{ __('Spaid only uses essential cookies needed to run the platform. We never set tracking or advertising cookies.') }}
                <a href="{{ route('legal.cookies') }}">{{ __('Cookie policy') }}</a>.
            </p>
        </div>
        <div class="flex gap-2">
            <button type="button" class="reject" data-consent="reject">{{ __('Reject') }}</button>
            <button type="button" class="accept" data-consent="accept">{{ __('Accept') }}</button>
        </div>
    </div>

    <script>
        (function () {
            const COOKIE_NAME = 'cookie_consent';
            const banner = document.getElementById('cookie-banner');
            if (!banner) return;

            const hasConsent = document.cookie.split('; ').some(c => c.startsWith(COOKIE_NAME + '='));
            if (!hasConsent) banner.classList.add('is-visible');

            banner.querySelectorAll('[data-consent]').forEach(btn => {
                btn.addEventListener('click', () => {
                    const value = btn.dataset.consent;
                    const oneYear = 60 * 60 * 24 * 365;
                    document.cookie = `${COOKIE_NAME}=${value}; max-age=${oneYear}; path=/; samesite=lax`;
                    banner.classList.remove('is-visible');
                });
            });
        })();
    </script>
</body>
</html>
