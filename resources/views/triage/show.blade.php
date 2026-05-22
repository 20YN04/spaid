@extends('layouts.app')

@section('title', __('Step 1 — Triage'))

@section('content')
    <div class="max-w-3xl mx-auto">
        <header class="space-y-5 mb-14" data-reveal>
            <p class="kicker">{{ __('Step 1, triage') }}</p>
            <h1 class="font-serif text-h1 leading-tight text-ink">
                {{ __('Welcome.') }} <em class="text-sage-700">{{ __("Let's find the right program.") }}</em>
            </h1>
            <p class="text-lg text-ink/75 leading-relaxed max-w-2xl">
                {{ __('Answer three short questions. Your answers are confidential and determine which psychologists we show for your situation.') }}
            </p>
        </header>

        @if ($errors->any())
            <div class="rounded-xl bg-tallow-100 border border-tallow-500/60 px-5 py-3 text-sm text-ink mb-8" data-reveal>
                @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('triage.store') }}" class="space-y-12" data-reveal>
            @csrf

            <fieldset>
                <legend class="font-serif text-3xl italic text-ink mb-2">{{ __('1. What is the primary diagnosis of your child?') }}</legend>
                <p class="text-sm text-ink/60 mb-6 italic font-serif">{{ __('Pick the dominant clinical category. You can refine with your psychologist later.') }}</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach ($issueTypes as $issue)
                        <label class="group relative cursor-pointer flex items-center gap-4 p-5 rounded-2xl border border-sage-700/20 hover:border-sage-700/60 has-[:checked]:bg-ink has-[:checked]:text-alabaster has-[:checked]:border-ink transition-all">
                            <input type="radio" name="issue_type" value="{{ $issue->value }}" class="sr-only" required>
                            <span class="w-3 h-3 rounded-full border border-sage-700/40 group-has-[:checked]:bg-tallow-500 group-has-[:checked]:border-tallow-500 transition-colors"></span>
                            <span>
                                <span class="font-serif text-xl block">{{ $issue->label() }}</span>
                                <span class="text-[0.65rem] uppercase tracking-widest text-ink/45 group-has-[:checked]:text-alabaster/55">{{ strtoupper($issue->value) }}</span>
                            </span>
                        </label>
                    @endforeach
                </div>
            </fieldset>

            <fieldset>
                <legend class="font-serif text-3xl italic text-ink mb-6">{{ __('2. Does the child take medication?') }}</legend>
                <div class="flex gap-3">
                    <label class="cursor-pointer px-7 py-3 rounded-full border border-sage-700/25 has-[:checked]:bg-ink has-[:checked]:text-alabaster has-[:checked]:border-ink transition-all">
                        <input type="radio" name="takes_medication" value="1" class="sr-only" required> {{ __('Yes') }}
                    </label>
                    <label class="cursor-pointer px-7 py-3 rounded-full border border-sage-700/25 has-[:checked]:bg-ink has-[:checked]:text-alabaster has-[:checked]:border-ink transition-all">
                        <input type="radio" name="takes_medication" value="0" class="sr-only" required> {{ __('No') }}
                    </label>
                </div>
            </fieldset>

            <fieldset>
                <legend class="font-serif text-3xl italic text-ink mb-6">{{ __('3. Is there an active treatment in progress?') }}</legend>
                <div class="flex gap-3">
                    <label class="cursor-pointer px-7 py-3 rounded-full border border-sage-700/25 has-[:checked]:bg-ink has-[:checked]:text-alabaster has-[:checked]:border-ink transition-all">
                        <input type="radio" name="currently_in_treatment" value="1" class="sr-only" required> {{ __('Yes') }}
                    </label>
                    <label class="cursor-pointer px-7 py-3 rounded-full border border-sage-700/25 has-[:checked]:bg-ink has-[:checked]:text-alabaster has-[:checked]:border-ink transition-all">
                        <input type="radio" name="currently_in_treatment" value="0" class="sr-only" required> {{ __('No') }}
                    </label>
                </div>
            </fieldset>

            <div class="flex items-center justify-between pt-2 border-t border-sage-700/20">
                <p class="text-xs text-ink/55 italic font-serif pt-5">{{ __('Answers are securely stored under GDPR Art. 9(2)(h).') }}</p>
                <div class="pt-5">
                    <button type="submit" class="btn btn-primary" data-magnetic>
                        {{ __('Complete triage') }}
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
