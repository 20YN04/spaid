@extends('layouts.app')

@section('title', __('Forgot password?'))

@section('content')
    <div class="max-w-xl mx-auto" data-reveal>
        <p class="eyebrow">{{ __('Forgot password?') }}</p>
        <h1 class="font-serif text-h1 leading-tight mt-3">{{ __('Reset in a minute.') }}</h1>
        <p class="text-ink/70 mt-3 max-w-md">{{ __('Enter your email and we will send you a reset link.') }}</p>

        <div class="rounded-3xl bg-alabaster border border-ink/10 shadow-sanctuary p-10 md:p-12 mt-8">
            @if (session('status'))
                <div class="rounded-xl bg-sage-50 border border-sage-200 px-5 py-3 text-sm text-sage-800 mb-6">{{ session('status') }}</div>
            @endif
            @if ($errors->any())
                <div class="rounded-xl bg-tallow-100 border border-tallow-500/60 px-5 py-3 text-sm mb-6">
                    @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-7">
                @csrf
                <label class="field-label"><span>{{ __('Email') }}</span>
                    <input type="email" name="email" required autofocus autocomplete="email" value="{{ old('email') }}" class="field">
                </label>
                <div class="flex items-center justify-between pt-2">
                    <a href="{{ route('login') }}" class="link-underline text-sm">{{ __('Back to sign in') }}</a>
                    <button type="submit" class="btn btn-primary" data-magnetic>{{ __('Send reset link') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
