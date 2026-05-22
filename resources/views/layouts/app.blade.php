<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="bg-white text-neutral-900 antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Spaid')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root { --ink: #0a0a0a; --paper: #ffffff; --line: #111111; }
        body { font-family: ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif; }
        .hairline { border: 1px solid var(--line); }
        .btn-primary { background: var(--ink); color: var(--paper); padding: 0.875rem 1.25rem; font-weight: 600; letter-spacing: 0.02em; }
        .btn-primary:hover { background: #262626; }
        .btn-primary:disabled { background: #a3a3a3; cursor: not-allowed; }
        .lang-pill { padding: 0.25rem 0.55rem; font-size: 0.7rem; font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase; }
        .lang-pill.active { background: var(--ink); color: var(--paper); }
    </style>
</head>
<body class="min-h-screen">
    <header class="hairline border-x-0 border-t-0">
        <div class="mx-auto max-w-6xl px-6 py-5 flex items-center justify-between gap-6">
            <a href="/" class="font-bold tracking-tight text-lg">spaid.</a>

            <nav class="flex items-center gap-5">
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
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm underline underline-offset-4">{{ __('Logout') }}</button>
                    </form>
                @endauth
            </nav>
        </div>
    </header>

    @if (session('status'))
        <div class="mx-auto max-w-6xl px-6 mt-6">
            <div class="hairline px-4 py-3 text-sm">{{ session('status') }}</div>
        </div>
    @endif

    <main class="mx-auto max-w-6xl px-6 py-12">
        @yield('content')
    </main>

    <footer class="mx-auto max-w-6xl px-6 py-10 text-xs text-neutral-500">
        © {{ date('Y') }} {{ __('Spaid — employer wellness for parents of neurodivergent children.') }}
    </footer>
</body>
</html>
