@extends('layouts.app')

@section('title', __('Confirm password'))

@section('content')
    <div class="max-w-md mx-auto">
        <h1 class="text-3xl font-bold tracking-tight mb-3">{{ __('Confirm password') }}</h1>
        <p class="text-sm text-neutral-700 mb-6">
            {{ __('Please confirm your password before continuing.') }}
        </p>

        @if ($errors->any())
            <div class="hairline border-red-600 text-red-700 px-4 py-3 text-sm mb-6">
                @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-5">
            @csrf

            <label class="block">
                <span class="text-xs uppercase tracking-widest text-neutral-500">{{ __('Password') }}</span>
                <input type="password" name="password" required autofocus autocomplete="current-password"
                       class="mt-1 w-full hairline px-3 py-2 bg-white">
            </label>

            <div class="flex justify-end">
                <button type="submit" class="btn-primary">{{ __('Confirm') }} →</button>
            </div>
        </form>
    </div>
@endsection
