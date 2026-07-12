#!/bin/bash
#
# Generator script for v2 signed app-tree fixture
# Produces: app-tree/appinfo/info.xml + test files + signed signature.json
#
# Prerequisites: app-tree/ exists with appinfo/info.xml + content files
# PKI fixtures: leaf-example-app.key, leaf-example-app.crt, intermediate-g2.crt
#

set -e

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
VERIFIER_DATA="${SCRIPT_DIR}"

# Check prerequisites
if [[ ! -f "${VERIFIER_DATA}/pki/leaf-example-app.key" ]]; then
	echo "Error: leaf-example-app.key not found" >&2
	exit 1
fi

if [[ ! -f "${VERIFIER_DATA}/pki/leaf-example-app.crt" ]]; then
	echo "Error: leaf-example-app.crt not found" >&2
	exit 1
fi

if [[ ! -f "${VERIFIER_DATA}/pki/intermediate-g2.crt" ]]; then
	echo "Error: intermediate-g2.crt not found" >&2
	exit 1
fi

# Create app-tree directory structure if needed
mkdir -p "${VERIFIER_DATA}/app-tree/appinfo"

# Create info.xml if it doesn't exist
if [[ ! -f "${VERIFIER_DATA}/app-tree/appinfo/info.xml" ]]; then
	cat > "${VERIFIER_DATA}/app-tree/appinfo/info.xml" << 'EOF'
<?xml version="1.0"?>
<info>
	<id>example-app</id>
	<name>Example App</name>
	<version>1.0.0</version>
	<description>Test application for verification</description>
</info>
EOF
fi

# Create sample content files if they don't exist
if [[ ! -f "${VERIFIER_DATA}/app-tree/test-file-1.txt" ]]; then
	echo "Test content 1" > "${VERIFIER_DATA}/app-tree/test-file-1.txt"
fi

if [[ ! -f "${VERIFIER_DATA}/app-tree/test-file-2.txt" ]]; then
	echo "Test content 2" > "${VERIFIER_DATA}/app-tree/test-file-2.txt"
fi

# Compute manifest: SHA-512 hash all files (including appinfo/info.xml)
# Relative paths, forward slashes, sorted by key
MANIFEST_JSON="{}"
cd "${VERIFIER_DATA}/app-tree"

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

# Generate canonical M (sorted keys, compact JSON)
CANONICAL_M=$(echo "$MANIFEST_JSON" | jq -S -c .)

# Sign M with leaf-example-app.key using ecdsa-p384-sha384
# OpenSSL dgst produces raw DER signature
SIG_DER=$(echo -n "$CANONICAL_M" | openssl dgst -sha384 -sign "${VERIFIER_DATA}/pki/leaf-example-app.key" | base64 -w0)

# Prepare certificates
LEAF_PEM=$(cat "${VERIFIER_DATA}/pki/leaf-example-app.crt")
CHAIN_PEM=$(cat "${VERIFIER_DATA}/pki/intermediate-g2.crt")

# Assemble v2 signature.json
cat > "${VERIFIER_DATA}/app-tree/signature.json" << EOF
{
	"alg": "ecdsa-p384-sha384",
	"v": 2,
	"hashes": $CANONICAL_M,
	"signature": "$SIG_DER",
	"certificates": {
		"leaf": $(echo "$LEAF_PEM" | jq -R -s .),
		"chain": [$(echo "$CHAIN_PEM" | jq -R -s .)]
	}
}
EOF

echo "Generated signature.json for app-tree"
echo "Canonical M: $CANONICAL_M"
echo "Signature (base64): $SIG_DER"
