# Golden Test Vectors for Canonical Manifest Serialization

These files are copied verbatim from the ocsign repository's testdata/golden directory.
They serve as the cross-implementation conformance contract for the G2 code-signing verifier.

**DO NOT hand-edit these files.** They are test fixtures that must remain byte-for-byte identical
to their sources in the ocsign Go repo for the parity tests to have meaning.

Each `tree-*` directory contains:
- `manifest.canonical.json`: The byte-exact canonical manifest as produced by the Go signer
- `hashes.expected.json`: A pretty-printed human-inspection artifact (not used as test target)

The canonicalization rules are defined in the Go ocsign repo's `internal/manifest/serialize.go`.
