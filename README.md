# Spaid

B2B employee-wellness platform that matches working parents of neurodivergent children (ADHD, autism, anxiety/stress, dyslexia, dyscalculia, ages 5–18) to specialized Belgian psychologists. Activated by the employer, used privately by the parent.

- **Frontend**: Laravel 13 + Blade + Tailwind CDN + Alpine.js + Bunny Fonts (Source Serif 4 + Bricolage Grotesque)
- **Admin**: Filament v4 at `/admin`
- **Auth**: Laravel Fortify (registration, login, password reset, email verification, 2FA, passkeys)
- **i18n**: NL (default) + FR, session-backed switcher, JSON catalogues in `lang/`
- **DB**: SQLite by default; swap via `DB_CONNECTION` in `.env`
- **Brand context**: see [`PRODUCT.md`](PRODUCT.md) and [`DESIGN.md`](DESIGN.md)

---

## Local setup

Requires PHP 8.4+, Composer 2, Node 20+.

```bash
git clone https://github.com/20YN04/spaid.git
cd spaid

# PHP deps
composer install

# Env
cp .env.example .env
php artisan key:generate

# DB: SQLite file + migrate + seed
touch database/database.sqlite
php artisan migrate --seed

# JS deps + Vite (Tailwind CDN means assets aren't strictly required; install for Filament + Fortify scripts)
npm install
npm run dev          # leave running in a second terminal for HMR
                     # or `npm run build` for a one-shot production bundle

# Serve
php artisan serve
```

App boots at <http://127.0.0.1:8000>. Admin panel at <http://127.0.0.1:8000/admin>.

### Optional, but recommended

```bash
# Process queued mail (verification + 2FA notifications go through the queue)
php artisan queue:work

# Tail outgoing mail (MAIL_MAILER=log writes to laravel.log)
tail -f storage/logs/laravel.log
```

---

## Seeded credentials

`php artisan db:seed` (run automatically by `migrate --seed`) provisions:

### Admin account

| Field    | Value                  |
|----------|------------------------|
| Email    | `admin@ynarchive.com`  |
| Password | `password`             |
| Triage   | already completed      |
| Email    | already verified       |

Sign in at <http://127.0.0.1:8000/login>, then visit `/admin`. Filament gate (`User::canAccessPanel`) allows any `@ynarchive.com` user.

**Override before seeding** by setting these in `.env`:

```env
ADMIN_SEED_EMAIL=you@yourdomain.tld
ADMIN_SEED_PASSWORD=your-strong-password
```

Then re-seed:

```bash
php artisan db:seed --class=AdminUserSeeder
```

### Whitelisted corporate domains

Registration is gated. Only these email domains are accepted out of the box:

- `@dkv.be`            (DKV Belgium)
- `@elias.be`          (Elias Group)
- `@min.fed.be`        (Federal Government BE)
- `@spaid.be`          (Spaid internal)
- `@ynarchive.com`     (Ynarchive Studio)

Add more via the admin panel: **Clients → Create**, set the `allowed_domain` to e.g. `@yourcompany.be`.

### Psychologists + slots

`PsychologistSeeder` provisions five clinicians with overlapping specialty coverage across all five `IssueType` values. `AvailabilitySeeder` fills the next 14 weekdays with six 1-hour slots per psychologist (9–12, 14–17) — 300 bookable slots on a fresh seed.

### Reset

Nuke + reseed:

```bash
php artisan migrate:fresh --seed
```

---

## Routes (33)

Public:
- `GET  /`                          home
- `GET  /programmas`                program overview
- `GET  /contact` / `POST /contact` contact form
- `GET  /privacy` / `/voorwaarden` / `/cookies` / `/toegankelijkheid`
- `GET  /locale/{nl|fr}`            locale switcher
- Fortify: `/login` `/register` `/forgot-password` `/reset-password` `/email/verify` `/user/two-factor-authentication` `/two-factor-challenge`

Auth-gated:
- `GET  /triage` / `POST /triage`
- `GET  /dashboard`
- `GET  /programmas/{adhd|autisme|angst|dyslexie|dyscalculie}`
- `POST /appointments` (max 2 active per user, enforced via `AppointmentPolicy` + `StoreAppointmentRequest`)
- `DELETE /appointments/{id}`

Filament admin (`/admin/*`): Clients, Users, Psychologists, Availabilities, TriageResults, Appointments.

---

## Tech stack notes

- **Tailwind via CDN** with inline `tailwind.config` (sage / tallow / clay / alabaster palette). No Vite Tailwind build required.
- **Bunny Fonts** (GDPR-clean Google Fonts mirror) ships Source Serif 4 + Bricolage Grotesque.
- **Magnetic cursor** + scroll reveals are vanilla JS in `layouts/app.blade.php`; respect `prefers-reduced-motion`.
- **Mail driver** is `log` by default — verification emails dump to `storage/logs/laravel.log`. Wire SMTP via `MAIL_MAILER=smtp` + provider creds before production.
- **Queue driver** is `database`. Run `php artisan queue:work` to process queued jobs (e.g. Fortify notifications).
- **Booking guardrail** is enforced at three layers: `AppointmentPolicy@create`, `StoreAppointmentRequest@passedValidation`, and a `lockForUpdate` transaction in `AppointmentController@store`.

---

## Production checklist (not yet done)

- [ ] Replace `BTW BE 0000.000.000` / `KBO 0000.000.000` placeholders in `layouts/app.blade.php` footer.
- [ ] Custom-brand the Fortify verification email (currently default Laravel template).
- [ ] Swap `MAIL_MAILER=log` → SMTP provider.
- [ ] Run `php artisan queue:work` (or supervisor / systemd).
- [ ] Swap SQLite → Postgres / MySQL for production.
- [ ] Belgian lawyer review on `/privacy` `/voorwaarden` `/cookies` `/toegankelijkheid` copy.
- [ ] Tighten `User::canAccessPanel` (currently allows any `@ynarchive.com`); add an `is_admin` column or Spatie roles.
