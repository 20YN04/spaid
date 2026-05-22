<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="bg-alabaster text-ink antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Spaid')</title>
    <meta name="description" content="@yield('description', __('Spaid — employer wellness for parents of neurodivergent children.'))">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet"
          href="https://fonts.bunny.net/css?family=fraunces:400,500,600,700|space-grotesk:300,400,500,600,700&display=swap">

    {{-- IMPORTANT: tailwind.config MUST execute before the CDN script processes the DOM --}}
    <script>
        window.tailwind = window.tailwind || {};
        window.tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        alabaster:'#F1ECDF', whisper:'#E5DDC8', ink:'#162320', slate:'#3F4A52',
                        sage: { 50:'#E7EEE7',100:'#D2DED2',200:'#B4C7B7',300:'#92AE96',400:'#789578',500:'#5E7B5F',600:'#476048',700:'#374B38',800:'#283827',900:'#1A2419' },
                        tallow:{ 100:'#F0E2C0',300:'#E0C68C',500:'#CFAB66',700:'#B0884A',900:'#7C5E2F' },
                        clay:   { 300:'#E1B79C', 500:'#C99876', 700:'#A47855' },
                    },
                    fontFamily: { serif:['Fraunces','ui-serif','Georgia','serif'], sans:['Space Grotesk','ui-sans-serif','system-ui'] },
                    fontSize: {
                        hero:['clamp(3rem, 7vw, 6.25rem)',{lineHeight:'0.95',letterSpacing:'-0.02em'}],
                        h1:['clamp(2.25rem, 4.5vw, 3.75rem)',{lineHeight:'1.02',letterSpacing:'-0.018em'}],
                        h2:['clamp(1.75rem, 3vw, 2.5rem)',{lineHeight:'1.08',letterSpacing:'-0.012em'}],
                    },
                    boxShadow: { sanctuary:'0 30px 60px -30px rgba(27,36,32,0.25)', whisper:'0 1px 0 rgba(27,36,32,0.06), 0 14px 32px -18px rgba(27,36,32,0.18)' },
                    backgroundImage: {
                        noise: "url(\"data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'><filter id='n'><feTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='2' stitchTiles='stitch'/><feColorMatrix values='0 0 0 0 0.107 0 0 0 0 0.141 0 0 0 0 0.125 0 0 0 0.18 0'/></filter><rect width='100%' height='100%' filter='url(%23n)'/></svg>\")",
                        'sanctuary-gradient':'radial-gradient(120% 80% at 80% 0%, rgba(214,190,155,0.22) 0%, rgba(214,190,155,0) 60%), radial-gradient(80% 60% at 0% 100%, rgba(143,166,148,0.22) 0%, rgba(143,166,148,0) 60%)',
                    },
                    keyframes: {
                        rise: { '0%':{opacity:'0',transform:'translateY(28px)'}, '100%':{opacity:'1',transform:'translateY(0)'} },
                        ambient: { '0%,100%':{transform:'translate3d(0,0,0) scale(1)'}, '50%':{transform:'translate3d(0,-10px,0) scale(1.03)'} },
                        sheen: { '0%':{backgroundPosition:'200% 50%'}, '100%':{backgroundPosition:'-200% 50%'} },
                    },
                    animation: { rise:'rise 1s cubic-bezier(0.22,1,0.36,1) both', ambient:'ambient 14s ease-in-out infinite', sheen:'sheen 8s linear infinite' },
                },
            },
        };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root{--alabaster:#F1ECDF;--whisper:#E5DDC8;--ink:#162320;--sage-300:#92AE96;--sage-500:#5E7B5F;--sage-600:#476048;--sage-700:#374B38;--sage-800:#283827;--tallow-300:#E0C68C;--tallow-500:#CFAB66;--tallow-700:#B0884A;--clay-500:#C99876;}
        *{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;}
        body{font-family:'Space Grotesk',ui-sans-serif,system-ui;background:var(--alabaster);color:var(--ink);background-image:radial-gradient(120% 60% at 80% 0%, rgba(207,171,102,0.18) 0%, transparent 55%),radial-gradient(80% 60% at 0% 100%, rgba(94,123,95,0.20) 0%, transparent 60%);background-attachment:fixed;}
        .font-serif{font-family:'Fraunces',ui-serif,serif;font-optical-sizing:auto;}
        ::selection{background:var(--ink);color:var(--alabaster);}
        [data-reveal]{opacity:0;transform:translateY(28px);transition:opacity 1.1s cubic-bezier(0.22,1,0.36,1),transform 1.1s cubic-bezier(0.22,1,0.36,1);will-change:opacity,transform;}
        [data-reveal].is-in-view{opacity:1;transform:translateY(0);}
        @media (prefers-reduced-motion:reduce){[data-reveal]{opacity:1;transform:none;transition:none;}}
        .eyebrow{font-size:0.72rem;font-weight:700;letter-spacing:0.22em;text-transform:uppercase;color:var(--sage-700);}
        .btn{position:relative;display:inline-flex;align-items:center;gap:0.65rem;padding:0.95rem 1.4rem;font-weight:600;font-size:0.92rem;border-radius:999px;transition:transform .35s cubic-bezier(0.22,1,0.36,1),background .35s,color .35s,box-shadow .35s;will-change:transform;}
        .btn:hover{transform:translateY(-2px);}.btn:active{transform:translateY(0);}
        .btn-primary{background:var(--ink);color:var(--alabaster);box-shadow:0 16px 36px -18px rgba(27,36,32,0.55);}
        .btn-primary:hover{background:var(--sage-800);box-shadow:0 22px 44px -16px rgba(27,36,32,0.5);}
        .btn-primary:disabled{background:#C9CCC8;color:var(--alabaster);cursor:not-allowed;box-shadow:none;transform:none;}
        .btn-ghost{background:transparent;color:var(--ink);border:1px solid rgba(27,36,32,0.2);}
        .btn-ghost:hover{background:var(--ink);color:var(--alabaster);border-color:var(--ink);}
        .btn-tallow{background:var(--tallow);color:var(--ink);}.btn-tallow:hover{background:#C7A77E;}
        .field{width:100%;background:transparent;border:0;border-bottom:1px solid rgba(27,36,32,0.25);padding:0.85rem 0.1rem;font-size:1rem;font-family:inherit;color:var(--ink);transition:border-color .3s,background .3s;}
        .field:focus{outline:none;border-color:var(--ink);background:rgba(27,36,32,0.04);}
        .field-label{display:block;margin-bottom:0.25rem;}
        .field-label > span{display:block;font-size:0.72rem;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;color:var(--sage-600);}
        .card{background:#FAF4E4;border:1px solid rgba(71,96,72,0.18);border-radius:1.25rem;padding:1.75rem;transition:transform .5s cubic-bezier(0.22,1,0.36,1),box-shadow .5s,border-color .5s,background .5s;}
        .card:hover{transform:translateY(-4px);box-shadow:0 30px 60px -30px rgba(22,35,32,0.25);border-color:var(--sage-500);background:#F7EFD9;}
        .link-underline{position:relative;display:inline-flex;align-items:center;gap:0.4rem;font-weight:500;}
        .link-underline::after{content:"";position:absolute;bottom:-2px;left:0;width:100%;height:1px;background:currentColor;transform-origin:left;transform:scaleX(1);transition:transform .6s cubic-bezier(0.22,1,0.36,1);}
        .link-underline:hover::after{transform-origin:right;transform:scaleX(0);}
        .lang-pill{font-size:0.7rem;font-weight:600;letter-spacing:0.18em;text-transform:uppercase;padding:0.35rem 0.75rem;border-radius:999px;border:1px solid transparent;color:rgba(27,36,32,0.5);transition:color .3s,background .3s,border-color .3s;}
        .lang-pill:hover{color:var(--ink);}.lang-pill.active{background:var(--ink);color:var(--alabaster);border-color:var(--ink);}
        .nav-link{position:relative;font-size:0.9rem;font-weight:500;color:rgba(27,36,32,0.78);transition:color .3s;}
        .nav-link:hover{color:var(--ink);}.nav-link.active{color:var(--ink);}
        .nav-link.active::before{content:"";position:absolute;top:50%;left:-0.85rem;width:0.35rem;height:0.35rem;border-radius:999px;background:var(--tallow);transform:translateY(-50%);}
        @media (hover:hover) and (pointer:fine){
            html,body{cursor:none;} a,button,[role="button"],input,textarea,select,label{cursor:none;}
            .cursor-dot{position:fixed;top:0;left:0;width:8px;height:8px;border-radius:999px;background:var(--ink);pointer-events:none;z-index:100;transform:translate(-50%,-50%);transition:width .2s,height .2s;}
            .cursor-ring{position:fixed;top:0;left:0;width:40px;height:40px;border-radius:999px;border:1px solid rgba(27,36,32,0.4);pointer-events:none;z-index:99;transform:translate(-50%,-50%);transition:width .35s,height .35s,border-color .35s,background .35s;}
            .cursor-active .cursor-dot{width:0;height:0;}
            .cursor-active .cursor-ring{width:64px;height:64px;background:rgba(27,36,32,0.06);border-color:var(--ink);}
        }
        .blob{position:absolute;border-radius:50%;filter:blur(48px);opacity:0.9;pointer-events:none;mix-blend-mode:multiply;}
        #cookie-banner{position:fixed;bottom:1.25rem;left:1.25rem;right:1.25rem;z-index:60;background:rgba(27,36,32,0.96);color:var(--alabaster);padding:1.3rem 1.5rem;max-width:56rem;margin:0 auto;border-radius:1.25rem;backdrop-filter:blur(8px);display:none;box-shadow:0 30px 80px -20px rgba(27,36,32,0.45);}
        #cookie-banner.is-visible{display:flex;flex-direction:column;gap:0.85rem;}
        @media (min-width:640px){#cookie-banner.is-visible{flex-direction:row;align-items:center;justify-content:space-between;gap:1.5rem;}}
        #cookie-banner button{font-weight:600;padding:0.65rem 1.1rem;font-size:0.85rem;border-radius:999px;}
        #cookie-banner .accept{background:var(--alabaster);color:var(--ink);}
        #cookie-banner .reject{background:transparent;color:var(--alabaster);border:1px solid rgba(245,242,236,0.4);}
        #cookie-banner a{color:var(--tallow);text-decoration:underline;text-underline-offset:0.25rem;}
    </style>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="min-h-screen flex flex-col font-sans">

    <div class="cursor-dot" aria-hidden="true"></div>
    <div class="cursor-ring" aria-hidden="true"></div>

    <header class="sticky top-0 z-40 backdrop-blur-md bg-alabaster/85 border-b border-sage-700/15">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-5 flex items-center justify-between gap-6">
            <a href="{{ route('home') }}" class="flex items-baseline gap-1 group">
                <span class="font-serif text-2xl font-medium tracking-tight text-ink">spaid</span>
                <span class="w-1.5 h-1.5 rounded-full bg-tallow-500 mt-0.5 group-hover:bg-sage-500 transition-colors"></span>
            </a>

            <nav class="flex items-center gap-8">
                <div class="hidden md:flex items-center gap-7">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">{{ __('Home') }}</a>
                    <a href="{{ route('programmas.index') }}" class="nav-link {{ request()->routeIs('programmas.index') ? 'active' : '' }}">{{ __("Programma's") }}</a>
                    <a href="{{ route('contact.show') }}" class="nav-link {{ request()->routeIs('contact.*') ? 'active' : '' }}">{{ __('Contact') }}</a>
                </div>

                @php $current = app()->getLocale(); $supported = config('app.supported_locales', ['nl','fr']); @endphp
                <div class="flex items-center gap-1">
                    @foreach ($supported as $loc)
                        <a href="{{ route('locale.switch', ['locale' => $loc]) }}" class="lang-pill {{ $loc === $current ? 'active' : '' }}" hreflang="{{ $loc }}">{{ strtoupper($loc) }}</a>
                    @endforeach
                </div>

                @auth
                    <a href="{{ route('dashboard') }}" class="nav-link hidden sm:inline {{ request()->routeIs('dashboard') ? 'active' : '' }}">{{ __('Dashboard') }}</a>
                    <form method="POST" action="{{ route('logout') }}" class="hidden sm:block">
                        @csrf
                        <button type="submit" class="link-underline text-sm">{{ __('Logout') }}</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-ghost hidden sm:inline-flex">{{ __('Sign in') }}</a>
                @endauth
            </nav>
        </div>
    </header>

    @if (session('status'))
        <div class="mx-auto max-w-7xl px-6 lg:px-10 mt-6" data-reveal>
            <div class="rounded-2xl bg-sage-50 border border-sage-200 px-5 py-3 text-sm text-sage-800 shadow-whisper">{{ session('status') }}</div>
        </div>
    @endif

    <main class="flex-1 relative">
        @hasSection('full-bleed')
            @yield('full-bleed')
        @else
            <div class="mx-auto max-w-7xl px-6 lg:px-10 py-20">@yield('content')</div>
        @endif
    </main>

    <footer class="relative mt-24 bg-ink text-alabaster overflow-hidden">
        <div class="absolute inset-0 bg-sanctuary-gradient opacity-40 pointer-events-none"></div>
        <div class="relative mx-auto max-w-7xl px-6 lg:px-10 py-20 grid grid-cols-1 md:grid-cols-12 gap-12">
            <div class="md:col-span-5 space-y-5">
                <p class="font-serif text-4xl">spaid.</p>
                <p class="text-sm leading-relaxed text-alabaster/75 max-w-sm">{{ __('A sanctuary for working parents of neurodivergent children — embedded in the employee benefits stack.') }}</p>
                <a href="mailto:office@spaid.be" class="link-underline text-tallow-300">office@spaid.be</a>
            </div>
            <div class="md:col-span-4 space-y-3">
                <p class="eyebrow text-tallow-300">{{ __('Legal') }}</p>
                <ul class="space-y-2 text-sm text-alabaster/85">
                    <li><a href="{{ route('legal.privacy') }}" class="link-underline">{{ __('Privacy policy') }}</a></li>
                    <li><a href="{{ route('legal.terms') }}" class="link-underline">{{ __('Terms & conditions') }}</a></li>
                    <li><a href="{{ route('legal.cookies') }}" class="link-underline">{{ __('Cookie policy') }}</a></li>
                    <li><a href="{{ route('legal.accessibility') }}" class="link-underline">{{ __('Accessibility statement') }}</a></li>
                </ul>
            </div>
            <div class="md:col-span-3 space-y-3 text-sm text-alabaster/75">
                <p class="eyebrow text-tallow-300">Spaid BV</p>
                <p>{{ __('Registered office: Leuven, Belgium') }}</p>
                <p>BTW BE 0000.000.000</p>
                <p>KBO 0000.000.000</p>
            </div>
        </div>
        <div class="relative border-t border-alabaster/10">
            <div class="mx-auto max-w-7xl px-6 lg:px-10 py-6 flex flex-col sm:flex-row gap-2 justify-between text-xs text-alabaster/55">
                <span>© {{ date('Y') }} Spaid — {{ __('All rights reserved.') }}</span>
                <span>{{ __('Designed in Leuven, served from the EU.') }}</span>
            </div>
        </div>
    </footer>

    <div id="cookie-banner" role="dialog" aria-live="polite" aria-label="{{ __('Cookie consent') }}">
        <div class="text-sm leading-relaxed sm:flex-1">
            <p class="font-serif text-lg mb-1">{{ __('We respect your privacy.') }}</p>
            <p class="text-alabaster/85">
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
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((e) => { if (e.isIntersecting) { e.target.classList.add('is-in-view'); observer.unobserve(e.target); } });
            }, { threshold: 0.12, rootMargin: '0px 0px -10% 0px' });
            document.querySelectorAll('[data-reveal]').forEach(el => observer.observe(el));

            const fineCursor = window.matchMedia('(hover: hover) and (pointer: fine)').matches;
            if (!fineCursor) return;
            const dot = document.querySelector('.cursor-dot'); const ring = document.querySelector('.cursor-ring');
            if (!dot || !ring) return;
            let mouseX = innerWidth/2, mouseY = innerHeight/2, ringX = mouseX, ringY = mouseY;
            addEventListener('mousemove', (e) => { mouseX=e.clientX; mouseY=e.clientY; dot.style.top=mouseY+'px'; dot.style.left=mouseX+'px'; });
            (function loop(){ ringX+=(mouseX-ringX)*0.18; ringY+=(mouseY-ringY)*0.18; ring.style.top=ringY+'px'; ring.style.left=ringX+'px'; requestAnimationFrame(loop); })();
            const act=()=>document.body.classList.add('cursor-active'); const deact=()=>document.body.classList.remove('cursor-active');
            ['a','button','[role="button"]','input','textarea','select','label','[data-magnetic]'].forEach(sel => {
                document.querySelectorAll(sel).forEach(el => { el.addEventListener('mouseenter', act); el.addEventListener('mouseleave', deact); });
            });
            document.querySelectorAll('[data-magnetic]').forEach(el => {
                el.addEventListener('mousemove', (e) => { const r=el.getBoundingClientRect(); const x=e.clientX-r.left-r.width/2; const y=e.clientY-r.top-r.height/2; el.style.transform=`translate(${x*0.18}px, ${y*0.25}px)`; });
                el.addEventListener('mouseleave', () => { el.style.transform=''; });
            });
        })();
        (function () {
            const COOKIE_NAME = 'cookie_consent'; const banner = document.getElementById('cookie-banner');
            if (!banner) return;
            const has = document.cookie.split('; ').some(c => c.startsWith(COOKIE_NAME + '='));
            if (!has) banner.classList.add('is-visible');
            banner.querySelectorAll('[data-consent]').forEach(btn => {
                btn.addEventListener('click', () => { document.cookie = `${COOKIE_NAME}=${btn.dataset.consent}; max-age=${60*60*24*365}; path=/; samesite=lax`; banner.classList.remove('is-visible'); });
            });
        })();
    </script>
</body>
</html>
