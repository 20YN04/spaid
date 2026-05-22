@extends('layouts.app')

@section('title', __('Reset password'))

@section('content')
    <div class="max-w-md mx-auto">
        <h1 class="text-3xl font-bold tracking-tight mb-8">{{ __('Reset password') }}</h1>

        @if ($errors->any())
            <div class="hairline border-red-600 text-red-700 px-4 py-3 text-sm mb-6">
                @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <label class="block">
                <span class="text-xs uppercase tracking-widest text-neutral-500">{{ __('Email') }}</span>
                <input type="email" name="email" required autofocus autocomplete="email"
                       value="{{ old('email', $request->email) }}"
                       class="mt-1 w-full hairline px-3 py-2 bg-white">
            </label>

            <label class="block">
                <span class="text-xs uppercase tracking-widest text-neutral-500">{{ __('New password') }}</span>
                <input type="password" name="password" required autocomplete="new-password"
                       class="mt-1 w-full hairline px-3 py-2 bg-white">
            </label>

            <label class="block">
                <span class="text-xs uppercase tracking-widest text-neutral-500">{{ __('Confirm password') }}</span>
                <input type="password" name="password_confirmation" required autocomplete="new-password"
                       class="mt-1 w-full hairline px-3 py-2 bg-white">
            </label>

            <div class="flex justify-end pt-2">
                <button type="submit" class="btn-primary">{{ __('Reset password') }} →</button>
            </div>
        </form>
    </div>
@endsection
