@extends('layouts.app')

@section('title', __('Forgot password?'))

@section('content')
    <div class="max-w-md mx-auto">
        <h1 class="text-3xl font-bold tracking-tight mb-2">{{ __('Forgot password?') }}</h1>
        <p class="text-sm text-neutral-600 mb-8">{{ __('Enter your email and we will send you a reset link.') }}</p>

        @if (session('status'))
            <div class="hairline px-4 py-3 text-sm mb-6">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="hairline border-red-600 text-red-700 px-4 py-3 text-sm mb-6">
                @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <label class="block">
                <span class="text-xs uppercase tracking-widest text-neutral-500">{{ __('Email') }}</span>
                <input type="email" name="email" required autofocus autocomplete="email"
                       value="{{ old('email') }}"
                       class="mt-1 w-full hairline px-3 py-2 bg-white">
            </label>

            <div class="flex items-center justify-between pt-2">
                <a href="{{ route('login') }}" class="text-sm underline underline-offset-4">{{ __('Back to sign in') }}</a>
                <button type="submit" class="btn-primary">{{ __('Send reset link') }} →</button>
            </div>
        </form>
    </div>
@endsection
