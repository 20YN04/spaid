@extends('layouts.app')

@section('title', __('Contact'))
@section('description', __('Reach Spaid — book a no-obligation intake for your company.'))

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
        <section class="md:col-span-5 space-y-6">
            <div>
                <p class="section-eyebrow mb-3">{{ __('Contact') }}</p>
                <h1 class="text-4xl font-bold tracking-tight leading-tight">
                    {{ __('Talk to us about your workforce.') }}
                </h1>
                <p class="text-neutral-700 mt-4 leading-relaxed">
                    {{ __('We respond to every B2B request within two working days.') }}
                </p>
            </div>

            <div class="hairline p-5 space-y-3">
                <div>
                    <p class="section-eyebrow">{{ __('Email') }}</p>
                    <a href="mailto:office@spaid.be" class="font-semibold underline underline-offset-4">office@spaid.be</a>
                </div>
                <div>
                    <p class="section-eyebrow">{{ __('Approach') }}</p>
                    <p class="text-sm text-neutral-700">{{ __('Free intake call. Scoped per workforce size.') }}</p>
                </div>
            </div>
        </section>

        <section class="md:col-span-7">
            @if ($errors->any())
                <div class="hairline border-red-600 text-red-700 px-4 py-3 text-sm mb-6">
                    @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('contact.send') }}" class="space-y-5">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <label class="block">
                        <span class="text-xs uppercase tracking-widest text-neutral-500">{{ __('Name') }}</span>
                        <input type="text" name="name" required autocomplete="name"
                               value="{{ old('name') }}"
                               class="mt-1 w-full hairline px-3 py-2 bg-white">
                    </label>
                    <label class="block">
                        <span class="text-xs uppercase tracking-widest text-neutral-500">{{ __('Email') }}</span>
                        <input type="email" name="email" required autocomplete="email"
                               value="{{ old('email') }}"
                               class="mt-1 w-full hairline px-3 py-2 bg-white">
                    </label>
                </div>

                <label class="block">
                    <span class="text-xs uppercase tracking-widest text-neutral-500">{{ __('Company') }}</span>
                    <input type="text" name="company" autocomplete="organization"
                           value="{{ old('company') }}"
                           class="mt-1 w-full hairline px-3 py-2 bg-white">
                </label>

                <label class="block">
                    <span class="text-xs uppercase tracking-widest text-neutral-500">{{ __('Message') }}</span>
                    <textarea name="message" rows="6" required
                              class="mt-1 w-full hairline px-3 py-2 bg-white">{{ old('message') }}</textarea>
                </label>

                <div class="flex justify-end">
                    <button type="submit" class="btn-primary">{{ __('Send message') }} →</button>
                </div>
            </form>
        </section>
    </div>
@endsection
