@extends('layouts.app')

@section('title', __('Reset password'))

@section('content')
    <div class="max-w-xl mx-auto" data-reveal>
        <p class="eyebrow">{{ __('Reset password') }}</p>
        <h1 class="font-serif text-h1 leading-tight mt-3">{{ __('Choose a new password.') }}</h1>

        <div class="rounded-3xl bg-alabaster border border-ink/10 shadow-sanctuary p-10 md:p-12 mt-8">
            @if ($errors->any())
                <div class="rounded-xl bg-tallow-100 border border-tallow-500/60 px-5 py-3 text-sm mb-6">
                    @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}" class="space-y-7">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <label class="field-label"><span>{{ __('Email') }}</span>
                    <input type="email" name="email" required autofocus autocomplete="email" value="{{ old('email', $request->email) }}" class="field">
                </label>
                <label class="field-label"><span>{{ __('New password') }}</span>
                    <input type="password" name="password" required autocomplete="new-password" class="field">
                </label>
                <label class="field-label"><span>{{ __('Confirm password') }}</span>
                    <input type="password" name="password_confirmation" required autocomplete="new-password" class="field">
                </label>
                <div class="flex justify-end pt-2">
                    <button type="submit" class="btn btn-primary" data-magnetic>{{ __('Reset password') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
