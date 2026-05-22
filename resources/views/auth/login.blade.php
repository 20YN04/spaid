@extends('layouts.app')

@section('title', __('Sign in'))

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 max-w-5xl mx-auto">
        <div class="lg:col-span-5 space-y-6" data-reveal>
            <p class="eyebrow">{{ __('Sign in') }}</p>
            <h1 class="font-serif text-h1 leading-tight">{{ __('Welcome back.') }} <em class="text-sage-700">{{ __('Your sessions await.') }}</em></h1>
            <p class="text-ink/70 leading-relaxed max-w-md">{{ __('Sign in with the email your employer activated.') }}</p>
            <p class="text-sm text-ink/55 pt-4">{{ __('No account yet?') }} <a href="{{ route('register') }}" class="link-underline">{{ __('Register') }}</a></p>
        </div>

        <div class="lg:col-span-7" data-reveal style="transition-delay:.1s">
            <div class="rounded-3xl bg-alabaster border border-ink/10 shadow-sanctuary p-10 md:p-12">
                @if (session('status'))
                    <div class="rounded-xl bg-sage-50 border border-sage-200 px-5 py-3 text-sm text-sage-800 mb-6">{{ session('status') }}</div>
                @endif
                @if ($errors->any())
                    <div class="rounded-xl bg-tallow-100 border border-tallow-500/60 px-5 py-3 text-sm mb-6">
                        @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-7">
                    @csrf
                    <label class="field-label"><span>{{ __('Email') }}</span>
                        <input type="email" name="email" required autofocus autocomplete="email" value="{{ old('email') }}" class="field">
                    </label>
                    <label class="field-label"><span>{{ __('Password') }}</span>
                        <input type="password" name="password" required autocomplete="current-password" class="field">
                    </label>
                    <div class="flex items-center justify-between text-sm">
                        <label class="inline-flex items-center gap-2"><input type="checkbox" name="remember" value="1" class="accent-ink"> {{ __('Remember me') }}</label>
                        <a href="{{ route('password.request') }}" class="link-underline">{{ __('Forgot password?') }}</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-full justify-center" data-magnetic>
                        {{ __('Sign in') }}
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
