#!/bin/bash
#
# Generator for the "real-world legacy G1" regression fixture.
#
# Reproduces the shape of certs actually shipped in the ownCloud 10.x field
# (resources/codesigning/core.crt, tests/data/integritycheck/SomeApp.crt):
#   * NO X.509 v3 extensions (no basicConstraints / keyUsage / extKeyUsage)
#   * an UPPERCASE CN (CN=SomeApp)
#
# The existing gen_g1_pki.sh mints modern extension-full, lowercase-CN leaves,
# which masks the backward-compat surface. This fixture drives an
# extension-less / uppercase-CN G1 leaf through the full Verifier pipeline so
# the G1 relaxations in ChainValidator / AppIdResolver stay locked in.
#
# Prerequisites: pki/intermediate-g1.{crt,key} (from gen_g1_pki.sh)
# Output:
#   pki/leaf-g1-legacy-noext.{key,crt}     extension-less, CN=SomeApp, non-expired
#   app-tree-g1-legacy/                     info.xml (<id>SomeApp</id>) + content + signature.json

set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PKI_DIR="$SCRIPT_DIR/pki"
APP_TREE="$SCRIPT_DIR/app-tree-g1-legacy"

if [[ ! -f "$PKI_DIR/intermediate-g1.crt" || ! -f "$PKI_DIR/intermediate-g1.key" ]]; then
	echo "Error: run gen_g1_pki.sh first (intermediate-g1.{crt,key} missing)" >&2
	exit 1
fi

echo "Generating extension-less, uppercase-CN G1 leaf (CN=SomeApp)..."

# 1. Leaf key + CSR. CN is deliberately uppercase to reproduce SomeApp.crt.
openssl genrsa -out "$PKI_DIR/leaf-g1-legacy-noext.key" 4096 2>/dev/null
openssl req -new -key "$PKI_DIR/leaf-g1-legacy-noext.key" \
	-out "$PKI_DIR/leaf-g1-legacy-noext.csr" \
	-subj "/CN=SomeApp" 2>/dev/null

# 2. Sign with intermediate-g1. Validity 2020-01-01 .. 2030-12-31 so the leaf is
#    NON-expired at the test reference time (2026-06-01), exercising the plain
#    "passed" G1 path (not the legacy-warn branch). CRITICALLY: an empty
#    extensions section is referenced so the resulting cert carries no v3
#    extensions at all (OpenSSL 3.x otherwise auto-adds SKI/AKI), faithfully
#    reproducing the extension-less field certs (core.crt / SomeApp.crt).
EMPTY_EXT=$(mktemp)
printf '[none]\n' > "$EMPTY_EXT"
openssl x509 -req -in "$PKI_DIR/leaf-g1-legacy-noext.csr" \
	-CA "$PKI_DIR/intermediate-g1.crt" -CAkey "$PKI_DIR/intermediate-g1.key" \
	-CAcreateserial -out "$PKI_DIR/leaf-g1-legacy-noext.crt" \
	-set_serial 4 \
	-not_before 200101000000Z \
	-not_after 301231235959Z \
	-extfile "$EMPTY_EXT" -extensions none 2>/dev/null || \
	(faketime '2020-01-01' openssl x509 -req -in "$PKI_DIR/leaf-g1-legacy-noext.csr" \
		-CA "$PKI_DIR/intermediate-g1.crt" -CAkey "$PKI_DIR/intermediate-g1.key" \
		-CAcreateserial -out "$PKI_DIR/leaf-g1-legacy-noext.crt" \
		-set_serial 4 -days 4017 \
		-extfile "$EMPTY_EXT" -extensions none 2>/dev/null)
rm -f "$EMPTY_EXT"

rm -f "$PKI_DIR/leaf-g1-legacy-noext.csr"

# Sanity: assert the leaf carries none of the three constraint extensions that
# ChainValidator::enforceLeafConstraints() checks. OpenSSL 3.x auto-adds SKI/AKI
# during CA signing regardless of -extfile; those are informational and do not
# affect chain-validation semantics, so we only guard the security-relevant ones.
LEAF_TEXT=$(openssl x509 -in "$PKI_DIR/leaf-g1-legacy-noext.crt" -noout -text)
for ext in "Basic Constraints" "Key Usage" "Extended Key Usage"; do
	if echo "$LEAF_TEXT" | grep -q "X509v3 $ext"; then
		echo "Error: leaf unexpectedly carries '$ext' extension" >&2
		exit 1
	fi
done

echo "Building app-tree-g1-legacy..."
mkdir -p "$APP_TREE/appinfo"

cat > "$APP_TREE/appinfo/info.xml" << 'EOF'
<?xml version="1.0"?>
<info>
	<id>SomeApp</id>
	<name>Some App (G1 legacy, uppercase CN)</name>
	<version>1.0.0</version>
	<description>Extension-less, uppercase-CN legacy G1 backward-compat fixture</description>
</info>
EOF

echo "Legacy content 1" > "$APP_TREE/test-file-1.txt"
echo "Legacy content 2" > "$APP_TREE/test-file-2.txt"

# 3. Build canonical manifest M (SHA-512 per file, sorted keys).
MANIFEST_JSON="{}"
cd "$APP_TREE"
for file in $(find . -type f ! -name "signature.json" | sort); do
	rel_path="${file#./}"
	hash=$(sha512sum "$file" | awk '{print $1}')
	MANIFEST_JSON=$(echo "$MANIFEST_JSON" | jq --arg path "$rel_path" --arg h "$hash" '. + {($path): $h}')
done
CANONICAL_M=$(echo "$MANIFEST_JSON" | jq -S -c .)

# 4. Legacy signature: RSA-PSS with SHA-1, salt length 0 (matches gen_g1_signature.sh).
SIG_DER=$(echo -n "$CANONICAL_M" | openssl dgst \
	-sha1 \
	-sign "$PKI_DIR/leaf-g1-legacy-noext.key" \
	-sigopt rsa_padding_mode:pss \
	-sigopt rsa_pss_saltlen:0 | base64 -w0)

LEAF_PEM=$(cat "$PKI_DIR/leaf-g1-legacy-noext.crt")
CHAIN_PEM=$(cat "$PKI_DIR/intermediate-g1.crt")

cat > "$APP_TREE/signature.json" << EOF
{
	"hashes": $CANONICAL_M,
	"signature": "$SIG_DER",
	"certificate": $(echo "$LEAF_PEM" | jq -R -s .),
	"certificateChain": [$(echo "$CHAIN_PEM" | jq -R -s .)]
}
EOF

echo "Generated app-tree-g1-legacy/signature.json"
echo "Canonical M: $CANONICAL_M"
