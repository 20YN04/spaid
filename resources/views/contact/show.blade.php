@extends('layouts.app')

@section('title', __('Contact'))
@section('description', __('Reach Spaid — book a no-obligation intake for your company.'))

@section('full-bleed')
    <section class="relative overflow-hidden">
        <div class="blob bg-sage-200 w-[36rem] h-[36rem] -top-20 -left-32 opacity-50 animate-ambient"></div>
        <div class="blob bg-tallow-300 w-[30rem] h-[30rem] bottom-10 -right-20 opacity-40 animate-ambient" style="animation-delay:-6s"></div>

        <div class="relative mx-auto max-w-7xl px-6 lg:px-10 py-24">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
                <div class="lg:col-span-5 space-y-8" data-reveal>
                    <p class="eyebrow">{{ __('Contact') }}</p>
                    <h1 class="font-serif text-h1 leading-tight">{{ __('Talk to us about your') }} <em class="text-sage-700">{{ __('workforce') }}</em>.</h1>
                    <p class="text-ink/70 leading-relaxed max-w-md">{{ __('A 30-minute intake. We map your workforce, scope a pilot, and answer every clinical + procurement question.') }}</p>

                    <div class="space-y-6 pt-4">
                        <div>
                            <p class="eyebrow">{{ __('Email') }}</p>
                            <a href="mailto:office@spaid.be" class="font-serif text-2xl link-underline">office@spaid.be</a>
                        </div>
                        <div>
                            <p class="eyebrow">{{ __('Response time') }}</p>
                            <p class="text-ink/80">{{ __('Within two working days.') }}</p>
                        </div>
                        <div>
                            <p class="eyebrow">{{ __('Approach') }}</p>
                            <p class="text-ink/80">{{ __('Free intake. Scoped per workforce size.') }}</p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7" data-reveal style="transition-delay:.15s">
                    <div class="relative rounded-3xl bg-alabaster shadow-sanctuary border border-ink/10 p-10 md:p-14">
                        @if (session('status'))
                            <div class="rounded-xl bg-sage-50 border border-sage-200 px-5 py-3 text-sm text-sage-800 mb-8">{{ session('status') }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="rounded-xl bg-tallow-100 border border-tallow-500/60 px-5 py-3 text-sm text-ink mb-8">
                                @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.send') }}" class="space-y-8">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                                <label class="field-label">
                                    <span>{{ __('Name') }}</span>
                                    <input type="text" name="name" required autocomplete="name" value="{{ old('name') }}" class="field">
                                </label>
                                <label class="field-label">
                                    <span>{{ __('Email') }}</span>
                                    <input type="email" name="email" required autocomplete="email" value="{{ old('email') }}" class="field">
                                </label>
                            </div>
                            <label class="field-label">
                                <span>{{ __('Company') }}</span>
                                <input type="text" name="company" autocomplete="organization" value="{{ old('company') }}" class="field">
                            </label>
                            <label class="field-label">
                                <span>{{ __('Message') }}</span>
                                <textarea name="message" rows="5" required class="field resize-none">{{ old('message') }}</textarea>
                            </label>
                            <div class="flex justify-end pt-2">
                                <button type="submit" class="btn btn-primary" data-magnetic>
                                    {{ __('Send message') }}
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
