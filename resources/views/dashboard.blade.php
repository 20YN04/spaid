@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
    <div class="space-y-10">
        <header>
            <p class="text-xs uppercase tracking-widest text-neutral-500 mb-2">{{ __('Dashboard') }}</p>
            <h1 class="text-4xl font-bold tracking-tight">
                {{ __('Welcome back, :name.', ['name' => auth()->user()->name]) }}
            </h1>
        </header>

        @php
            $issue = auth()->user()->triageResult?->issue_type;
            $upcoming = auth()->user()->appointments()
                ->where('status', \App\Enums\AppointmentStatus::Scheduled->value)
                ->where('scheduled_at', '>', now())
                ->with('psychologist')
                ->orderBy('scheduled_at')
                ->get();
        @endphp

        @if ($issue)
            <section class="hairline p-6 flex items-center justify-between gap-6">
                <div>
                    <p class="text-xs uppercase tracking-widest text-neutral-500">{{ __('Your program') }}</p>
                    <p class="text-2xl font-semibold mt-1">{{ $issue->label() }}</p>
                </div>
                <a href="{{ $issue->programRoute() }}" class="btn-primary">{{ __('View available sessions') }} →</a>
            </section>
        @endif

        <section>
            <h2 class="text-xl font-semibold tracking-tight mb-4">{{ __('Upcoming appointments') }}</h2>

            @if ($upcoming->isEmpty())
                <div class="hairline p-8 text-center text-neutral-500">
                    {{ __('No upcoming appointments yet.') }}
                </div>
            @else
                <ul class="divide-y divide-neutral-900 hairline">
                    @foreach ($upcoming as $appt)
                        <li class="p-5 flex items-center justify-between gap-4">
                            <div>
                                <p class="font-semibold">{{ $appt->psychologist->name }}</p>
                                <p class="text-sm text-neutral-700 mt-1">
                                    {{ $appt->scheduled_at->locale(app()->getLocale())->translatedFormat('l j F · H:i') }}
                                </p>
                            </div>
                            <form method="POST" action="{{ route('appointments.destroy', $appt) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm underline underline-offset-4">{{ __('Cancel') }}</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            @endif
        </section>
    </div>
@endsection
