@extends('layouts.app')

@section('title', __('Step 1 — Triage'))

@section('content')
    <div class="max-w-3xl mx-auto">
        <header class="space-y-3 mb-12" data-reveal>
            <p class="eyebrow">{{ __('Step 1 — Triage') }}</p>
            <h1 class="font-serif text-h1 leading-tight">{{ __('Welcome.') }} <em class="text-sage-700">{{ __("Let's find the right program.") }}</em></h1>
            <p class="text-ink/70 leading-relaxed max-w-xl">{{ __('Answer three short questions. Your answers are confidential and determine which psychologists we show for your situation.') }}</p>
        </header>

        @if ($errors->any())
            <div class="rounded-xl bg-tallow-100 border border-tallow-500/60 px-5 py-3 text-sm text-ink mb-8" data-reveal>
                @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('triage.store') }}" class="space-y-10" data-reveal>
            @csrf

            <fieldset class="card">
                <legend class="font-serif text-2xl mb-2 px-1">{{ __('1. What is the primary diagnosis of your child?') }}</legend>
                <p class="text-sm text-ink/60 mb-5 px-1">{{ __('Pick the dominant clinical category. You can refine with your psychologist later.') }}</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @foreach ($issueTypes as $issue)
                        <label class="group relative cursor-pointer flex items-center gap-4 p-4 rounded-2xl border border-ink/10 hover:border-ink/40 has-[:checked]:bg-ink has-[:checked]:text-alabaster has-[:checked]:border-ink transition-all">
                            <input type="radio" name="issue_type" value="{{ $issue->value }}" class="sr-only" required>
                            <span class="w-3 h-3 rounded-full border border-ink/40 group-has-[:checked]:bg-tallow-500 group-has-[:checked]:border-tallow-500 transition-colors"></span>
                            <span>
                                <span class="font-serif text-lg block">{{ $issue->label() }}</span>
                                <span class="text-[0.65rem] uppercase tracking-widest text-ink/45 group-has-[:checked]:text-alabaster/55">{{ strtoupper($issue->value) }}</span>
                            </span>
                        </label>
                    @endforeach
                </div>
            </fieldset>

            <fieldset class="card">
                <legend class="font-serif text-2xl mb-5 px-1">{{ __('2. Does the child take medication?') }}</legend>
                <div class="flex gap-3">
                    <label class="cursor-pointer px-6 py-3 rounded-full border border-ink/15 has-[:checked]:bg-ink has-[:checked]:text-alabaster has-[:checked]:border-ink transition-all">
                        <input type="radio" name="takes_medication" value="1" class="sr-only" required> {{ __('Yes') }}
                    </label>
                    <label class="cursor-pointer px-6 py-3 rounded-full border border-ink/15 has-[:checked]:bg-ink has-[:checked]:text-alabaster has-[:checked]:border-ink transition-all">
                        <input type="radio" name="takes_medication" value="0" class="sr-only" required> {{ __('No') }}
                    </label>
                </div>
            </fieldset>

            <fieldset class="card">
                <legend class="font-serif text-2xl mb-5 px-1">{{ __('3. Is there an active treatment in progress?') }}</legend>
                <div class="flex gap-3">
                    <label class="cursor-pointer px-6 py-3 rounded-full border border-ink/15 has-[:checked]:bg-ink has-[:checked]:text-alabaster has-[:checked]:border-ink transition-all">
                        <input type="radio" name="currently_in_treatment" value="1" class="sr-only" required> {{ __('Yes') }}
                    </label>
                    <label class="cursor-pointer px-6 py-3 rounded-full border border-ink/15 has-[:checked]:bg-ink has-[:checked]:text-alabaster has-[:checked]:border-ink transition-all">
                        <input type="radio" name="currently_in_treatment" value="0" class="sr-only" required> {{ __('No') }}
                    </label>
                </div>
            </fieldset>

            <div class="flex items-center justify-between pt-2">
                <p class="text-xs text-ink/55">{{ __('Answers are securely stored under GDPR Art. 9(2)(h).') }}</p>
                <button type="submit" class="btn btn-primary" data-magnetic>
                    {{ __('Complete triage') }}
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                </button>
            </div>
        </form>
    </div>
@endsection
