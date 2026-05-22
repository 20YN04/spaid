@extends('layouts.app')

@section('title', __("Programma's"))
@section('description', __('Five clinical pathways covering ADHD, autism, anxiety/stress, dyslexia and dyscalculia — matched to specialized psychologists.'))

@section('full-bleed')
    <section class="relative overflow-hidden">
        <div class="blob bg-sage-200 w-[38rem] h-[38rem] -top-20 right-10 opacity-50 animate-ambient"></div>
        <div class="relative mx-auto max-w-7xl px-6 lg:px-10 py-24">
            <header class="max-w-3xl space-y-6" data-reveal>
                <p class="eyebrow">{{ __("Programma's") }}</p>
                <h1 class="font-serif text-hero leading-[0.95]">
                    {{ __('One program.') }}<br>
                    <em class="text-sage-700">{{ __('Five clinical pathways.') }}</em>
                </h1>
                <p class="text-lg text-ink/70 leading-relaxed">{{ __("Each pathway routes the parent to a psychologist with verified specialty coverage. No generic intake — every booking is matched to the right clinician for the child's diagnosis.") }}</p>
            </header>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-6 lg:px-10 pb-24">
        @php
            $copies = [
                'adhd'         => __('Attention regulation, impulse control, executive function strategies. Coaching for parents on school + home routines.'),
                'autisme'      => __('Autism spectrum support — sensory regulation, social navigation, structured-day frameworks.'),
                'angst_stress' => __('Anxiety and stress in children + adolescents, including school refusal and performance pressure.'),
                'dyslexie'     => __('Reading + spelling interventions, compensation strategies, advocacy with the school.'),
                'dyscalculie'  => __('Number sense, mathematical reasoning, and confidence rebuilding for kids who struggle with maths.'),
            ];
            $accents = ['sage', 'tallow', 'sage', 'tallow', 'sage'];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-6 gap-5">
            @foreach ($issueTypes as $i => $issue)
                @php
                    $span = $i === 0 ? 'md:col-span-4' : 'md:col-span-2';
                    $accent = $accents[$i % count($accents)];
                @endphp
                <article class="card relative overflow-hidden {{ $span }}" data-reveal style="transition-delay:{{ $i * 0.08 }}s">
                    <span class="absolute -top-10 -right-10 w-44 h-44 rounded-full blur-3xl opacity-60 {{ $accent === 'tallow' ? 'bg-tallow-300' : 'bg-sage-200' }}"></span>
                    <div class="relative space-y-4">
                        <div class="flex items-baseline gap-3">
                            <span class="eyebrow">{{ strtoupper($issue->value) }}</span>
                            <span class="text-xs text-ink/45">0{{ $i + 1 }} / 05</span>
                        </div>
                        <h2 class="font-serif text-3xl md:text-4xl leading-tight">{{ $issue->label() }}</h2>
                        <p class="text-ink/70 leading-relaxed max-w-md">{{ $copies[$issue->value] ?? '' }}</p>
                        <a href="{{ route('register') }}" class="link-underline pt-2 inline-flex">
                            {{ __('Start triage') }}
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="bg-whisper/60 border-y border-ink/10">
        <div class="mx-auto max-w-7xl px-6 lg:px-10 py-20">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach ([
                    ['01', __('Wetenschappelijk onderbouwd'), __('Programs developed with KU Leuven faculty.')],
                    ['02', __('Credentialed psychologists'),  __('Every clinician has verified specialty coverage for the diagnoses they handle.')],
                    ['03', __('Embedded in HR'),              __('Accessed through the employer benefits stack — no out-of-pocket cost for the employee.')],
                ] as [$num, $title, $body])
                    <div class="space-y-3" data-reveal style="transition-delay:{{ $loop->index * 0.1 }}s">
                        <p class="eyebrow">{{ $num }}</p>
                        <p class="font-serif text-2xl">{{ $title }}</p>
                        <p class="text-ink/70 leading-relaxed">{{ $body }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-6 lg:px-10 py-24">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6" data-reveal>
            <div class="space-y-2 max-w-xl">
                <p class="font-serif text-h2 leading-tight">{{ __('Already activated by your employer?') }}</p>
                <p class="text-ink/70">{{ __('Sign in with your corporate email.') }}</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('register') }}" class="btn btn-primary" data-magnetic>{{ __('Register') }}</a>
                <a href="{{ route('login') }}" class="btn btn-ghost">{{ __('Sign in') }}</a>
            </div>
        </div>
    </section>
@endsection
