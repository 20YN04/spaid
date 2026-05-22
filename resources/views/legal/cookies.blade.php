@extends('layouts.app')

@section('title', __('Cookie policy'))
@section('description', __('Cookies set by the Spaid platform and how to manage them.'))

@section('content')
    <article class="max-w-3xl mx-auto space-y-8">
        <header>
            <p class="section-eyebrow mb-3">{{ __('Legal') }}</p>
            <h1 class="text-4xl font-bold tracking-tight">{{ __('Cookie policy') }}</h1>
            <p class="text-xs text-neutral-500 mt-3">
                {{ __('Last updated: :date', ['date' => '2026-05-22']) }}
            </p>
        </header>

        <section class="space-y-3">
            <h2 class="text-xl font-semibold">{{ __('What we use') }}</h2>
            <div class="hairline overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-neutral-50 text-left">
                        <tr>
                            <th class="px-4 py-3 font-semibold">{{ __('Cookie') }}</th>
                            <th class="px-4 py-3 font-semibold">{{ __('Type') }}</th>
                            <th class="px-4 py-3 font-semibold">{{ __('Purpose') }}</th>
                            <th class="px-4 py-3 font-semibold">{{ __('Lifetime') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-neutral-200">
                        <tr>
                            <td class="px-4 py-3 font-mono">laravel-session</td>
                            <td class="px-4 py-3">{{ __('Essential') }}</td>
                            <td class="px-4 py-3">{{ __('Maintains your login session.') }}</td>
                            <td class="px-4 py-3">2 {{ __('hours') }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-mono">XSRF-TOKEN</td>
                            <td class="px-4 py-3">{{ __('Essential') }}</td>
                            <td class="px-4 py-3">{{ __('CSRF protection for form submissions.') }}</td>
                            <td class="px-4 py-3">2 {{ __('hours') }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-mono">cookie_consent</td>
                            <td class="px-4 py-3">{{ __('Essential') }}</td>
                            <td class="px-4 py-3">{{ __('Stores your cookie banner choice.') }}</td>
                            <td class="px-4 py-3">1 {{ __('year') }}</td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-mono">locale</td>
                            <td class="px-4 py-3">{{ __('Functional') }}</td>
                            <td class="px-4 py-3">{{ __('Remembers your language choice (NL/FR).') }}</td>
                            <td class="px-4 py-3">{{ __('Session') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <section class="space-y-3">
            <h2 class="text-xl font-semibold">{{ __('No tracking, no third-party') }}</h2>
            <p class="text-neutral-700 leading-relaxed">
                {{ __('We do not currently use analytics, advertising, or third-party cookies. Should that change we will request consent before any non-essential cookie is set.') }}
            </p>
        </section>

        <section class="space-y-3">
            <h2 class="text-xl font-semibold">{{ __('Managing cookies') }}</h2>
            <p class="text-neutral-700 leading-relaxed">
                {{ __('You can clear cookies via your browser settings. Clearing essential cookies will log you out and reset your language preference.') }}
            </p>
        </section>
    </article>
@endsection
