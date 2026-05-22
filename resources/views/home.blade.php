@extends('layouts.app')

@section('title', __('Mentally stronger, professionally more powerful.'))
@section('description', __('Spaid is a B2B wellness platform for parents of neurodivergent children, embedded in the employee benefits stack.'))

@section('full-bleed')
    <section class="relative overflow-hidden bg-gradient-to-br from-tallow-100 via-alabaster to-sage-100">
        <div class="blob bg-tallow-500 w-[42rem] h-[42rem] -top-40 -right-40 animate-ambient" style="opacity:.75"></div>
        <div class="blob bg-sage-400 w-[36rem] h-[36rem] -bottom-60 -left-40 animate-ambient" style="animation-delay:-7s;opacity:.6"></div>
        <div class="blob bg-clay-500 w-[28rem] h-[28rem] top-1/3 right-1/4 animate-ambient" style="animation-delay:-3s;opacity:.35"></div>
        <div class="absolute inset-0 bg-noise opacity-[0.4] mix-blend-multiply pointer-events-none"></div>

        <div class="relative mx-auto max-w-7xl px-6 lg:px-10 pt-20 pb-32">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-end">
                <div class="lg:col-span-8 space-y-8" data-reveal>
                    <p class="eyebrow">{{ __('B2B employee wellness · KU Leuven backed') }}</p>
                    <h1 class="font-serif text-hero font-medium text-ink">
                        {{ __('Mentally stronger,') }}<br>
                        <span class="italic text-sage-700">{{ __('professionally') }}</span>
                        {{ __('more powerful.') }}
                    </h1>
                    <p class="text-lg md:text-xl text-ink/75 leading-relaxed max-w-2xl">{{ __('Spaid is a sanctuary for working parents of neurodivergent children — matching them to specialized psychologists, quietly, inside the benefits stack their employer already runs.') }}</p>
                    <div class="flex flex-wrap items-center gap-4 pt-4">
                        <a href="{{ route('contact.show') }}" class="btn btn-primary" data-magnetic>
                            {{ __('Talk to us about your team') }}
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                        </a>
                        <a href="{{ route('programmas.index') }}" class="btn btn-ghost">{{ __('Explore the program') }}</a>
                    </div>
                </div>

                <div class="lg:col-span-4 space-y-6" data-reveal style="transition-delay:.15s">
                    <div class="card bg-ink text-alabaster border-ink/0 shadow-sanctuary">
                        <p class="eyebrow text-tallow-300">{{ __('Did you know') }}</p>
                        <p class="font-serif text-3xl mt-3 leading-snug">{{ __('10–20% of school-age children carry a learning or neurodevelopmental diagnosis.') }}</p>
                        <p class="text-xs text-alabaster/60 mt-4">{{ __('Source: KU Leuven Psychology & Educational Sciences') }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-20 flex items-center gap-3 text-xs text-ink/55">
                <span class="block w-12 h-px bg-ink/40"></span>
                <span class="eyebrow">{{ __('Scroll') }}</span>
            </div>
        </div>
    </section>

    <section class="border-y border-sage-700/25 bg-sage-700 text-alabaster">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-10 flex flex-wrap items-center justify-between gap-6">
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

    <section class="relative bg-tallow-100/60">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-32">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <div class="lg:col-span-4 space-y-5" data-reveal>
                    <p class="eyebrow">{{ __('Why through the employer?') }}</p>
                    <h2 class="font-serif text-h1 leading-tight text-ink">{{ __('A modern HR lever for') }} <em class="text-sage-700">{{ __('talent, retention, prevention') }}</em>.</h2>
                    <p class="text-ink/75 leading-relaxed max-w-md">{{ __('Spaid lives quietly inside the benefits stack. Employees activate it the moment they need it — no extra contracts, no out-of-pocket cost, no stigma.') }}</p>
                </div>
                <div class="lg:col-span-8 grid grid-cols-1 sm:grid-cols-3 gap-5">
                    @foreach ([
                        ['01', __('Modern HR policy'), __('Slots into talent attraction + retention strategies.'), 'sage'],
                        ['02', __('Support in tough life phases'), __('Optimal employer-led help when families need it most.'), 'tallow'],
                        ['03', __('Prevent absenteeism'), __('Proactive prevention drops turnover and sick days.'), 'clay'],
                    ] as [$num, $title, $body, $accent])
                        <div class="card relative overflow-hidden" data-reveal style="transition-delay:{{ $loop->index * 0.1 }}s">
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

    <section class="relative bg-ink text-alabaster overflow-hidden">
        <div class="blob bg-sage-700 w-[40rem] h-[40rem] top-1/2 -right-40 -translate-y-1/2 opacity-30 animate-ambient"></div>
        <div class="blob bg-tallow-700 w-[28rem] h-[28rem] top-0 left-1/3 opacity-15 animate-ambient" style="animation-delay:-5s"></div>
        <div class="relative mx-auto max-w-7xl px-6 lg:px-10 py-32">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-5 space-y-6" data-reveal>
                    <p class="eyebrow text-tallow-300">{{ __('Who is Spaid for?') }}</p>
                    <h2 class="font-serif text-h1 leading-tight">{{ __('Employees with children aged') }} <em class="text-tallow-300">5–18</em> {{ __('carrying a clinical diagnosis.') }}</h2>
                    <p class="text-alabaster/75 leading-relaxed max-w-md">{{ __('One program, five clinical pathways — each routed to a psychologist who actually specializes in that diagnosis. No generic intake.') }}</p>
                </div>
                <div class="lg:col-span-7 grid grid-cols-2 md:grid-cols-3 gap-3" data-reveal style="transition-delay:.15s">
                    @foreach ($issueTypes as $issue)
                        <div class="group relative p-6 border border-alabaster/15 rounded-2xl hover:bg-alabaster/5 transition-all">
                            <span class="block w-1.5 h-1.5 rounded-full bg-tallow-500 mb-4 group-hover:bg-alabaster transition-colors"></span>
                            <p class="font-serif text-2xl">{{ $issue->label() }}</p>
                            <p class="text-[0.7rem] uppercase tracking-widest text-alabaster/40 mt-2">{{ strtoupper($issue->value) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="relative">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-32">
            <div class="max-w-3xl mb-16" data-reveal>
                <p class="eyebrow">{{ __('The team') }}</p>
                <h2 class="font-serif text-h1 leading-tight mt-3">{{ __('Built by clinicians,') }} <em class="text-sage-700">{{ __('scaled by operators.') }}</em></h2>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                @foreach ([
                    ['Ria',     __('Certified coach'),    __('Career and parenting guidance for 20+ years.')],
                    ['Martine', __('Physician'),          __('Clinical trajectory development & medical liaison.')],
                    ['Marc',    __('Business advisor'),   __('Operations, efficiency, and B2B distribution.')],
                ] as [$name, $title, $body])
                    <article class="card group" data-reveal style="transition-delay:{{ $loop->index * 0.1 }}s">
                        <div class="aspect-[5/6] rounded-xl bg-gradient-to-br from-sage-200 to-whisper mb-5 flex items-end p-5 relative overflow-hidden">
                            <div class="absolute inset-0 bg-noise opacity-30"></div>
                            <span class="relative font-serif text-6xl text-ink/70">{{ substr($name, 0, 1) }}</span>
                        </div>
                        <p class="font-serif text-2xl">{{ $name }}</p>
                        <p class="eyebrow mt-1">{{ $title }}</p>
                        <p class="text-sm text-ink/70 mt-3 leading-relaxed">{{ $body }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-sage-100 border-y border-sage-700/25">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-24 grid grid-cols-1 md:grid-cols-12 gap-12 items-center">
            <div class="md:col-span-7 space-y-4" data-reveal>
                <p class="eyebrow">{{ __('Scientific partnership') }}</p>
                <h2 class="font-serif text-h2 leading-tight text-ink">{{ __('Developed with KU Leuven faculty of') }} <em class="text-sage-700">{{ __('Psychology & Educational Sciences.') }}</em></h2>
                <p class="text-ink/70 leading-relaxed max-w-xl">{{ __('In collaboration with Prof. Dr. Dieter Baeyens and Prof. Dr. Karla Van Leeuwen.') }}</p>
            </div>
            <div class="md:col-span-5" data-reveal style="transition-delay:.1s">
                <div class="card text-center bg-ink text-alabaster border-ink shadow-sanctuary">
                    <p class="eyebrow text-tallow-300">KU Leuven</p>
                    <p class="font-serif text-3xl mt-3">{{ __('Psychology & Educational Sciences') }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="relative">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-32">
            <div class="relative rounded-3xl overflow-hidden p-12 md:p-20 bg-gradient-to-br from-sage-700 to-ink text-alabaster shadow-sanctuary" data-reveal>
                <div class="blob bg-tallow-500 w-[28rem] h-[28rem] -top-20 -right-20 opacity-25 animate-ambient"></div>
                <div class="relative grid grid-cols-1 md:grid-cols-12 gap-10 items-end">
                    <div class="md:col-span-8 space-y-5">
                        <p class="eyebrow text-tallow-300">{{ __('For employers') }}</p>
                        <h2 class="font-serif text-h1 leading-tight max-w-2xl">{{ __('Curious about Spaid for') }} <em>{{ __('your company') }}</em>?</h2>
                        <p class="text-alabaster/80 leading-relaxed max-w-lg">{{ __('A 30-minute intake. We map your workforce + scope a pilot. No deck, no obligation.') }}</p>
                    </div>
                    <div class="md:col-span-4 flex flex-col items-start md:items-end gap-3">
                        <a href="{{ route('contact.show') }}" class="btn btn-tallow" data-magnetic>
                            {{ __('Book intake') }}
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                        </a>
                        <a href="mailto:office@spaid.be" class="link-underline text-tallow-300 text-sm">office@spaid.be</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
