@extends('layouts.app')

@section('title', __('Mentally stronger, professionally more powerful.'))
@section('description', __('Spaid is a B2B wellness platform for parents of neurodivergent children, embedded in the employee benefits stack.'))

@section('full-bleed')
    {{-- ════════ HERO ════════ --}}
    <section class="relative overflow-hidden">
        <div class="blob bg-tallow-500 w-[44rem] h-[44rem] -top-44 -right-44 animate-ambient" style="opacity:.62"></div>
        <div class="blob bg-sage-400 w-[38rem] h-[38rem] -bottom-64 -left-44 animate-ambient" style="animation-delay:-7s;opacity:.52"></div>
        <div class="blob bg-clay-500 w-[28rem] h-[28rem] top-1/3 right-1/4 animate-ambient" style="animation-delay:-3s;opacity:.30"></div>
        <div class="absolute inset-0 bg-noise opacity-[0.4] mix-blend-multiply pointer-events-none"></div>

        <div class="relative mx-auto max-w-7xl px-6 lg:px-10 pt-16 lg:pt-24 pb-20 lg:pb-28">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-end">
                <div class="lg:col-span-8 space-y-7" data-reveal>
                    <p class="kicker">{{ __('For parents, paid by employers, backed by KU Leuven.') }}</p>

                    {{-- Display hero — committed serif headline with one italic word --}}
                    <h1 class="font-serif text-hero font-normal text-ink">
                        {{ __('You raise the child.') }}<br>
                        <em class="text-sage-700 font-serif">{{ __("We'll help carry") }}</em>
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

                    {{-- Trust pills — sub-CTA reassurance --}}
                    <div class="flex flex-wrap items-center gap-2 pt-6 text-xs">
                        @foreach ([
                            __('Free for employees'),
                            __('Private from your employer'),
                            __('EU-hosted, GDPR'),
                            __('Belgian clinicians'),
                        ] as $pill)
                            <span class="inline-flex items-center gap-2 rounded-full bg-alabaster/70 backdrop-blur border border-sage-700/25 px-3 py-1.5 text-ink/80">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" class="text-sage-600"><polyline points="20 6 9 17 4 12"/></svg>
                                {{ $pill }}
                            </span>
                        @endforeach
                    </div>
                </div>

                {{-- Hero side: illustration sourced from spaid.be original site + stat ribbon --}}
                <div class="lg:col-span-4 space-y-4" data-reveal style="transition-delay:.15s">
                    <div class="relative rounded-3xl overflow-hidden bg-sage-100 aspect-square">
                        <img src="/img/spaid/hero.png" alt="{{ __('Illustration: a parent in thought, surrounded by leaves and questions.') }}"
                             class="w-full h-full object-contain p-4"
                             loading="eager" decoding="async">
                    </div>
                    <div class="relative rounded-2xl bg-ink text-alabaster p-5 shadow-sanctuary">
                        <p class="kicker text-tallow-300">{{ __('You are not alone') }}</p>
                        <p class="font-serif text-2xl leading-snug mt-2">
                            <span class="font-light italic text-tallow-300">1<span class="not-italic text-alabaster/55">/</span>5</span>
                            <span class="text-alabaster/95">{{ __('school-age children carries a diagnosis.') }}</span>
                        </p>
                        <p class="text-[0.7rem] text-alabaster/55 mt-2 italic font-serif">{{ __('Source: KU Leuven Psychology & Educational Sciences') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ════════ HOW IT WORKS — flowing numerals, NOT cards ════════ --}}
    <section class="relative bg-alabaster">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-24 lg:py-32">
            <div class="max-w-3xl mb-20" data-reveal>
                <p class="kicker">{{ __('How it works') }}</p>
                <h2 class="font-serif text-display font-normal leading-[0.92] mt-2 text-ink">
                    {{ __('Three quiet steps,') }}<br>
                    <em class="text-sage-700">{{ __('then a real person.') }}</em>
                </h2>
            </div>

            <ol class="space-y-0 -mt-4">
                @foreach ([
                    [__('Triage'),   __('Three short questions about your child. Two minutes, total. Your answers stay between you and your clinician.')],
                    [__('Match'),    __('We surface psychologists whose specialty is exactly your situation. Names, faces, training — no anonymous matching.')],
                    [__('Connect'),  __('Book a slot that fits your calendar. Online or in-person, in Leuven, Antwerp, Brussels or Ghent.')],
                ] as $i => [$title, $body])
                    <li class="rule-h"></li>
                    <li class="grid grid-cols-12 gap-8 lg:gap-12 py-12 items-start" data-reveal style="transition-delay:{{ $i * 0.1 }}s">
                        <div class="col-span-3 lg:col-span-2">
                            <span class="numeral">0{{ $i + 1 }}</span>
                        </div>
                        <div class="col-span-9 lg:col-span-4">
                            <h3 class="font-serif text-3xl lg:text-4xl text-ink leading-tight">{{ $title }}</h3>
                        </div>
                        <div class="col-span-12 lg:col-span-6 lg:pt-3">
                            <p class="text-ink/75 leading-relaxed text-lg">{{ $body }}</p>
                        </div>
                    </li>
                @endforeach
                <li class="rule-h"></li>
            </ol>
        </div>
    </section>

    {{-- ════════ PATHWAYS RIBBON — committed sage band ════════ --}}
    <section class="relative bg-sage-700 text-alabaster overflow-hidden">
        <div class="absolute inset-0 bg-noise opacity-25 mix-blend-overlay pointer-events-none"></div>
        <div class="relative mx-auto max-w-7xl px-6 lg:px-10 py-16 lg:py-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                <div class="lg:col-span-4" data-reveal>
                    <p class="kicker text-tallow-300">{{ __('The five pathways') }}</p>
                    <p class="font-serif text-h1 leading-tight mt-2">{{ __('One program. Five clinical doors.') }}</p>
                </div>
                <div class="lg:col-span-8 grid grid-cols-2 md:grid-cols-3 gap-y-6 gap-x-4" data-reveal style="transition-delay:.1s">
                    @foreach ($issueTypes as $i => $issue)
                        <a href="{{ route('register') }}" class="group flex items-baseline gap-3 border-b border-alabaster/15 pb-3 hover:border-tallow-500 transition-colors">
                            <span class="font-serif font-light text-2xl text-tallow-300/85 italic">0{{ $i + 1 }}</span>
                            <span class="font-serif text-2xl leading-tight">{{ $issue->label() }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ════════ TESTIMONIAL — single asymmetric quote, no card grid ════════ --}}
    <section class="relative bg-tallow-100/70">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-24 lg:py-28">
            <div class="grid grid-cols-12 gap-8 lg:gap-12 items-end">
                <div class="col-span-12 lg:col-span-2" data-reveal>
                    <svg viewBox="0 0 50 50" class="w-16 h-16 text-sage-600" aria-hidden="true">
                        <text x="-2" y="48" font-family="Source Serif 4" font-size="80" font-style="italic" fill="currentColor">"</text>
                    </svg>
                </div>
                <blockquote class="col-span-12 lg:col-span-8 font-serif text-3xl md:text-4xl lg:text-5xl text-ink leading-[1.1]" data-reveal style="transition-delay:.05s">
                    {{ __('For the first time since the diagnosis, I felt like someone actually understood, not just the clinical side, but the work, the school calls, the guilt.') }}
                </blockquote>
                <footer class="col-span-12 lg:col-span-10 lg:col-start-3 mt-8 flex items-center gap-4" data-reveal style="transition-delay:.15s">
                    <div class="w-14 h-14 rounded-full bg-gradient-to-br from-clay-500 to-tallow-700 flex items-center justify-center text-alabaster font-serif text-xl italic">M</div>
                    <div>
                        <p class="font-medium text-ink">Marie</p>
                        <p class="text-sm text-ink/60 italic font-serif">{{ __('parent of a 9-year-old with ADHD, via her employer Elias Group') }}</p>
                    </div>
                </footer>
            </div>

            {{-- Inline stat row — typographic, no card boxes --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-y-10 gap-x-8 mt-20 pt-10 border-t border-sage-700/20" data-reveal>
                @foreach ([
                    ['92%',  __('felt heard in the first session')],
                    ['<48h', __('average match-to-booking time')],
                    ['100%', __('private from the employer')],
                    ['€0',   __('out-of-pocket cost')],
                ] as [$stat, $label])
                    <div>
                        <p class="font-serif text-5xl lg:text-6xl text-sage-700 leading-none">{{ $stat }}</p>
                        <p class="text-sm text-ink/65 mt-3 leading-snug max-w-[14ch] italic font-serif">{{ $label }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ════════ WHY THROUGH EMPLOYER — flowing prose, no card grid ════════ --}}
    <section class="relative bg-alabaster">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-24 lg:py-32">
            <div class="grid grid-cols-12 gap-10 lg:gap-16">
                <div class="col-span-12 lg:col-span-5" data-reveal>
                    <h2 class="font-serif text-display font-normal leading-[0.92] text-ink">
                        {{ __('Help should arrive') }} <em class="text-sage-700">{{ __('before the burnout') }}</em>.
                    </h2>
                </div>
                <div class="col-span-12 lg:col-span-7 space-y-12" data-reveal style="transition-delay:.1s">
                    <p class="text-xl text-ink/80 leading-relaxed">
                        {{ __('When Spaid sits inside the benefits stack, parents activate it the moment they need it. No extra contracts, no out-of-pocket cost, no awkward conversation with HR.') }}
                    </p>

                    <dl class="space-y-8">
                        @foreach ([
                            [__('A reason to stay'),  __('Spaid is the kind of benefit parents quietly remember.')],
                            [__('Care, not perks'),   __('Real clinical help when life gets heavy, not a smoothie bar.')],
                            [__('Fewer empty desks'), __('Proactive care drops absenteeism and unwanted exits.')],
                        ] as $i => [$title, $body])
                            <div class="grid grid-cols-12 gap-4 items-baseline">
                                <dt class="col-span-1 font-serif font-light text-2xl text-tallow-700 italic">0{{ $i + 1 }}</dt>
                                <div class="col-span-11">
                                    <p class="font-serif italic text-xl text-ink">{{ $title }}</p>
                                    <p class="text-ink/70 leading-relaxed mt-1">{{ $body }}</p>
                                </div>
                            </div>
                        @endforeach
                    </dl>
                </div>
            </div>
        </div>
    </section>

    {{-- ════════ FOR WHOM — dark sanctuary band ════════ --}}
    <section class="relative bg-gradient-to-br from-sage-800 via-sage-700 to-ink text-alabaster overflow-hidden">
        <div class="absolute inset-0 bg-noise opacity-20 mix-blend-overlay pointer-events-none"></div>
        <div class="blob bg-tallow-500 w-[28rem] h-[28rem] top-0 left-1/3 opacity-25 animate-ambient" style="animation-delay:-5s"></div>

        <div class="relative mx-auto max-w-7xl px-6 lg:px-10 py-24 lg:py-32">
            <div class="grid grid-cols-12 gap-10 lg:gap-16 items-end">
                <div class="col-span-12 lg:col-span-7" data-reveal>
                    <h2 class="font-serif text-display font-normal leading-[0.92]">
                        {{ __('For the parent') }}<br>
                        <em class="text-tallow-300">{{ __('juggling school calls,') }}</em><br>
                        {{ __('work calls, and dinner.') }}
                    </h2>
                </div>
                <div class="col-span-12 lg:col-span-5 lg:pb-4" data-reveal style="transition-delay:.1s">
                    <p class="text-lg text-alabaster/80 leading-relaxed">
                        {{ __('Five pathways for kids aged 5–18 with a clinical diagnosis. Each one routes you to a clinician who has actually worked with families like yours.') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ════════ TEAM — asymmetric 1+2 layout (NOT a 3-up card grid) ════════ --}}
    <section class="relative bg-alabaster">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-24 lg:py-32">
            <div class="max-w-3xl mb-16" data-reveal>
                <p class="kicker">{{ __('The people behind Spaid') }}</p>
                <h2 class="font-serif text-display font-normal leading-[0.92] mt-2 text-ink">
                    {{ __('Clinicians') }} <em class="text-sage-700">{{ __('who became founders.') }}</em>
                </h2>
            </div>

            <div class="grid grid-cols-12 gap-5 lg:gap-8">
                {{-- Hero portrait (large) — Ria --}}
                <article class="col-span-12 lg:col-span-7" data-reveal>
                    <div class="aspect-[4/5] lg:aspect-[5/4] rounded-3xl mb-6 relative overflow-hidden bg-gradient-to-br from-sage-300 via-sage-500 to-sage-800">
                        <div class="absolute inset-0 bg-noise opacity-30 mix-blend-multiply"></div>
                        <div class="absolute inset-0 flex items-end p-8 lg:p-12">
                            <span class="font-serif italic text-[clamp(10rem,18vw,16rem)] leading-[0.8] text-alabaster">R</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 lg:col-span-5">
                            <p class="font-serif text-3xl text-ink">Ria</p>
                            <p class="kicker mt-1">{{ __('Coach & co-founder') }}</p>
                        </div>
                        <p class="col-span-12 lg:col-span-7 text-ink/75 leading-relaxed lg:pt-1">
                            {{ __('Coaches working parents through the school years. Mother of three.') }}
                        </p>
                    </div>
                </article>

                {{-- Two stacked smaller portraits — Martine + Marc --}}
                <div class="col-span-12 lg:col-span-5 space-y-6 lg:space-y-8">
                    @foreach ([
                        ['Martine', __('Clinical lead'),     __('Physician building care pathways with the KU Leuven faculty.'),     'tallow'],
                        ['Marc',    __('Operations'),         __('Runs the business so the clinicians can stay in the room.'),        'clay'],
                    ] as $i => [$name, $title, $body, $accent])
                        <article data-reveal style="transition-delay:{{ ($i + 1) * 0.1 }}s">
                            <div class="aspect-[4/3] rounded-3xl mb-4 relative overflow-hidden
                                {{ $accent === 'tallow' ? 'bg-gradient-to-br from-tallow-300 via-tallow-500 to-tallow-900' : 'bg-gradient-to-br from-clay-300 via-clay-500 to-clay-700' }}">
                                <div class="absolute inset-0 bg-noise opacity-30 mix-blend-multiply"></div>
                                <div class="absolute inset-0 flex items-end p-6">
                                    <span class="font-serif italic text-[clamp(6rem,10vw,9rem)] leading-[0.8] text-alabaster">{{ substr($name, 0, 1) }}</span>
                                </div>
                            </div>
                            <div class="flex items-baseline gap-4">
                                <p class="font-serif text-2xl text-ink">{{ $name }}</p>
                                <p class="kicker">{{ $title }}</p>
                            </div>
                            <p class="text-sm text-ink/70 leading-relaxed mt-2">{{ $body }}</p>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ════════ KU LEUVEN STAMP ════════ --}}
    <section class="bg-sage-100 border-y border-sage-700/25">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-20 lg:py-24 grid grid-cols-12 gap-10 items-center">
            <div class="col-span-12 lg:col-span-8 space-y-4" data-reveal>
                <p class="kicker">{{ __('Scientific partnership') }}</p>
                <h2 class="font-serif text-h1 leading-tight text-ink">
                    {{ __('Built with the people who teach the next generation of psychologists.') }}
                </h2>
                <p class="text-ink/75 leading-relaxed max-w-xl text-lg">
                    {{ __('Every pathway is co-designed with KU Leuven faculty of Psychology & Educational Sciences. In collaboration with Prof. Dr. Dieter Baeyens and Prof. Dr. Karla Van Leeuwen.') }}
                </p>
            </div>
            <div class="col-span-12 lg:col-span-4" data-reveal style="transition-delay:.1s">
                <div class="aspect-[5/4] rounded-3xl bg-alabaster relative overflow-hidden flex flex-col items-center justify-center gap-6 p-10 shadow-sanctuary border border-sage-700/15">
                    <img src="/img/spaid/kuleuven.png" alt="KU Leuven" class="h-12 w-auto" loading="lazy" decoding="async">
                    <p class="font-serif italic text-center text-ink/75 leading-snug">{{ __('Psychology & Educational Sciences') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ════════ B2B CTA ════════ --}}
    <section class="relative bg-alabaster">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-24 lg:py-32">
            <div class="relative rounded-[2rem] overflow-hidden p-10 md:p-16 lg:p-20 bg-gradient-to-br from-sage-700 to-ink text-alabaster shadow-sanctuary" data-reveal>
                <div class="blob bg-tallow-500 w-[28rem] h-[28rem] -top-20 -right-20 opacity-30 animate-ambient"></div>
                <div class="absolute inset-0 bg-noise opacity-20 mix-blend-overlay pointer-events-none"></div>

                <div class="relative grid grid-cols-12 gap-10 items-end">
                    <div class="col-span-12 lg:col-span-8 space-y-5">
                        <p class="kicker text-tallow-300">{{ __('For HR & people teams') }}</p>
                        <h2 class="font-serif text-display font-normal leading-[0.92] max-w-3xl">
                            {{ __('Some of your people') }}<br>
                            <em class="text-tallow-300">{{ __('are quietly drowning.') }}</em>
                        </h2>
                        <p class="text-alabaster/80 leading-relaxed max-w-xl text-lg">
                            {{ __('Thirty minutes. We map your workforce, scope a pilot, and answer every clinical question. No deck, no obligation.') }}
                        </p>
                    </div>
                    <div class="col-span-12 lg:col-span-4 flex flex-col items-start lg:items-end gap-3">
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
