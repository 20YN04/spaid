@extends('layouts.app')

@section('title', __('Verify email'))

@section('content')
    <div class="max-w-md mx-auto">
        <h1 class="text-3xl font-bold tracking-tight mb-3">{{ __('Verify your email') }}</h1>
        <p class="text-sm text-neutral-700 mb-6 leading-relaxed">
            {{ __('We sent a verification link to your inbox. Click it to activate your account.') }}
        </p>

        @if (session('status') === 'verification-link-sent')
            <div class="hairline px-4 py-3 text-sm mb-6">
                {{ __('A new verification link has been sent.') }}
            </div>
        @endif

        <div class="flex items-center gap-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn-primary">{{ __('Resend verification email') }}</button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm underline underline-offset-4">{{ __('Logout') }}</button>
            </form>
        </div>
    </div>
@endsection
