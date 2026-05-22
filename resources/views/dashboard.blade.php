@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
    @php
        $issue = auth()->user()->triageResult?->issue_type;
        $upcoming = auth()->user()->appointments()
            ->where('status', \App\Enums\AppointmentStatus::Scheduled->value)
            ->where('scheduled_at', '>', now())
            ->with('psychologist')
            ->orderBy('scheduled_at')
            ->get();
    @endphp

    <div class="space-y-16">
        <header data-reveal>
            <p class="eyebrow">{{ __('Dashboard') }}</p>
            <h1 class="font-serif text-h1 leading-tight mt-3">{{ __('Welcome back,') }} <em class="text-sage-700">{{ auth()->user()->name }}</em>.</h1>
        </header>

        @if ($issue)
            <section class="relative rounded-3xl overflow-hidden p-8 md:p-12 bg-gradient-to-br from-whisper to-sage-100 border border-ink/10" data-reveal>
                <div class="blob bg-tallow-300 w-72 h-72 -top-10 -right-10 opacity-50"></div>
                <div class="relative grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                    <div class="md:col-span-8 space-y-3">
                        <p class="eyebrow">{{ __('Your program') }}</p>
                        <p class="font-serif text-4xl">{{ $issue->label() }}</p>
                        <p class="text-ink/70 max-w-md">{{ __('Browse psychologist availabilities matched to your triage outcome.') }}</p>
                    </div>
                    <div class="md:col-span-4 flex md:justify-end">
                        <a href="{{ $issue->programRoute() }}" class="btn btn-primary" data-magnetic>
                            {{ __('View available sessions') }}
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </section>
        @endif

        <section data-reveal>
            <div class="flex items-baseline justify-between mb-6">
                <h2 class="font-serif text-h2">{{ __('Upcoming appointments') }}</h2>
                <span class="eyebrow">{{ __(':n active booking(s)', ['n' => $upcoming->count()]) }} / 2</span>
            </div>

            @if ($upcoming->isEmpty())
                <div class="card text-center py-16">
                    <p class="font-serif text-2xl">{{ __('No upcoming appointments yet.') }}</p>
                    <p class="text-ink/60 mt-2">{{ __('Pick a slot from your program dashboard.') }}</p>
                </div>
            @else
                <ul class="space-y-3">
                    @foreach ($upcoming as $appt)
                        <li class="card flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4" data-reveal style="transition-delay:{{ $loop->index * 0.08 }}s">
                            <div>
                                <p class="eyebrow">{{ $appt->scheduled_at->locale(app()->getLocale())->translatedFormat('l j F') }}</p>
                                <p class="font-serif text-2xl mt-1">{{ $appt->psychologist->name }}</p>
                                <p class="text-sm text-ink/65 mt-1">{{ $appt->scheduled_at->format('H:i') }}</p>
                            </div>
                            <form method="POST" action="{{ route('appointments.destroy', $appt) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="link-underline text-sm">{{ __('Cancel') }}</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @endif
        </section>
    </div>
@endsection
