@extends('layouts.app')

@section('title', __('Contact'))
@section('description', __('Reach Spaid, book a no-obligation intake for your company.'))

@section('full-bleed')
    <section class="relative overflow-hidden">
        <div class="blob bg-sage-400 w-[34rem] h-[34rem] -top-20 -left-24 opacity-55 animate-ambient"></div>
        <div class="blob bg-tallow-500 w-[28rem] h-[28rem] bottom-10 -right-12 opacity-40 animate-ambient" style="animation-delay:-6s"></div>

        <div class="relative mx-auto max-w-7xl px-6 lg:px-10 py-20 lg:py-28">
            <div class="grid grid-cols-12 gap-10 lg:gap-16">
                <div class="col-span-12 lg:col-span-5 space-y-10" data-reveal>
                    <div class="space-y-6">
                        <p class="kicker">{{ __('Contact') }}</p>
                        <h1 class="font-serif text-display font-normal leading-[0.9] text-ink">
                            {{ __('Let us know') }}<br>
                            <em class="text-sage-700">{{ __('what your team needs.') }}</em>
                        </h1>
                        <p class="text-lg text-ink/75 leading-relaxed max-w-md">
                            {{ __('A 30-minute intake. We map your workforce, scope a pilot, and answer every clinical and procurement question.') }}
                        </p>
                    </div>

                    <dl class="space-y-6">
                        <div>
                            <dt class="kicker">{{ __('Email') }}</dt>
                            <dd><a href="mailto:office@spaid.be" class="font-serif text-2xl italic link-underline">office@spaid.be</a></dd>
                        </div>
                        <div>
                            <dt class="kicker">{{ __('Response time') }}</dt>
                            <dd class="text-ink/85">{{ __('Within two working days.') }}</dd>
                        </div>
                        <div>
                            <dt class="kicker">{{ __('Approach') }}</dt>
                            <dd class="text-ink/85">{{ __('Free intake. Scoped per workforce size.') }}</dd>
                        </div>
                    </dl>
                </div>

                <div class="col-span-12 lg:col-span-7" data-reveal style="transition-delay:.15s">
                    <div class="relative rounded-3xl bg-alabaster shadow-sanctuary border border-sage-700/20 p-8 md:p-12">
                        @if (session('status'))
                            <div class="rounded-xl bg-sage-50 border border-sage-200 px-5 py-3 text-sm text-sage-800 mb-8 italic font-serif">{{ session('status') }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="rounded-xl bg-tallow-100 border border-tallow-500/60 px-5 py-3 text-sm text-ink mb-8">
                                @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.send') }}" class="space-y-8">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                                <label class="field-label"><span>{{ __('Name') }}</span>
                                    <input type="text" name="name" required autocomplete="name" value="{{ old('name') }}" class="field">
                                </label>
                                <label class="field-label"><span>{{ __('Email') }}</span>
                                    <input type="email" name="email" required autocomplete="email" value="{{ old('email') }}" class="field">
                                </label>
                            </div>
                            <label class="field-label"><span>{{ __('Company') }}</span>
                                <input type="text" name="company" autocomplete="organization" value="{{ old('company') }}" class="field">
                            </label>
                            <label class="field-label"><span>{{ __('Message') }}</span>
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
