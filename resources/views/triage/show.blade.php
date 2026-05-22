@extends('layouts.app')

@section('title', 'Triage')

@section('content')
    <div class="max-w-2xl mx-auto">
        <p class="text-xs uppercase tracking-widest text-neutral-500 mb-2">Stap 1 — Triage</p>
        <h1 class="text-4xl font-bold tracking-tight mb-3">Welkom. Laten we het juiste programma vinden.</h1>
        <p class="text-neutral-700 mb-10 leading-relaxed">
            Beantwoord drie korte vragen. Je antwoorden zijn vertrouwelijk en bepalen
            welke psychologen we voor jouw situatie tonen.
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
                    1. Wat is de voornaamste diagnose van uw kind?
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
                    2. Gebruikt het kind medicatie?
                </legend>

                <div class="flex gap-3 mt-4">
                    <label class="hairline px-5 py-2 cursor-pointer has-[:checked]:bg-neutral-900 has-[:checked]:text-white">
                        <input type="radio" name="takes_medication" value="1" class="sr-only" required>
                        Ja
                    </label>
                    <label class="hairline px-5 py-2 cursor-pointer has-[:checked]:bg-neutral-900 has-[:checked]:text-white">
                        <input type="radio" name="takes_medication" value="0" class="sr-only" required>
                        Nee
                    </label>
                </div>
            </fieldset>

            <fieldset class="hairline p-6">
                <legend class="px-2 text-sm font-semibold">
                    3. Is er momenteel een actieve behandeling?
                </legend>

                <div class="flex gap-3 mt-4">
                    <label class="hairline px-5 py-2 cursor-pointer has-[:checked]:bg-neutral-900 has-[:checked]:text-white">
                        <input type="radio" name="currently_in_treatment" value="1" class="sr-only" required>
                        Ja
                    </label>
                    <label class="hairline px-5 py-2 cursor-pointer has-[:checked]:bg-neutral-900 has-[:checked]:text-white">
                        <input type="radio" name="currently_in_treatment" value="0" class="sr-only" required>
                        Nee
                    </label>
                </div>
            </fieldset>

            <div class="flex items-center justify-between pt-4">
                <p class="text-xs text-neutral-500">Antwoorden worden veilig opgeslagen.</p>
                <button type="submit" class="btn-primary">Triage afronden →</button>
            </div>
        </form>
    </div>
@endsection
