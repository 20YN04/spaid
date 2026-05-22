@extends('layouts.app')

@section('title', __('Accessibility statement'))
@section('description', __("Spaid's commitment to WCAG accessibility."))

@section('content')
    <article class="max-w-3xl mx-auto space-y-8">
        <header>
            <p class="section-eyebrow mb-3">{{ __('Legal') }}</p>
            <h1 class="text-4xl font-bold tracking-tight">{{ __('Accessibility statement') }}</h1>
            <p class="text-xs text-neutral-500 mt-3">
                {{ __('Last updated: :date', ['date' => '2026-05-22']) }}
            </p>
        </header>

        <section class="space-y-3">
            <h2 class="text-xl font-semibold">{{ __('Standard') }}</h2>
            <p class="text-neutral-700 leading-relaxed">
                {{ __('Spaid targets WCAG 2.1 level AA. The platform is designed mobile-first with semantic HTML, sufficient color contrast, keyboard navigation, and clear focus indicators.') }}
            </p>
        </section>

        <section class="space-y-3">
            <h2 class="text-xl font-semibold">{{ __('Known gaps') }}</h2>
            <p class="text-neutral-700 leading-relaxed">
                {{ __('We are working toward full screen-reader audit coverage. Some Filament admin-only screens are not yet fully compliant. Report issues to office@spaid.be — we respond within 5 working days.') }}
            </p>
        </section>

        <section class="space-y-3">
            <h2 class="text-xl font-semibold">{{ __('Enforcement') }}</h2>
            <p class="text-neutral-700 leading-relaxed">
                {{ __('If you believe Spaid is not meeting accessibility obligations, you may file a complaint with the Federal Public Service Policy and Support (BOSA) or the Belgian Federal Ombudsman.') }}
            </p>
        </section>
    </article>
@endsection
