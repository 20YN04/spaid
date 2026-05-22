@extends('layouts.app')

@section('title', __('Two-factor challenge'))

@section('content')
    <div class="max-w-md mx-auto">
        <h1 class="text-3xl font-bold tracking-tight mb-3">{{ __('Two-factor authentication') }}</h1>
        <p class="text-sm text-neutral-700 mb-6">
            {{ __('Enter the 6-digit code from your authenticator app, or a recovery code.') }}
        </p>

        @if ($errors->any())
            <div class="hairline border-red-600 text-red-700 px-4 py-3 text-sm mb-6">
                @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('two-factor.login') }}" class="space-y-5">
            @csrf

            <label class="block">
                <span class="text-xs uppercase tracking-widest text-neutral-500">{{ __('Authentication code') }}</span>
                <input type="text" name="code" inputmode="numeric" autofocus autocomplete="one-time-code"
                       class="mt-1 w-full hairline px-3 py-2 bg-white font-mono tracking-widest">
            </label>

            <label class="block">
                <span class="text-xs uppercase tracking-widest text-neutral-500">{{ __('Recovery code') }}</span>
                <input type="text" name="recovery_code" autocomplete="one-time-code"
                       class="mt-1 w-full hairline px-3 py-2 bg-white font-mono tracking-widest">
            </label>

            <div class="flex justify-end pt-2">
                <button type="submit" class="btn-primary">{{ __('Verify') }} →</button>
            </div>
        </form>
    </div>
@endsection
