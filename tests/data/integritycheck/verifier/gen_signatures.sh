#!/bin/bash
# Generate signed fixtures for ManifestVerifier tests
# Uses ocsign test keys to sign the golden tree-basic manifest

set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
GOLDEN_DIR="${SCRIPT_DIR}/../golden/tree-basic"
OCSIGN_KEYS="/home/deepdiver/Development/claude-work/owncloud/signing/ocsign/testdata/keys"
M="${GOLDEN_DIR}/manifest.canonical.json"

# Verify source manifest exists
if [[ ! -f "$M" ]]; then
	echo "Error: Manifest not found at $M" >&2
	exit 1
fi

# Verify ocsign keys exist
if [[ ! -d "$OCSIGN_KEYS" ]]; then
	echo "Error: ocsign keys not found at $OCSIGN_KEYS" >&2
	exit 1
fi

echo "Generating EC P384-SHA384 signature..."
openssl dgst -sha384 -sign "${OCSIGN_KEYS}/ec-leaf.key" "$M" | base64 > "${SCRIPT_DIR}/sig-ec-p384-tree-basic.b64"

echo "Generating RSA-PSS-SHA384 signature..."
openssl dgst -sha384 -sigopt rsa_padding_mode:pss -sigopt rsa_pss_saltlen:48 -sign "${OCSIGN_KEYS}/rsa-leaf.key" "$M" | base64 > "${SCRIPT_DIR}/sig-rsa-pss-sha384-tree-basic.b64"

echo "Copying EC certificate chain..."
cp "${OCSIGN_KEYS}/ec-leaf.crt" "${SCRIPT_DIR}/ec-leaf.crt"
cp "${OCSIGN_KEYS}/ec-intermediate.crt" "${SCRIPT_DIR}/ec-intermediate.crt"

echo "Copying RSA certificate..."
cp "${OCSIGN_KEYS}/rsa-leaf.crt" "${SCRIPT_DIR}/rsa-leaf.crt"

echo "Done! Fixtures generated in ${SCRIPT_DIR}/"
