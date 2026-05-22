@extends('layouts.app')

@section('title', __('Register'))

@section('content')
    <div class="max-w-md mx-auto">
        <h1 class="text-3xl font-bold tracking-tight mb-2">{{ __('Register') }}</h1>
        <p class="text-sm text-neutral-600 mb-8">
            {{ __('Use your corporate email address. Only authorized employer domains can register.') }}
        </p>

        @if ($errors->any())
            <div class="hairline border-red-600 text-red-700 px-4 py-3 text-sm mb-6">
                @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <label class="block">
                <span class="text-xs uppercase tracking-widest text-neutral-500">{{ __('Name') }}</span>
                <input type="text" name="name" required autofocus autocomplete="name"
                       value="{{ old('name') }}"
                       class="mt-1 w-full hairline px-3 py-2 bg-white">
            </label>

            <label class="block">
                <span class="text-xs uppercase tracking-widest text-neutral-500">{{ __('Corporate email') }}</span>
                <input type="email" name="email" required autocomplete="email"
                       value="{{ old('email') }}"
                       class="mt-1 w-full hairline px-3 py-2 bg-white">
            </label>

            <label class="block">
                <span class="text-xs uppercase tracking-widest text-neutral-500">{{ __('Password') }}</span>
                <input type="password" name="password" required autocomplete="new-password"
                       class="mt-1 w-full hairline px-3 py-2 bg-white">
            </label>

            <label class="block">
                <span class="text-xs uppercase tracking-widest text-neutral-500">{{ __('Confirm password') }}</span>
                <input type="password" name="password_confirmation" required autocomplete="new-password"
                       class="mt-1 w-full hairline px-3 py-2 bg-white">
            </label>

            <div class="flex items-center justify-between pt-2">
                <a href="{{ route('login') }}" class="text-sm underline underline-offset-4">{{ __('Already registered?') }}</a>
                <button type="submit" class="btn-primary">{{ __('Register') }} →</button>
            </div>
        </form>
    </div>
@endsection
