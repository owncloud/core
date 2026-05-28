# AI Agent Guidelines for ownCloud Core

This file provides context for AI coding agents (Claude Code, GitHub Copilot, Cursor, etc.) working in this repository.

## Repository Overview
- **Product family:** Classic (OC10)
- **Primary language(s):** PHP, JavaScript
- **Build system:** Composer, Make, npm/Yarn
- **Test framework:** PHPUnit, JavaScript tests (Node), Acceptance tests (Behat)
- **CI system:** GitHub Actions

## Architecture & Key Paths
- `lib/` - Core PHP library (private and public APIs)
- `core/` - Core app (login, file list, etc.)
- `apps/` - Bundled apps
- `config/` - Configuration samples and defaults
- `ocs/` - OCS API endpoints
- `ocs-provider/` - OCS provider discovery
- `ocm-provider/` - Open Cloud Mesh provider
- `build/` - Build scripts and tools
- `l10n/` - Translations
- `tests/` - Test suites (unit, integration, acceptance)
- `Makefile` - Build and test automation
- `composer.json` - PHP dependencies
- `phpcs.xml` - PHP_CodeSniffer configuration
- `phpstan.neon` - PHPStan configuration
- `CHANGELOG.md` - Release history
- `console.php` - CLI entry point
- `occ` - ownCloud console CLI tool
- `cron.php` - Background job runner
- `index.php` - Web entry point

## Development Conventions
- **Branching:** master
- **Commit messages:** DCO sign-off required (`git commit -s`). Must follow [Conventional Commits](https://www.conventionalcommits.org/) format.
- **Code style:** PHP_CodeSniffer (phpcs.xml), ownCloud coding standard
- **PR process:** Open a PR against master. All CI checks must pass.

## Build & Test Commands
```bash
# Build (install all dependencies)
make

# Test (PHP unit)
make test-php-unit

# Test (JavaScript)
make test-js

# Test (acceptance - API)
make test-acceptance-api

# Test (acceptance - CLI)
make test-acceptance-cli

# Lint (PHP)
make test-php-style

# Fix code style
make test-php-style-fix
```

## Important Constraints
- All code contributions must be compatible with the **AGPL-3.0** license
- Do not introduce new **copyleft-licensed dependencies** (GPL, AGPL, LGPL, MPL) without explicit discussion in an issue first. This is especially important for repos migrating to Apache 2.0.
- Do not introduce new dependencies without discussion in an issue first
- Conventional Commits are enforced by CI
- Translations must be submitted via Transifex, not as PRs
- This is a large, complex codebase with many interdependencies


## OSPO Policy Constraints

### GitHub Actions
- **Only** use actions owned by `owncloud`, created by GitHub (`actions/*`), verified on the GitHub Marketplace, or verified by the ownCloud Maintainers.
- Pin all actions to their full commit SHA (not tags): `uses: actions/checkout@<SHA> # vX.Y.Z`
- Never introduce actions from unverified third parties.

### Dependency Management
- Dependabot is configured for automated dependency updates.
- Review and merge Dependabot PRs as part of regular maintenance.
- Do not introduce new dependencies without discussion in an issue first.

### Git Workflow
- **Rebase policy**: Always rebase; never create merge commits. Use `git pull --rebase` and `git rebase` before pushing.
- **Signed commits**: All commits **must** be PGP/GPG signed (`git commit -S -s`).
- **DCO sign-off**: Every commit needs a `Signed-off-by` line (`git commit -s`).
- **Conventional Commits & Squash Merge**: Use the [Conventional Commits](https://www.conventionalcommits.org/) format where the repository enforces it. Many repos use squash merge, where the PR title becomes the commit message on the default branch — apply Conventional Commits format to PR titles as well. A reusable GitHub Actions workflow enforces this.

## Context for AI Agents
- Match existing code style
- Do not refactor unrelated code in the same PR
- Write tests for new functionality
- Keep PRs focused and atomic
- Use Conventional Commits format for all commit messages
- Be aware of the public API surface (OCP namespace) - breaking changes require careful consideration
- The `lib/private/` directory contains internal APIs; `lib/public/` contains the stable public API
