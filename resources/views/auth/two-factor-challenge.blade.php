@extends('layouts.app')

@section('title', __('Two-factor challenge'))

@section('content')
    <div class="max-w-xl mx-auto" data-reveal>
        <p class="eyebrow">{{ __('Two-factor challenge') }}</p>
        <h1 class="font-serif text-h1 leading-tight mt-3">{{ __('Two-factor authentication') }}</h1>
        <p class="text-ink/70 mt-3">{{ __('Enter the 6-digit code from your authenticator app, or a recovery code.') }}</p>

        <div class="rounded-3xl bg-alabaster border border-ink/10 shadow-sanctuary p-10 md:p-12 mt-8">
            @if ($errors->any())
                <div class="rounded-xl bg-tallow-100 border border-tallow-500/60 px-5 py-3 text-sm mb-6">
                    @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('two-factor.login') }}" class="space-y-7">
                @csrf
                <label class="field-label"><span>{{ __('Authentication code') }}</span>
                    <input type="text" name="code" inputmode="numeric" autofocus autocomplete="one-time-code" class="field font-mono tracking-[0.4em]">
                </label>
                <label class="field-label"><span>{{ __('Recovery code') }}</span>
                    <input type="text" name="recovery_code" autocomplete="one-time-code" class="field font-mono tracking-[0.4em]">
                </label>
                <div class="flex justify-end">
                    <button type="submit" class="btn btn-primary" data-magnetic>{{ __('Verify') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
