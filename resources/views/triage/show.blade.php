@extends('layouts.app')

@section('title', __('Step 1 — Triage'))

@section('content')
    <div class="max-w-2xl mx-auto">
        <p class="text-xs uppercase tracking-widest text-neutral-500 mb-2">{{ __('Step 1 — Triage') }}</p>
        <h1 class="text-4xl font-bold tracking-tight mb-3">{{ __("Welcome. Let's find the right program.") }}</h1>
        <p class="text-neutral-700 mb-10 leading-relaxed">
            {{ __('Answer three short questions. Your answers are confidential and determine which psychologists we show for your situation.') }}
        </p>

        @if ($errors->any())
            <div class="hairline border-red-600 text-red-700 px-4 py-3 mb-8 text-sm">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('triage.store') }}" class="space-y-12">
            @csrf

            <fieldset class="hairline p-6">
                <legend class="px-2 text-sm font-semibold">
                    {{ __('1. What is the primary diagnosis of your child?') }}
                </legend>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-4">
                    @foreach ($issueTypes as $issue)
                        <label class="hairline px-4 py-3 cursor-pointer flex items-center gap-3 has-[:checked]:bg-neutral-900 has-[:checked]:text-white transition-colors">
                            <input type="radio"
                                   name="issue_type"
                                   value="{{ $issue->value }}"
                                   class="accent-black"
                                   required>
                            <span class="font-medium">{{ $issue->label() }}</span>
                        </label>
                    @endforeach
                </div>
            </fieldset>

            <fieldset class="hairline p-6">
                <legend class="px-2 text-sm font-semibold">
                    {{ __('2. Does the child take medication?') }}
                </legend>

                <div class="flex gap-3 mt-4">
                    <label class="hairline px-5 py-2 cursor-pointer has-[:checked]:bg-neutral-900 has-[:checked]:text-white">
                        <input type="radio" name="takes_medication" value="1" class="sr-only" required>
                        {{ __('Yes') }}
                    </label>
                    <label class="hairline px-5 py-2 cursor-pointer has-[:checked]:bg-neutral-900 has-[:checked]:text-white">
                        <input type="radio" name="takes_medication" value="0" class="sr-only" required>
                        {{ __('No') }}
                    </label>
                </div>
            </fieldset>

            <fieldset class="hairline p-6">
                <legend class="px-2 text-sm font-semibold">
                    {{ __('3. Is there an active treatment in progress?') }}
                </legend>

                <div class="flex gap-3 mt-4">
                    <label class="hairline px-5 py-2 cursor-pointer has-[:checked]:bg-neutral-900 has-[:checked]:text-white">
                        <input type="radio" name="currently_in_treatment" value="1" class="sr-only" required>
                        {{ __('Yes') }}
                    </label>
                    <label class="hairline px-5 py-2 cursor-pointer has-[:checked]:bg-neutral-900 has-[:checked]:text-white">
                        <input type="radio" name="currently_in_treatment" value="0" class="sr-only" required>
                        {{ __('No') }}
                    </label>
                </div>
            </fieldset>

            <div class="flex items-center justify-between pt-4">
                <p class="text-xs text-neutral-500">{{ __('Answers are securely stored.') }}</p>
                <button type="submit" class="btn-primary">{{ __('Complete triage') }} →</button>
            </div>
        </form>
    </div>
@endsection
