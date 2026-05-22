@extends('layouts.app')

@section('title', __('Verify email'))

@section('content')
    <div class="max-w-xl mx-auto" data-reveal>
        <p class="eyebrow">{{ __('Verify email') }}</p>
        <h1 class="font-serif text-h1 leading-tight mt-3">{{ __('Verify your email') }}</h1>
        <p class="text-ink/70 mt-4 leading-relaxed">{{ __('We sent a verification link to your inbox. Click it to activate your account.') }}</p>

        @if (session('status') === 'verification-link-sent')
            <div class="rounded-xl bg-sage-50 border border-sage-200 px-5 py-3 text-sm text-sage-800 mt-6">{{ __('A new verification link has been sent.') }}</div>
        @endif

        <div class="flex flex-wrap items-center gap-4 mt-8">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary" data-magnetic>{{ __('Resend verification email') }}</button>
            </form>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="link-underline text-sm">{{ __('Logout') }}</button>
            </form>
        </div>
    </div>
@endsection
