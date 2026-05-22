@extends('layouts.app')

@section('title', __("Programma's"))
@section('description', __('Five clinical pathways covering ADHD, autism, anxiety/stress, dyslexia and dyscalculia — matched to specialized psychologists.'))

@section('content')
    <div class="space-y-16">
        <header class="max-w-3xl">
            <p class="section-eyebrow mb-3">{{ __("Programma's") }}</p>
            <h1 class="text-5xl font-bold tracking-tight leading-[1.05]">
                {{ __('One program. Five clinical pathways.') }}
            </h1>
            <p class="text-neutral-700 mt-5 leading-relaxed">
                {{ __("Each pathway routes the parent to a psychologist with verified specialty coverage. No generic intake — every booking is matched to the right clinician for the child's diagnosis.") }}
            </p>
        </header>

        <section class="grid grid-cols-1 md:grid-cols-2 gap-5">
            @php
                $descriptions = [
                    'adhd' => __('Attention regulation, impulse control, executive function strategies. Coaching for parents on school + home routines.'),
                    'autisme' => __('Autism spectrum support — sensory regulation, social navigation, structured-day frameworks.'),
                    'angst_stress' => __('Anxiety and stress in children + adolescents, including school refusal and performance pressure.'),
                    'dyslexie' => __('Reading + spelling interventions, compensation strategies, advocacy with the school.'),
                    'dyscalculie' => __('Number sense, mathematical reasoning, and confidence rebuilding for kids who struggle with maths.'),
                ];
            @endphp

            @foreach ($issueTypes as $issue)
                <article class="hairline p-7 flex flex-col gap-3">
                    <p class="section-eyebrow">{{ strtoupper($issue->value) }}</p>
                    <h2 class="text-2xl font-bold tracking-tight">{{ $issue->label() }}</h2>
                    <p class="text-sm text-neutral-700 leading-relaxed">
                        {{ $descriptions[$issue->value] ?? '' }}
                    </p>
                    <div class="pt-2">
                        <a href="{{ route('register') }}" class="text-sm font-semibold underline underline-offset-4">
                            {{ __('Start triage') }} →
                        </a>
                    </div>
                </article>
            @endforeach
        </section>

        <section class="hairline p-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <p class="section-eyebrow mb-2">01</p>
                    <p class="font-semibold">{{ __('Wetenschappelijk onderbouwd') }}</p>
                    <p class="text-sm text-neutral-700 mt-2 leading-relaxed">
                        {{ __('Programs developed with KU Leuven faculty.') }}
                    </p>
                </div>
                <div>
                    <p class="section-eyebrow mb-2">02</p>
                    <p class="font-semibold">{{ __('Credentialed psychologists') }}</p>
                    <p class="text-sm text-neutral-700 mt-2 leading-relaxed">
                        {{ __('Every clinician has verified specialty coverage for the diagnoses they handle.') }}
                    </p>
                </div>
                <div>
                    <p class="section-eyebrow mb-2">03</p>
                    <p class="font-semibold">{{ __('Embedded in HR') }}</p>
                    <p class="text-sm text-neutral-700 mt-2 leading-relaxed">
                        {{ __('Accessed through the employer benefits stack — no out-of-pocket cost for the employee.') }}
                    </p>
                </div>
            </div>
        </section>

        <section class="flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between">
            <p class="text-neutral-700 max-w-lg">
                {{ __('Already activated by your employer? Sign in with your corporate email.') }}
            </p>
            <div class="flex gap-3">
                <a href="{{ route('register') }}" class="btn-primary">{{ __('Register') }} →</a>
                <a href="{{ route('login') }}" class="btn-ghost">{{ __('Sign in') }}</a>
            </div>
        </section>
    </div>
@endsection
