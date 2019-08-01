#
# Translation
#--------------------------------------

.PHONY: l10n-push
l10n-push:
	tx -d push -s --skip --no-interactive

.PHONY: l10n-pull
l10n-pull:
	tx -d pull -a --skip

.PHONY: l10n-clean
l10n-clean:
	rm -rf l10n

.PHONY: l10n-read
l10n-read:
	perl l10n.pl read

.PHONY: l10n-write
l10n-write:
	perl l10n.pl write
