# ownCloud Code Signing Trust Store

This directory contains the trust anchors, intermediates, and CRL data for verifying ownCloud and third-party app signatures across G1 and G2 generations.

## Directory Layout

```
resources/codesigning/
├── roots/             # Trust anchors (roots)
│   ├── root-g1.crt    # Legacy G1 root (intermediate authority), kept for transition
│   └── root-g2.crt    # (G2 anchor — populated by CA ceremony)
├── intermediates/     # Intermediate certificates
│   └── intermediate-g2.crt  # (G2 intermediate — populated by CA ceremony)
├── crl/               # Certificate Revocation Lists
│   ├── legacy.crl     # Frozen G1 CRL (legacy apps)
│   └── developers.crl # (G2 leaf CRL — populated by CA ceremony)
└── core.crt           # Core leaf certificate (first-party signing, unused in verifier)
```

## Trust Store Behavior

- **TrustStore** loads all certificates in `roots/` as trust anchors.
  - Certs matching `root-g1*` are tagged generation 'g1' (legacy verification path).
  - Certs matching `root-g2*` are tagged generation 'g2' (new verification path).
  - Since `root-g1.crt` exists, the roots/ directory is non-empty and legacy G1 apps verify normally.

- **CrlProvider** reads CRLs from `crl/`:
  - For G1 chains, it uses `legacy.crl` (frozen).
  - For G2 chains, it fetches `developers.crl` (expected to be cached or served).

## G1 Transition

The production ownCloud 10.x ecosystem relied on a single flat trust anchor (`resources/codesigning/root.crt`).
This file was the G1 INTERMEDIATE authority (subject "ownCloud Code Signing Intermediate Authority").
It was the de facto trust anchor for the legacy loadCA() verifier.

Task 13 migrates this to `roots/root-g1.crt` to preserve exact legacy verification semantics
while establishing the new multi-generation layout. Apps signed with G1 certs continue to verify.

## G2 Availability

G2 code signing is inert until the CA ceremony populates:
- `roots/root-g2.crt` (G2 root anchor)
- `intermediates/intermediate-g2.crt` (G2 intermediate issuer)
- `crl/developers.crl` (G2 leaf revocation list)

This is intentional and correct — the feature is inert until the ceremony produces real anchors.
Shipping test certificates as production trust anchors (per Task 10 lesson) would be a security error.

## Reference

- Design document: ownCloud G2 code-signing verifier (design/core-g2-code-signing.md, §2 and §19)
- CA ceremony: developer-certificates repository
