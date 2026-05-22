@extends('layouts.app')

@section('title', __("Programma's"))
@section('description', __('Five clinical pathways covering ADHD, autism, anxiety/stress, dyslexia and dyscalculia, matched to specialized psychologists.'))

@section('full-bleed')
    {{-- HERO with display-mega typographic moment --}}
    <section class="relative overflow-hidden">
        <div class="blob bg-sage-400 w-[38rem] h-[38rem] -top-20 right-10 opacity-55 animate-ambient"></div>
        <div class="blob bg-tallow-500 w-[24rem] h-[24rem] bottom-0 left-1/4 opacity-40 animate-ambient" style="animation-delay:-5s"></div>

        <div class="relative mx-auto max-w-7xl px-6 lg:px-10 pt-16 lg:pt-24 pb-20">
            <div class="max-w-4xl space-y-8" data-reveal>
                <p class="kicker">{{ __("Programma's") }}</p>
                <h1 class="font-serif text-display font-normal leading-[0.9] text-ink">
                    {{ __('One program.') }}<br>
                    <em class="text-sage-700">{{ __('Five clinical doors.') }}</em>
                </h1>
                <p class="text-xl text-ink/75 leading-relaxed max-w-2xl">
                    {{ __("Each pathway routes the parent to a psychologist with verified specialty coverage. No generic intake, every booking matched to the right clinician for your child's diagnosis.") }}
                </p>
            </div>
        </div>
    </section>

    {{-- PATHWAY LIST — vertical, typographic, no card grid --}}
    <section class="bg-alabaster">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 pb-24">
            @php
                $copies = [
                    'adhd'         => __('Attention regulation, impulse control, executive function. Coaching for parents on school and home routines.'),
                    'autisme'      => __('Autism spectrum support, sensory regulation, social navigation, structured-day frameworks.'),
                    'angst_stress' => __('Anxiety and stress in children and adolescents, including school refusal and performance pressure.'),
                    'dyslexie'     => __('Reading and spelling interventions, compensation strategies, advocacy with the school.'),
                    'dyscalculie'  => __('Number sense, mathematical reasoning, and confidence rebuilding for kids who struggle with maths.'),
                ];
            @endphp

            <ol class="space-y-0">
                @foreach ($issueTypes as $i => $issue)
                    <li class="rule-h"></li>
                    <li class="grid grid-cols-12 gap-6 lg:gap-12 py-14 lg:py-20 items-start group" data-reveal style="transition-delay:{{ $i * 0.08 }}s">
                        <div class="col-span-2 lg:col-span-1">
                            <span class="numeral italic">0{{ $i + 1 }}</span>
                        </div>
                        <div class="col-span-10 lg:col-span-5">
                            <h2 class="font-serif text-4xl lg:text-6xl leading-[1] text-ink group-hover:text-sage-700 transition-colors">{{ $issue->label() }}</h2>
                            <p class="text-[0.7rem] uppercase tracking-widest text-ink/35 mt-3">{{ strtoupper($issue->value) }}</p>
                        </div>
                        <div class="col-span-12 lg:col-span-5 lg:pt-3 space-y-5">
                            <p class="text-lg text-ink/75 leading-relaxed">{{ $copies[$issue->value] ?? '' }}</p>
                            <a href="{{ route('register') }}" class="link-underline">
                                {{ __('Start triage for this pathway') }}
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                        <div class="hidden lg:flex lg:col-span-1 items-center justify-end pt-3">
                            <span class="block w-3 h-3 rounded-full bg-tallow-500 animate-breathe"></span>
                        </div>
                    </li>
                @endforeach
                <li class="rule-h"></li>
            </ol>
        </div>
    </section>

    {{-- TRUST STRIP — sage band --}}
    <section class="relative bg-sage-700 text-alabaster overflow-hidden">
        <div class="absolute inset-0 bg-noise opacity-25 mix-blend-overlay pointer-events-none"></div>
        <div class="relative mx-auto max-w-7xl px-6 lg:px-10 py-20 lg:py-24">
            <div class="grid grid-cols-12 gap-10">
                <div class="col-span-12 lg:col-span-5" data-reveal>
                    <p class="kicker text-tallow-300">{{ __('Why trust us') }}</p>
                    <h2 class="font-serif text-h1 leading-tight mt-2">
                        {{ __('Wetenschappelijk onderbouwd.') }} <em class="text-tallow-300">{{ __('Clinician-led.') }}</em>
                    </h2>
                </div>
                <dl class="col-span-12 lg:col-span-7 space-y-8" data-reveal style="transition-delay:.1s">
                    @foreach ([
                        [__('KU Leuven faculty'),       __('Pathways co-designed with the Psychology & Educational Sciences faculty.')],
                        [__('Verified clinicians'),     __('Every psychologist has documented specialty coverage for the diagnoses they treat.')],
                        [__('Inside the benefits'),     __('Accessed through your employer, no out-of-pocket cost.')],
                    ] as $i => [$title, $body])
                        <div class="grid grid-cols-12 gap-4 items-baseline border-b border-alabaster/15 pb-6">
                            <dt class="col-span-1 font-serif italic text-2xl text-tallow-300">0{{ $i + 1 }}</dt>
                            <div class="col-span-11">
                                <p class="font-serif italic text-xl">{{ $title }}</p>
                                <p class="text-alabaster/75 mt-1">{{ $body }}</p>
                            </div>
                        </div>
                    @endforeach
                </dl>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="bg-alabaster">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-20 lg:py-24">
            <div class="grid grid-cols-12 gap-8 items-end" data-reveal>
                <div class="col-span-12 lg:col-span-8 space-y-3">
                    <p class="font-serif text-h1 leading-tight text-ink">{{ __('Already activated by your employer?') }}</p>
                    <p class="text-ink/70 text-lg italic font-serif">{{ __('Sign in with your corporate email.') }}</p>
                </div>
                <div class="col-span-12 lg:col-span-4 flex gap-3 lg:justify-end">
                    <a href="{{ route('register') }}" class="btn btn-primary" data-magnetic>{{ __('Register') }}</a>
                    <a href="{{ route('login') }}" class="btn btn-ghost">{{ __('Sign in') }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
