@extends('layouts.app')

@section('title', __('Privacy policy'))
@section('description', __('How Spaid collects, uses, and protects personal data.'))

@section('content')
    <article class="max-w-3xl mx-auto prose-spaid space-y-8">
        <header>
            <p class="section-eyebrow mb-3">{{ __('Legal') }}</p>
            <h1 class="text-4xl font-bold tracking-tight">{{ __('Privacy policy') }}</h1>
            <p class="text-xs text-neutral-500 mt-3">
                {{ __('Last updated: :date', ['date' => '2026-05-22']) }}
            </p>
        </header>

        <section class="space-y-3">
            <h2 class="text-xl font-semibold">{{ __('1. Data controller') }}</h2>
            <p class="text-neutral-700 leading-relaxed">
                {{ __('Spaid BV is responsible for processing personal data collected via this platform. Contact: office@spaid.be.') }}
            </p>
        </section>

        <section class="space-y-3">
            <h2 class="text-xl font-semibold">{{ __('2. Data we collect') }}</h2>
            <ul class="list-disc pl-5 text-neutral-700 leading-relaxed space-y-1">
                <li>{{ __('Account data: name, corporate email, employer linkage.') }}</li>
                <li>{{ __('Triage answers: diagnosis category, medication use, active treatment status.') }}</li>
                <li>{{ __('Booking data: psychologist selection, appointment timestamps.') }}</li>
                <li>{{ __('Technical data: session identifiers, IP address, browser locale.') }}</li>
            </ul>
        </section>

        <section class="space-y-3">
            <h2 class="text-xl font-semibold">{{ __('3. Legal basis') }}</h2>
            <p class="text-neutral-700 leading-relaxed">
                {{ __('We process data under GDPR Art. 6(1)(b) (contract performance) and Art. 9(2)(h) (provision of health care). Sensitive triage data is processed under strict access controls.') }}
            </p>
        </section>

        <section class="space-y-3">
            <h2 class="text-xl font-semibold">{{ __('4. Sharing') }}</h2>
            <p class="text-neutral-700 leading-relaxed">
                {{ __('Triage data is shared only with the psychologist you book. Your employer never sees clinical data — only aggregated, anonymized usage metrics.') }}
            </p>
        </section>

        <section class="space-y-3">
            <h2 class="text-xl font-semibold">{{ __('5. Your rights') }}</h2>
            <p class="text-neutral-700 leading-relaxed">
                {{ __('Under GDPR you may request access, rectification, deletion, restriction, or portability of your data. Contact office@spaid.be. Complaints: Belgian Data Protection Authority (gegevensbeschermingsautoriteit.be).') }}
            </p>
        </section>

        <section class="space-y-3">
            <h2 class="text-xl font-semibold">{{ __('6. Retention') }}</h2>
            <p class="text-neutral-700 leading-relaxed">
                {{ __('Account data retained while the employer contract is active. Clinical booking data retained 10 years per medical record law. Anonymized analytics may be retained indefinitely.') }}
            </p>
        </section>

        <section class="space-y-3">
            <h2 class="text-xl font-semibold">{{ __('7. Cookies') }}</h2>
            <p class="text-neutral-700 leading-relaxed">
                {{ __('See our :link for details.', ['link' => ''])  }}
                <a href="{{ route('legal.cookies') }}" class="underline underline-offset-4">{{ __('Cookie policy') }}</a>.
            </p>
        </section>
    </article>
@endsection
