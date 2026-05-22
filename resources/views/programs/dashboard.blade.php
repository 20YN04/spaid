@extends('layouts.app')

@section('title', __('Program') . ' — ' . $issue->label())

@section('content')
    <div class="space-y-12">
        <header>
            <p class="text-xs uppercase tracking-widest text-neutral-500 mb-2">{{ __('Program') }}</p>
            <h1 class="text-4xl font-bold tracking-tight">{{ $issue->label() }}</h1>
            <p class="text-neutral-700 mt-3 max-w-2xl leading-relaxed">
                {{ __("Below you'll find available sessions with psychologists specialized in :program. Book a slot that fits your schedule.", ['program' => $issue->label()]) }}
            </p>
        </header>

        @if (auth()->user()->activeAppointmentsCount() >= 2)
            <div class="hairline border-2 border-neutral-900 p-5 bg-neutral-50">
                <p class="font-semibold">{{ __('Computer says no.') }}</p>
                <p class="text-sm text-neutral-700 mt-1">
                    {{ __('You have reached the maximum of 2 active bookings. Cancel or complete an existing session to book again.') }}
                </p>
            </div>
        @endif

        <section>
            <div class="flex items-baseline justify-between mb-5">
                <h2 class="text-xl font-semibold tracking-tight">{{ __('Available sessions') }}</h2>
                <span class="text-xs text-neutral-500">{{ __(':count slots', ['count' => $availabilities->count()]) }}</span>
            </div>

            @if ($availabilities->isEmpty())
                <div class="hairline p-10 text-center text-neutral-500">
                    {{ __('Currently no available sessions. Check back later.') }}
                </div>
            @else
                <ul class="divide-y divide-neutral-900 hairline">
                    @foreach ($availabilities as $availability)
                        <li class="p-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div>
                                <p class="font-semibold">{{ $availability->psychologist->name }}</p>
                                <p class="text-sm text-neutral-700 mt-1">
                                    {{ $availability->start_time->locale(app()->getLocale())->translatedFormat('l j F · H:i') }}
                                    —
                                    {{ $availability->end_time->format('H:i') }}
                                </p>
                            </div>

                            <form method="POST" action="{{ route('appointments.store') }}">
                                @csrf
                                <input type="hidden" name="availability_id" value="{{ $availability->id }}">
                                <button type="submit"
                                        class="btn-primary"
                                        @disabled(auth()->user()->activeAppointmentsCount() >= 2)>
                                    {{ __('Book slot') }} →
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @endif
        </section>
    </div>
@endsection
