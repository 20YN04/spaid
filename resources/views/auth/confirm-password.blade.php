@extends('layouts.app')

@section('title', __('Confirm password'))

@section('content')
    <div class="max-w-xl mx-auto" data-reveal>
        <p class="eyebrow">{{ __('Confirm password') }}</p>
        <h1 class="font-serif text-h1 leading-tight mt-3">{{ __('Confirm password') }}</h1>
        <p class="text-ink/70 mt-3">{{ __('Please confirm your password before continuing.') }}</p>

        <div class="rounded-3xl bg-alabaster border border-ink/10 shadow-sanctuary p-10 md:p-12 mt-8">
            @if ($errors->any())
                <div class="rounded-xl bg-tallow-100 border border-tallow-500/60 px-5 py-3 text-sm mb-6">
                    @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-7">
                @csrf
                <label class="field-label"><span>{{ __('Password') }}</span>
                    <input type="password" name="password" required autofocus autocomplete="current-password" class="field">
                </label>
                <div class="flex justify-end">
                    <button type="submit" class="btn btn-primary" data-magnetic>{{ __('Confirm') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
