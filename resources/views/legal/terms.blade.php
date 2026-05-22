@extends('layouts.app')

@section('title', __('Terms & conditions'))
@section('description', __('Terms of use governing the Spaid platform.'))

@section('content')
    <article class="max-w-3xl mx-auto space-y-8">
        <header>
            <p class="section-eyebrow mb-3">{{ __('Legal') }}</p>
            <h1 class="text-4xl font-bold tracking-tight">{{ __('Terms & conditions') }}</h1>
            <p class="text-xs text-neutral-500 mt-3">
                {{ __('Last updated: :date', ['date' => '2026-05-22']) }}
            </p>
        </header>

        <section class="space-y-3">
            <h2 class="text-xl font-semibold">{{ __('1. Scope') }}</h2>
            <p class="text-neutral-700 leading-relaxed">
                {{ __('These terms govern your use of the Spaid platform. By registering you accept these terms and the privacy policy.') }}
            </p>
        </section>

        <section class="space-y-3">
            <h2 class="text-xl font-semibold">{{ __('2. Eligibility') }}</h2>
            <p class="text-neutral-700 leading-relaxed">
                {{ __('Spaid is available only to employees of corporate clients with an active subscription. Registration is restricted to whitelisted corporate email domains.') }}
            </p>
        </section>

        <section class="space-y-3">
            <h2 class="text-xl font-semibold">{{ __('3. Bookings') }}</h2>
            <p class="text-neutral-700 leading-relaxed">
                {{ __('Each user may hold a maximum of two active appointments at any time. Cancellation must occur at least 24 hours before the session.') }}
            </p>
        </section>

        <section class="space-y-3">
            <h2 class="text-xl font-semibold">{{ __('4. Clinical limitations') }}</h2>
            <p class="text-neutral-700 leading-relaxed">
                {{ __('Spaid is not a substitute for emergency care. In crisis situations contact 112 or the Belgian suicide helpline 1813.') }}
            </p>
        </section>

        <section class="space-y-3">
            <h2 class="text-xl font-semibold">{{ __('5. Liability') }}</h2>
            <p class="text-neutral-700 leading-relaxed">
                {{ __('Spaid acts as a platform intermediary. Clinical responsibility lies with the practicing psychologist. Spaid limits liability to direct, foreseeable damages.') }}
            </p>
        </section>

        <section class="space-y-3">
            <h2 class="text-xl font-semibold">{{ __('6. Governing law') }}</h2>
            <p class="text-neutral-700 leading-relaxed">
                {{ __('Belgian law applies. Disputes fall under the jurisdiction of the courts of Leuven.') }}
            </p>
        </section>
    </article>
@endsection
