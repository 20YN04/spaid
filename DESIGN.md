# DESIGN.md — Spaid

## Aesthetic lane (named)
**KLOTHILDA × Belgian apothecary.** Humanist serif display (Source Serif 4) paired with a modern variable grotesk (Bricolage Grotesque). Sage and tallow on warm alabaster — never beige, never cream-as-default. A single deeply saturated sage band carries the brand color across the page. Not Stripe-on-cream. Not Klim-magazine-italic.

## Color strategy
**Committed.** Sage-700 (#374B38) carries the brand across major sections. Tallow (warm ochre) is the accent, used to mark moments of warmth (CTAs, dot indicators, parent quotes). Clay is a tertiary for the third card in any three-up. Alabaster is the resting paper, never pure white.

OKLCH ready. Tinted-toward-brand neutrals; never `#fff`, never `#000`.

### Palette
- **alabaster** `#F1ECDF` — paper, warm parchment, tinted toward tallow
- **whisper** `#E5DDC8` — secondary surface, deeper alabaster
- **ink** `#162320` — body text + reverse surfaces; cooler obsidian-green, never pure black
- **sage** scale 50→900 (#E7EEE7 → #1A2419) — brand carrier, humanist green
- **tallow** scale 100→900 (#F0E2C0 → #7C5E2F) — warmth, accent, dot markers
- **clay** scale 300/500/700 (#E1B79C / #C99876 / #A47855) — tertiary warmth

## Typography
**Source Serif 4** (Adobe, on Google Fonts, NOT on reflex-reject list) — humanist serif. Calm, mature, has true italics, designed for screen.
**Bricolage Grotesque** (Mathieu Triay, on Google Fonts, NOT on reflex-reject list) — variable modern grotesk with humanist warmth. Has italic + condensed axes for hierarchy.

Loaded via Bunny Fonts (GDPR-clean, no Google tracking).

### Scale
- `display-mega` clamp(5rem, 12vw, 12rem) line-height 0.88 letter-spacing -0.03em — single-word brand moments
- `display` clamp(3.5rem, 8vw, 7rem) line-height 0.92 — section monumentals
- `h1` clamp(2.25rem, 4.5vw, 4rem) line-height 1.02
- `h2` clamp(1.75rem, 3vw, 2.5rem) line-height 1.08
- body 1rem-1.125rem line-height 1.6
- caption 0.78rem letter-spacing 0.02em

Eyebrow labels are **not** a section grammar — used a maximum of twice per page.

## Layout
- Asymmetric, left-aligned. Max-width 7xl on container, but body sections vary: some constrained, some breaking to gutter for hero typography.
- Spacing rhythm uses `clamp()` for vertical breathing: hero pads 8rem, body sections 5rem, tight groupings 1rem.
- Cards are not the default. "Why through employer" and "How it works" use flowing prose split by hand-drawn rule + inline number, not card grids.

## Motion
- One orchestrated first-load: hero text rises with stagger, ambient blobs drift in (14s loop), no entrance bounce.
- Scroll-driven reveals via IntersectionObserver, `transform: translateY` + opacity, 1.1s cubic-bezier(0.22, 1, 0.36, 1).
- Magnetic cursor (8px ink dot + 40px ring, lerped) on `(hover:hover) and (pointer:fine)`.
- Respect `prefers-reduced-motion`.
- Tallow indicator dot has a slow breathe (4s ease-in-out).

## Imagery
Hero side card: one decisive abstract — gradient + noise + serif italic numeral, used once. No photo placeholders. Stock photos for team are deferred (parent-of-neurodivergent-child stock reads as patronizing). Team avatars use per-person gradient + initial in serif italic at huge scale.

## Bans (project-specific, on top of impeccable shared)
- No eyebrow caps tracking above every section heading. Maximum twice per page.
- No identical 3-up card grids. If three things, vary structurally.
- No emoji.
- No "Computer says no" literal — that line was a placeholder; replaced with "Take a breath."
