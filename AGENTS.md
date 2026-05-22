# Agent rules

## Git workflow (REQUIRED)

- Branch per task. Naming: `feat/<slug>`, `fix/<slug>`, `chore/<slug>`, `refactor/<slug>`, `docs/<slug>`.
- Atomic commits. Conventional Commits: `feat:`, `fix:`, `chore:`, `docs:`, `refactor:`, `test:`.
- Push to origin.
- Merge into `main` (PR if CI gate, otherwise direct fast-forward).
- Delete the branch locally and on origin after merge.

Hard rules:
- Never commit directly to `main`.
- Never `--no-verify` unless explicitly asked.
- Never force-push to `main`.

## Browser verification (REQUIRED for UI changes)

`tsc` and build only prove the code compiles. Real bugs hide in the browser.

### Setup

```bash
npm i -D playwright@^1.49
npx playwright install chromium
cp ~/.claude/skills/browser-verify/resources/scan-pages.mjs scripts/scan-pages.mjs
```

Add to `package.json`: `"scan": "node scripts/scan-pages.mjs"`.

### Run

1. `npm run dev` in another shell.
2. `npm run scan`.
3. Non-zero = real regression. Fix before commit.

## Subagents

Spawn as many as needed. Same git + browser-verify rules apply.
