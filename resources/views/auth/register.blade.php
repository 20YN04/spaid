@extends('layouts.app')

@section('title', __('Register'))

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 max-w-5xl mx-auto">
        <div class="lg:col-span-5 space-y-6" data-reveal>
            <p class="eyebrow">{{ __('Register') }}</p>
            <h1 class="font-serif text-h1 leading-tight">{{ __('Activate your') }} <em class="text-sage-700">{{ __('sanctuary access') }}</em>.</h1>
            <p class="text-ink/70 leading-relaxed max-w-md">{{ __('Use your corporate email address. Only authorized employer domains can register.') }}</p>
            <p class="text-sm text-ink/55 pt-4">{{ __('Already registered?') }} <a href="{{ route('login') }}" class="link-underline">{{ __('Sign in') }}</a></p>
        </div>

        <div class="lg:col-span-7" data-reveal style="transition-delay:.1s">
            <div class="rounded-3xl bg-alabaster border border-ink/10 shadow-sanctuary p-10 md:p-12">
                @if ($errors->any())
                    <div class="rounded-xl bg-tallow-100 border border-tallow-500/60 px-5 py-3 text-sm mb-6">
                        @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-7">
                    @csrf
                    <label class="field-label"><span>{{ __('Name') }}</span>
                        <input type="text" name="name" required autofocus autocomplete="name" value="{{ old('name') }}" class="field">
                    </label>
                    <label class="field-label"><span>{{ __('Corporate email') }}</span>
                        <input type="email" name="email" required autocomplete="email" value="{{ old('email') }}" class="field">
                    </label>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-7">
                        <label class="field-label"><span>{{ __('Password') }}</span>
                            <input type="password" name="password" required autocomplete="new-password" class="field">
                        </label>
                        <label class="field-label"><span>{{ __('Confirm password') }}</span>
                            <input type="password" name="password_confirmation" required autocomplete="new-password" class="field">
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary w-full justify-center" data-magnetic>
                        {{ __('Register') }}
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
