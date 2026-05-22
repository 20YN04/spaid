@extends('layouts.app')

@section('title', __('Program') . ' — ' . $issue->label())

@section('content')
    @php
        $activeCount = auth()->user()->activeAppointmentsCount();
        $atLimit = $activeCount >= 2;
        $grouped = $availabilities->groupBy(fn($a) => $a->start_time->format('Y-m-d'));
    @endphp

    <div class="space-y-16">
        <header class="relative" data-reveal>
            <div class="absolute -top-10 -left-10 w-72 h-72 bg-sage-200/60 rounded-full blur-3xl -z-10"></div>
            <p class="eyebrow">{{ __('Your program') }}</p>
            <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mt-3">
                <h1 class="font-serif text-h1 leading-tight max-w-3xl">
                    {{ $issue->label() }} <span class="text-ink/40">·</span>
                    <em class="text-sage-700">{{ __('matched to your specialists') }}</em>
                </h1>
                <div class="flex items-center gap-3 text-sm">
                    <span class="inline-flex items-center gap-2 rounded-full bg-sage-100 text-sage-800 px-3 py-1">
                        <span class="block w-1.5 h-1.5 rounded-full bg-sage-600 animate-pulse"></span>
                        {{ __(':n active booking(s)', ['n' => $activeCount]) }}
                    </span>
                    <span class="text-ink/60">{{ __(':count slots open', ['count' => $availabilities->count()]) }}</span>
                </div>
            </div>
        </header>

        @if ($atLimit)
            <aside class="relative rounded-3xl overflow-hidden bg-gradient-to-br from-sage-700 to-ink text-alabaster p-8 md:p-12 shadow-sanctuary" data-reveal>
                <div class="blob bg-tallow-500 w-72 h-72 -top-10 -right-10 opacity-40"></div>
                <div class="relative grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
                    <div class="md:col-span-1">
                        <span class="block w-12 h-12 rounded-full border border-tallow-300/60 flex items-center justify-center">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v6M12 16v6M2 12h6M16 12h6"/></svg>
                        </span>
                    </div>
                    <div class="md:col-span-11 space-y-2">
                        <p class="font-serif text-3xl">{{ __('Take a breath — you already have two.') }}</p>
                        <p class="text-alabaster/85 max-w-xl">{{ __('Two active sessions is our gentle ceiling. It keeps the calendar honest and your week sane. Finish or release a slot and the next one opens right up.') }}</p>
                        <a href="{{ route('dashboard') }}" class="link-underline text-tallow-300 text-sm pt-2 inline-flex">{{ __('Manage existing bookings') }} →</a>
                    </div>
                </div>
            </aside>
        @endif

        <section data-reveal>
            <div class="flex items-baseline justify-between mb-8">
                <h2 class="font-serif text-h2">{{ __('Available sessions') }}</h2>
                <span class="eyebrow">{{ __(':count slots', ['count' => $availabilities->count()]) }}</span>
            </div>

            @if ($availabilities->isEmpty())
                <div class="card text-center py-20">
                    <p class="font-serif text-2xl">{{ __('Currently no available sessions.') }}</p>
                    <p class="text-ink/60 mt-2">{{ __('We refresh the calendar weekly. Check back soon.') }}</p>
                </div>
            @else
                <div class="space-y-10">
                    @foreach ($grouped as $day => $slots)
                        @php $dayCarbon = $slots->first()->start_time->locale(app()->getLocale()); @endphp
                        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-start" data-reveal>
                            <div class="md:col-span-3">
                                <div class="sticky top-24">
                                    <p class="eyebrow">{{ $dayCarbon->translatedFormat('l') }}</p>
                                    <p class="font-serif text-5xl mt-2">{{ $dayCarbon->translatedFormat('d') }}</p>
                                    <p class="text-ink/60 text-sm mt-1">{{ $dayCarbon->translatedFormat('F Y') }}</p>
                                </div>
                            </div>
                            <div class="md:col-span-9 grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @foreach ($slots as $availability)
                                    <article class="card group" data-reveal style="transition-delay:{{ $loop->index * 0.05 }}s">
                                        <div class="flex items-start justify-between gap-4">
                                            <div class="space-y-1">
                                                <p class="eyebrow">{{ $availability->start_time->format('H:i') }} — {{ $availability->end_time->format('H:i') }}</p>
                                                <p class="font-serif text-2xl mt-2">{{ $availability->psychologist->name }}</p>
                                                <p class="text-xs text-ink/55 flex flex-wrap gap-1.5 mt-2">
                                                    @foreach ($availability->psychologist->specialties as $spec)
                                                        <span class="px-2 py-0.5 rounded-full bg-sage-100 text-sage-800 uppercase tracking-widest font-semibold">{{ $spec }}</span>
                                                    @endforeach
                                                </p>
                                            </div>
                                            <span class="block w-2 h-2 rounded-full bg-sage-500 group-hover:bg-tallow-500 transition-colors"></span>
                                        </div>
                                        <form method="POST" action="{{ route('appointments.store') }}" class="mt-6">
                                            @csrf
                                            <input type="hidden" name="availability_id" value="{{ $availability->id }}">
                                            <button type="submit" class="btn btn-primary w-full justify-center" @disabled($atLimit) data-magnetic>
                                                {{ $atLimit ? __('Limit reached') : __('Book slot') }}
                                                @unless($atLimit)
                                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                                                @endunless
                                            </button>
                                        </form>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>
    </div>
@endsection
