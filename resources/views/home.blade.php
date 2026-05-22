@extends('layouts.app')

@section('title', __('Mentally stronger, professionally more powerful.'))
@section('description', __('Spaid is a B2B wellness platform for parents of neurodivergent children, embedded in the employee benefits stack.'))

@section('full-bleed')
    {{-- HERO --}}
    <section class="hairline border-x-0 border-t-0 bg-neutral-50">
        <div class="mx-auto max-w-6xl px-6 py-24 grid grid-cols-1 md:grid-cols-12 gap-10 items-center">
            <div class="md:col-span-7 space-y-6">
                <p class="section-eyebrow">{{ __('B2B employee wellness') }}</p>
                <h1 class="text-5xl md:text-6xl font-bold tracking-tight leading-[1.05]">
                    {{ __('Mentally stronger,') }}<br>
                    {{ __('professionally more powerful.') }}
                </h1>
                <p class="text-lg text-neutral-700 leading-relaxed max-w-xl">
                    {{ __('Spaid connects employees who have children with a neurodivergent diagnosis to specialized psychologists, so they can stay focused at work and present at home.') }}
                </p>
                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <a href="{{ route('contact.show') }}" class="btn-primary">{{ __('Talk to us about your team') }} →</a>
                    <a href="{{ route('programmas.index') }}" class="btn-ghost">{{ __('Explore the program') }}</a>
                </div>
            </div>

            <div class="md:col-span-5">
                <div class="hairline aspect-[4/5] flex items-end p-6 bg-white">
                    <div>
                        <p class="section-eyebrow mb-2">{{ __('Did you know') }}</p>
                        <p class="text-2xl font-semibold tracking-tight leading-snug">
                            {{ __('10–20% of school-age children deal with a learning or neurodevelopmental disorder.') }}
                        </p>
                        <p class="text-xs text-neutral-500 mt-3">
                            {{ __('Source: KU Leuven Psychology & Educational Sciences') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- WAAROM VIA WERKGEVER --}}
    <section class="mx-auto max-w-6xl px-6 py-20">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
            <div class="md:col-span-4">
                <p class="section-eyebrow mb-3">{{ __('Why through the employer?') }}</p>
                <h2 class="text-3xl font-bold tracking-tight leading-tight">
                    {{ __('A modern HR lever for talent, retention and prevention.') }}
                </h2>
            </div>
            <div class="md:col-span-8 grid grid-cols-1 sm:grid-cols-3 gap-6">
                @foreach ([
                    ['01', __('Modern HR policy'), __('Fits talent attraction and retention strategies.')],
                    ['02', __('Support in tough life phases'), __('Optimal employer-led help when families need it.')],
                    ['03', __('Prevent absenteeism'), __('Proactive prevention reduces turnover and sick days.')],
                ] as [$num, $title, $body])
                    <div class="hairline p-5">
                        <p class="section-eyebrow">{{ $num }}</p>
                        <p class="font-semibold mt-2">{{ $title }}</p>
                        <p class="text-sm text-neutral-700 mt-2 leading-relaxed">{{ $body }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- VOOR WIE --}}
    <section class="bg-neutral-900 text-white">
        <div class="mx-auto max-w-6xl px-6 py-20">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
                <div class="md:col-span-5">
                    <p class="section-eyebrow text-neutral-400 mb-3">{{ __('Who is Spaid for?') }}</p>
                    <h2 class="text-3xl font-bold tracking-tight leading-tight">
                        {{ __('Employees with children aged 5–18 carrying a clinical diagnosis.') }}
                    </h2>
                    <p class="text-neutral-300 mt-4 leading-relaxed">
                        {{ __('One program, five clinical pathways — each routed to a psychologist who actually specializes in that diagnosis.') }}
                    </p>
                </div>

                <div class="md:col-span-7 grid grid-cols-2 sm:grid-cols-3 gap-3">
                    @foreach ($issueTypes as $issue)
                        <div class="border border-neutral-700 p-4">
                            <p class="font-semibold">{{ $issue->label() }}</p>
                            <p class="text-xs text-neutral-400 mt-1">{{ strtoupper($issue->value) }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- TEAM --}}
    <section class="mx-auto max-w-6xl px-6 py-20">
        <p class="section-eyebrow mb-3">{{ __('The team') }}</p>
        <h2 class="text-3xl font-bold tracking-tight leading-tight mb-10">
            {{ __('Built by clinicians, scaled by operators.') }}
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            @foreach ([
                ['Ria', __('Certified coach — career and parenting guidance.')],
                ['Martine', __('Physician — clinical trajectory development.')],
                ['Marc', __('Business advisor — operations and efficiency.')],
            ] as [$name, $role])
                <div class="hairline p-6">
                    <p class="text-xl font-semibold">{{ $name }}</p>
                    <p class="text-sm text-neutral-700 mt-2 leading-relaxed">{{ $role }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- KU LEUVEN PARTNERSHIP --}}
    <section class="bg-neutral-50 hairline border-x-0">
        <div class="mx-auto max-w-6xl px-6 py-16 grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
            <div class="md:col-span-7">
                <p class="section-eyebrow mb-3">{{ __('Scientific partnership') }}</p>
                <h2 class="text-2xl font-bold tracking-tight">
                    {{ __('Developed with KU Leuven faculty of Psychology & Educational Sciences.') }}
                </h2>
                <p class="text-neutral-700 mt-3 leading-relaxed">
                    {{ __('In collaboration with Prof. Dr. Dieter Baeyens and Prof. Dr. Karla Van Leeuwen.') }}
                </p>
            </div>
            <div class="md:col-span-5">
                <div class="hairline p-6 text-center bg-white">
                    <p class="text-xs uppercase tracking-widest text-neutral-500">KU Leuven</p>
                    <p class="font-bold text-lg mt-2">{{ __('Psychology & Educational Sciences') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- B2B CTA --}}
    <section class="mx-auto max-w-6xl px-6 py-24">
        <div class="hairline border-2 p-10 sm:p-14 flex flex-col md:flex-row md:items-center md:justify-between gap-8">
            <div>
                <p class="section-eyebrow mb-3">{{ __('For employers') }}</p>
                <h2 class="text-3xl font-bold tracking-tight max-w-lg leading-tight">
                    {{ __('Curious about Spaid for your company?') }}
                </h2>
                <p class="text-neutral-700 mt-3">
                    {{ __('Book a no-obligation intake with our team.') }}
                </p>
            </div>
            <div class="flex flex-col items-start md:items-end gap-2">
                <a href="{{ route('contact.show') }}" class="btn-primary">{{ __('Book intake') }} →</a>
                <a href="mailto:office@spaid.be" class="text-sm underline underline-offset-4">office@spaid.be</a>
            </div>
        </div>
    </section>
@endsection
