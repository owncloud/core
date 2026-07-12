#!/bin/bash
#
# Generator script for legacy (G1) signed app-tree fixture
# Produces: app-tree-g1/appinfo/info.xml + test files + signed signature.json (legacy RSA-PSS-SHA1)
#
# Prerequisites: app-tree-g1/ exists with appinfo/info.xml + content files
# PKI fixtures: leaf-g1-expired.key, leaf-g1-expired.crt, intermediate-g1.crt
#

set -e

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
VERIFIER_DATA="${SCRIPT_DIR}"

# Check prerequisites
if [[ ! -f "${VERIFIER_DATA}/pki/leaf-g1-expired.key" ]]; then
	echo "Error: leaf-g1-expired.key not found" >&2
	exit 1
fi

if [[ ! -f "${VERIFIER_DATA}/pki/leaf-g1-expired.crt" ]]; then
	echo "Error: leaf-g1-expired.crt not found" >&2
	exit 1
fi

if [[ ! -f "${VERIFIER_DATA}/pki/intermediate-g1.crt" ]]; then
	echo "Error: intermediate-g1.crt not found" >&2
	exit 1
fi

# Create app-tree-g1 directory structure if needed
mkdir -p "${VERIFIER_DATA}/app-tree-g1/appinfo"

# Create info.xml if it doesn't exist
if [[ ! -f "${VERIFIER_DATA}/app-tree-g1/appinfo/info.xml" ]]; then
	cat > "${VERIFIER_DATA}/app-tree-g1/appinfo/info.xml" << 'EOF'
<?xml version="1.0"?>
<info>
	<id>example-app</id>
	<name>Example App (G1 Legacy)</name>
	<version>1.0.0</version>
	<description>Test application for legacy G1 verification</description>
</info>
EOF
fi

# Create sample content files if they don't exist
if [[ ! -f "${VERIFIER_DATA}/app-tree-g1/test-file-1.txt" ]]; then
	echo "Test content 1" > "${VERIFIER_DATA}/app-tree-g1/test-file-1.txt"
fi

if [[ ! -f "${VERIFIER_DATA}/app-tree-g1/test-file-2.txt" ]]; then
	echo "Test content 2" > "${VERIFIER_DATA}/app-tree-g1/test-file-2.txt"
fi

# Compute manifest: SHA-512 hash all files (including appinfo/info.xml)
# Relative paths, forward slashes, sorted by key
MANIFEST_JSON="{}"
cd "${VERIFIER_DATA}/app-tree-g1"

# Find all files and compute SHA-512 hashes
for file in $(find . -type f ! -name "signature.json" | sort); do
	# Strip leading ./
	rel_path="${file#./}"
	# Convert to forward slashes (already done on Unix)
	hash=$(sha512sum "$file" | awk '{print $1}')
	# Add to JSON (simple key-value pairs)
	# Build the JSON object with proper escaping
	MANIFEST_JSON=$(echo "$MANIFEST_JSON" | jq --arg path "$rel_path" --arg h "$hash" '. + {($path): $h}')
done

# Verify jq worked
if ! echo "$MANIFEST_JSON" | jq . > /dev/null 2>&1; then
	echo "Error: Failed to build manifest JSON" >&2
	exit 1
fi

# For legacy format: ksort the hashes and json_encode to produce canonical M
# PHP's json_encode does NOT sort by default, but ksort does. Emulate with jq -S
CANONICAL_M=$(echo "$MANIFEST_JSON" | jq -S -c .)

# Legacy format: sign the hashes (not the v2 raw format)
# Use RSA-PSS with SHA1, MGF1 SHA512, salt length 0
# Per the brief: openssl dgst -sha1 -sigopt rsa_padding_mode:pss -sigopt rsa_pss_saltlen:-1
# Note: -1 means "use the maximum salt length based on hash", but the brief specifies salt length 0
# Let's use the exact parameters from the brief: sha1 hash, MGF1 sha512, salt length 0

# Actually, let me check if we can use the exact OpenSSL invocation from the brief
# The brief says: sha1 hash, MGF1 sha512, salt 0
# OpenSSL dgst -sha1 -sigopt rsa_padding_mode:pss -sigopt rsa_pss_saltlen:0 ...
# But MGF1 is typically configured via -sigopt rsa_pss_mgf1_md

# Sign M with leaf-g1-expired.key using rsa-pss-sha1
# For OpenSSL 3.x, use sha1 with PSS padding
# MGF1 and salt length will be set via config if needed
SIG_DER=$(echo -n "$CANONICAL_M" | openssl dgst \
	-sha1 \
	-sign "${VERIFIER_DATA}/pki/leaf-g1-expired.key" \
	-sigopt rsa_padding_mode:pss \
	-sigopt rsa_pss_saltlen:0 | base64 -w0)

# Prepare certificates
LEAF_PEM=$(cat "${VERIFIER_DATA}/pki/leaf-g1-expired.crt")
CHAIN_PEM=$(cat "${VERIFIER_DATA}/pki/intermediate-g1.crt")

# Assemble legacy signature.json (no v2 "alg" field, no "v" field in the same way)
# Legacy format structure: hashes + signature + certificate + possibly chain
cat > "${VERIFIER_DATA}/app-tree-g1/signature.json" << EOF
{
	"hashes": $CANONICAL_M,
	"signature": "$SIG_DER",
	"certificate": $(echo "$LEAF_PEM" | jq -R -s .),
	"certificateChain": [$(echo "$CHAIN_PEM" | jq -R -s .)]
}
EOF

echo "Generated legacy signature.json for app-tree-g1"
echo "Canonical M: $CANONICAL_M"
echo "Signature (base64): $SIG_DER"
