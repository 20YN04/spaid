@extends('layouts.app')

@section('title', __('Sign in'))

@section('content')
    <div class="max-w-md mx-auto">
        <h1 class="text-3xl font-bold tracking-tight mb-8">{{ __('Sign in') }}</h1>

        @if (session('status'))
            <div class="hairline px-4 py-3 text-sm mb-6">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="hairline border-red-600 text-red-700 px-4 py-3 text-sm mb-6">
                @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <label class="block">
                <span class="text-xs uppercase tracking-widest text-neutral-500">{{ __('Email') }}</span>
                <input type="email" name="email" required autofocus autocomplete="email"
                       value="{{ old('email') }}"
                       class="mt-1 w-full hairline px-3 py-2 bg-white">
            </label>

            <label class="block">
                <span class="text-xs uppercase tracking-widest text-neutral-500">{{ __('Password') }}</span>
                <input type="password" name="password" required autocomplete="current-password"
                       class="mt-1 w-full hairline px-3 py-2 bg-white">
            </label>

            <label class="flex items-center gap-2 text-sm">
                <input type="checkbox" name="remember" value="1" class="accent-black">
                {{ __('Remember me') }}
            </label>

            <div class="flex items-center justify-between pt-2">
                <a href="{{ route('password.request') }}" class="text-sm underline underline-offset-4">
                    {{ __('Forgot password?') }}
                </a>
                <button type="submit" class="btn-primary">{{ __('Sign in') }} →</button>
            </div>
        </form>

        <p class="text-sm text-neutral-600 mt-8">
            {{ __('No account yet?') }}
            <a href="{{ route('register') }}" class="underline underline-offset-4 font-medium">{{ __('Register') }}</a>
        </p>
    </div>
@endsection
