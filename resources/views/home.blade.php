@extends('layouts.app')

@section('title', __('Mentally stronger, professionally more powerful.'))
@section('description', __('Spaid is a B2B wellness platform for parents of neurodivergent children, embedded in the employee benefits stack.'))

@section('full-bleed')
    {{-- ════════ HERO ════════ --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-tallow-100 via-alabaster to-sage-100">
        <div class="blob bg-tallow-500 w-[42rem] h-[42rem] -top-40 -right-40 animate-ambient" style="opacity:.6"></div>
        <div class="blob bg-sage-400 w-[36rem] h-[36rem] -bottom-60 -left-40 animate-ambient" style="animation-delay:-7s;opacity:.5"></div>
        <div class="blob bg-clay-500 w-[28rem] h-[28rem] top-1/3 right-1/4 animate-ambient" style="animation-delay:-3s;opacity:.3"></div>
        <div class="absolute inset-0 bg-noise opacity-[0.35] mix-blend-multiply pointer-events-none"></div>

        <div class="relative mx-auto max-w-7xl px-6 lg:px-10 pt-20 pb-28">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-end">
                <div class="lg:col-span-8 space-y-7" data-reveal>
                    <p class="eyebrow">{{ __('For parents · paid by employers · KU Leuven backed') }}</p>
                    <h1 class="font-serif text-hero font-medium text-ink">
                        {{ __('You raise the child.') }}<br>
                        <span class="italic text-sage-700">{{ __("We'll help carry") }}</span>
                        {{ __('the load.') }}
                    </h1>
                    <p class="text-lg md:text-xl text-ink/75 leading-relaxed max-w-2xl">
                        {{ __('Spaid matches you with a psychologist who actually specializes in your child\'s diagnosis. No waiting lists, no insurance maze, no judgment.') }}
                    </p>

                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <a href="{{ route('register') }}" class="btn btn-primary" data-magnetic>
                            {{ __('Start your triage') }}
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                        </a>
                        <a href="{{ route('programmas.index') }}" class="btn btn-ghost">{{ __('See the five pathways') }}</a>
                    </div>

                    {{-- Trust pills --}}
                    <div class="flex flex-wrap items-center gap-2 pt-6 text-xs">
                        @foreach ([
                            __('Free for employees'),
                            __('Private from your employer'),
                            __('EU-hosted, GDPR'),
                            __('Belgian clinicians'),
                        ] as $pill)
                            <span class="inline-flex items-center gap-2 rounded-full bg-alabaster/70 backdrop-blur border border-sage-700/20 px-3 py-1.5 text-ink/80">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" class="text-sage-600"><polyline points="20 6 9 17 4 12"/></svg>
                                {{ $pill }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <div class="lg:col-span-4 space-y-6" data-reveal style="transition-delay:.15s">
                    <div class="relative rounded-3xl overflow-hidden p-8 bg-ink text-alabaster shadow-sanctuary">
                        <div class="blob bg-tallow-700 w-44 h-44 -top-10 -right-10 opacity-50"></div>
                        <p class="eyebrow text-tallow-300 relative">{{ __('You are not alone') }}</p>
                        <p class="font-serif text-3xl mt-3 leading-snug relative">
                            {{ __('1 in 5 school-age children carries a learning or neurodevelopmental diagnosis.') }}
                        </p>
                        <p class="text-xs text-alabaster/65 mt-4 relative">{{ __('Source: KU Leuven Psychology & Educational Sciences') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ════════ HOW IT WORKS ════════ --}}
    <section class="relative bg-alabaster">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-24">
            <div class="max-w-2xl mb-12" data-reveal>
                <p class="eyebrow">{{ __('How it works') }}</p>
                <h2 class="font-serif text-h1 leading-tight mt-3">
                    {{ __('Three quiet steps,') }} <em class="text-sage-700">{{ __('then a real person.') }}</em>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @foreach ([
                    ['01', __('Triage'),  __('Three short questions about your child. Two minutes, total.'), 'sage'],
                    ['02', __('Match'),   __('We surface psychologists whose specialty is exactly your situation.'), 'tallow'],
                    ['03', __('Connect'), __('Book a slot that fits your calendar. Online or in-person.'), 'clay'],
                ] as $i => [$num, $title, $body, $accent])
                    <div class="card relative overflow-hidden" data-reveal style="transition-delay:{{ $i * 0.1 }}s">
                        <span class="absolute -top-12 -right-12 w-40 h-40 rounded-full blur-2xl opacity-70
                            {{ $accent === 'tallow' ? 'bg-tallow-500' : ($accent === 'clay' ? 'bg-clay-500' : 'bg-sage-400') }}"></span>
                        <p class="eyebrow relative">{{ $num }}</p>
                        <p class="font-serif text-3xl mt-3 text-ink relative">{{ $title }}</p>
                        <p class="text-ink/75 mt-2 leading-relaxed relative">{{ $body }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ════════ FIVE PATHWAYS — DARK ACCENT ════════ --}}
    <section class="border-y border-sage-700/25 bg-sage-700 text-alabaster">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-12 flex flex-wrap items-center justify-between gap-6">
            <p class="eyebrow text-tallow-300">{{ __('Five clinical pathways') }}</p>
            <div class="flex flex-wrap items-center gap-x-10 gap-y-3 font-serif text-2xl text-alabaster/95">
                @foreach ($issueTypes as $issue)
                    <span class="flex items-center gap-3">
                        <span class="block w-1.5 h-1.5 rounded-full bg-tallow-500"></span>
                        {{ $issue->label() }}
                    </span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ════════ TESTIMONIAL ════════ --}}
    <section class="relative bg-tallow-100/60">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-28">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7" data-reveal>
                    <svg viewBox="0 0 60 50" class="w-10 h-10 text-sage-600 mb-6" aria-hidden="true">
                        <text x="0" y="48" font-family="Fraunces" font-size="72" font-style="italic" fill="currentColor">"</text>
                    </svg>
                    <blockquote class="font-serif text-3xl md:text-4xl text-ink leading-tight">
                        {{ __('For the first time since the diagnosis, I felt like someone actually understood — not just the clinical side, but the work, the school calls, the guilt.') }}
                    </blockquote>
                    <footer class="mt-8 flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-clay-500 to-tallow-500 flex items-center justify-center text-alabaster font-serif text-lg">M</div>
                        <div>
                            <p class="font-medium">Marie · {{ __('parent of a 9-year-old with ADHD') }}</p>
                            <p class="text-sm text-ink/60">{{ __('via her employer Elias Group') }}</p>
                        </div>
                    </footer>
                </div>

                <div class="lg:col-span-5" data-reveal style="transition-delay:.1s">
                    <div class="grid grid-cols-2 gap-4">
                        @foreach ([
                            ['92%', __('felt heard in the first session')],
                            ['<48h', __('average match-to-booking time')],
                            ['100%', __('private from the employer')],
                            ['€0',  __('out-of-pocket cost')],
                        ] as [$stat, $label])
                            <div class="card text-center py-8">
                                <p class="font-serif text-4xl text-sage-700">{{ $stat }}</p>
                                <p class="text-xs text-ink/65 mt-2 leading-snug">{{ $label }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ════════ WHY THROUGH EMPLOYER ════════ --}}
    <section class="relative bg-alabaster">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-28">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <div class="lg:col-span-4 space-y-5" data-reveal>
                    <p class="eyebrow">{{ __('Why through the employer?') }}</p>
                    <h2 class="font-serif text-h1 leading-tight text-ink">
                        {{ __('Because help should arrive') }} <em class="text-sage-700">{{ __('before the burnout') }}</em>.
                    </h2>
                    <p class="text-ink/75 leading-relaxed max-w-md">
                        {{ __('When Spaid sits inside the benefits stack, parents activate it the moment they need it — no extra contracts, no out-of-pocket cost, no awkward conversation with HR.') }}
                    </p>
                </div>
                <div class="lg:col-span-8 grid grid-cols-1 sm:grid-cols-3 gap-5">
                    @foreach ([
                        ['01', __('A reason to stay'), __('Spaid is the kind of benefit parents quietly remember.'), 'sage'],
                        ['02', __('Care, not perks'),  __('Real clinical help when life gets heavy — not a smoothie bar.'), 'tallow'],
                        ['03', __('Fewer empty desks'),__('Proactive care drops absenteeism and unwanted exits.'), 'clay'],
                    ] as $i => [$num, $title, $body, $accent])
                        <div class="card relative overflow-hidden" data-reveal style="transition-delay:{{ $i * 0.1 }}s">
                            <span class="absolute top-0 right-0 w-32 h-32 rounded-full -mr-12 -mt-12 blur-2xl opacity-80
                                {{ $accent === 'tallow' ? 'bg-tallow-500' : ($accent === 'clay' ? 'bg-clay-500' : 'bg-sage-400') }}"></span>
                            <p class="eyebrow">{{ $num }}</p>
                            <p class="font-serif text-xl mt-3 text-ink">{{ $title }}</p>
                            <p class="text-sm text-ink/75 mt-2 leading-relaxed">{{ $body }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ════════ FOR WHOM ════════ --}}
    <section class="relative bg-gradient-to-br from-sage-800 via-sage-700 to-ink text-alabaster overflow-hidden">
        <div class="blob bg-tallow-500 w-[28rem] h-[28rem] top-0 left-1/3 opacity-25 animate-ambient" style="animation-delay:-5s"></div>
        <div class="relative mx-auto max-w-7xl px-6 lg:px-10 py-28">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-5 space-y-6" data-reveal>
                    <p class="eyebrow text-tallow-300">{{ __('Who is Spaid for?') }}</p>
                    <h2 class="font-serif text-h1 leading-tight">
                        {{ __('For the parent juggling') }} <em class="text-tallow-300">{{ __('school calls, work calls, and dinner') }}</em>.
                    </h2>
                    <p class="text-alabaster/80 leading-relaxed max-w-md">
                        {{ __('Five pathways for kids aged 5–18 with a clinical diagnosis. Each one routes you to a clinician who has actually worked with families like yours.') }}
                    </p>
                </div>

                <div class="lg:col-span-7 grid grid-cols-2 md:grid-cols-3 gap-3" data-reveal style="transition-delay:.15s">
                    @foreach ($issueTypes as $issue)
                        <div class="group relative p-6 border border-alabaster/15 rounded-2xl hover:bg-alabaster/8 hover:border-tallow-500/60 transition-all">
                            <span class="block w-1.5 h-1.5 rounded-full bg-tallow-500 mb-4 group-hover:scale-150 transition-transform"></span>
                            <p class="font-serif text-2xl">{{ $issue->label() }}</p>
                            <p class="text-[0.7rem] uppercase tracking-widest text-alabaster/40 mt-2">{{ strtoupper($issue->value) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ════════ TEAM ════════ --}}
    <section class="relative bg-alabaster">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-28">
            <div class="max-w-3xl mb-12" data-reveal>
                <p class="eyebrow">{{ __('The people behind Spaid') }}</p>
                <h2 class="font-serif text-h1 leading-tight mt-3">
                    {{ __('Clinicians who became founders.') }} <em class="text-sage-700">{{ __('Parents who became operators.') }}</em>
                </h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                @foreach ([
                    ['Ria',     __('Coach & co-founder'), __('Coaches working parents through the school years. Mother of three.'),    'sage'],
                    ['Martine', __('Clinical lead'),     __('Physician building care pathways with the KU Leuven faculty.'),          'tallow'],
                    ['Marc',    __('Operations'),         __('Runs the business so the clinicians can stay in the room.'),             'clay'],
                ] as $i => [$name, $title, $body, $accent])
                    <article class="card group" data-reveal style="transition-delay:{{ $i * 0.1 }}s">
                        <div class="aspect-[5/6] rounded-2xl mb-5 flex items-end p-6 relative overflow-hidden
                            {{ $accent === 'tallow' ? 'bg-gradient-to-br from-tallow-300 to-tallow-700' : ($accent === 'clay' ? 'bg-gradient-to-br from-clay-300 to-clay-700' : 'bg-gradient-to-br from-sage-300 to-sage-700') }}">
                            <div class="absolute inset-0 bg-noise opacity-25 mix-blend-multiply"></div>
                            <span class="relative font-serif text-[7rem] leading-none text-alabaster/90 italic">{{ substr($name, 0, 1) }}</span>
                        </div>
                        <p class="font-serif text-2xl text-ink">{{ $name }}</p>
                        <p class="eyebrow mt-1">{{ $title }}</p>
                        <p class="text-sm text-ink/75 mt-3 leading-relaxed">{{ $body }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ════════ KU LEUVEN ════════ --}}
    <section class="bg-sage-100 border-y border-sage-700/25">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-20 grid grid-cols-1 md:grid-cols-12 gap-12 items-center">
            <div class="md:col-span-7 space-y-4" data-reveal>
                <p class="eyebrow">{{ __('Scientific partnership') }}</p>
                <h2 class="font-serif text-h2 leading-tight text-ink">
                    {{ __('Built with the people who teach the next generation of psychologists.') }}
                </h2>
                <p class="text-ink/75 leading-relaxed max-w-xl">
                    {{ __('Every pathway is co-designed with KU Leuven faculty of Psychology & Educational Sciences. In collaboration with Prof. Dr. Dieter Baeyens and Prof. Dr. Karla Van Leeuwen.') }}
                </p>
            </div>
            <div class="md:col-span-5" data-reveal style="transition-delay:.1s">
                <div class="card text-center bg-ink text-alabaster border-ink shadow-sanctuary py-10">
                    <p class="eyebrow text-tallow-300">KU Leuven</p>
                    <p class="font-serif text-3xl mt-3">{{ __('Psychology & Educational Sciences') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ════════ B2B CTA ════════ --}}
    <section class="relative bg-alabaster">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-28">
            <div class="relative rounded-3xl overflow-hidden p-12 md:p-20 bg-gradient-to-br from-sage-700 to-ink text-alabaster shadow-sanctuary" data-reveal>
                <div class="blob bg-tallow-500 w-[28rem] h-[28rem] -top-20 -right-20 opacity-30 animate-ambient"></div>
                <div class="relative grid grid-cols-1 md:grid-cols-12 gap-10 items-end">
                    <div class="md:col-span-8 space-y-5">
                        <p class="eyebrow text-tallow-300">{{ __('For HR & people teams') }}</p>
                        <h2 class="font-serif text-h1 leading-tight max-w-2xl">
                            {{ __('Some of your people are quietly drowning.') }} <em class="text-tallow-300">{{ __('Spaid is how you reach them.') }}</em>
                        </h2>
                        <p class="text-alabaster/80 leading-relaxed max-w-lg">
                            {{ __('Thirty minutes. We map your workforce, scope a pilot, and answer every clinical question. No deck, no obligation.') }}
                        </p>
                    </div>
                    <div class="md:col-span-4 flex flex-col items-start md:items-end gap-3">
                        <a href="{{ route('contact.show') }}" class="btn btn-tallow" data-magnetic>
                            {{ __('Book a 30-min call') }}
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                        </a>
                        <a href="mailto:office@spaid.be" class="link-underline text-tallow-300 text-sm">office@spaid.be</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
