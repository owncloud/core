#!/bin/bash
# Generate test CRLs for G1 legacy PKI
# Generates: legacy.crl (empty, no revoked certs) and legacy-revoked.crl (revoking leaf-g1-expired)

set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PKI_DIR="$SCRIPT_DIR/pki"
CRL_DIR="$SCRIPT_DIR/crl"
WORK_DIR="$SCRIPT_DIR"

# Create CRL output directory
mkdir -p "$CRL_DIR"

# Create minimal ca.cnf for CRL generation (G1 variant)
cat > "$WORK_DIR/ca_g1.cnf" << 'EOF'
[ ca ]
default_ca = CA_default

[ CA_default ]
dir              = .
certs            = $dir/pki
database         = $dir/index_g1.txt
new_certs_dir    = $dir/new_certs_dir_g1
serial           = $dir/crlnumber_g1
default_crl_days = 365
default_md       = sha256

[ crl_ext ]
authorityKeyIdentifier = keyid:always
EOF

# Initialize CRL database for G1
touch "$WORK_DIR/index_g1.txt"
echo "01" > "$WORK_DIR/crlnumber_g1"
mkdir -p "$WORK_DIR/new_certs_dir_g1"

# 1. Generate legacy.crl: valid CRL signed by intermediate-g1 with NO revoked certs
echo "Generating legacy.crl (no revoked certs, signed by intermediate-g1)..."
openssl ca -config "$WORK_DIR/ca_g1.cnf" \
	-cert "$PKI_DIR/intermediate-g1.crt" \
	-keyfile "$PKI_DIR/intermediate-g1.key" \
	-gencrl -out "$CRL_DIR/legacy.crl" \
	-crldays 365 \
	-batch 2>&1 | head -20

# 2. Generate legacy-revoked.crl: CRL revoking leaf-g1-expired
echo "Generating legacy-revoked.crl (revoking leaf-g1-expired)..."
# Revoke the leaf certificate
openssl ca -config "$WORK_DIR/ca_g1.cnf" \
	-cert "$PKI_DIR/intermediate-g1.crt" \
	-keyfile "$PKI_DIR/intermediate-g1.key" \
	-revoke "$PKI_DIR/leaf-g1-expired.crt" \
	-batch 2>&1 | head -10
# Generate the CRL with the revoked cert
openssl ca -config "$WORK_DIR/ca_g1.cnf" \
	-cert "$PKI_DIR/intermediate-g1.crt" \
	-keyfile "$PKI_DIR/intermediate-g1.key" \
	-gencrl -out "$CRL_DIR/legacy-revoked.crl" \
	-crldays 365 \
	-batch 2>&1 | head -20

echo "G1 CRL generation complete!"
echo "Output files:"
ls -la "$CRL_DIR"/legacy*.crl

# Clean up temporary files (do NOT commit these)
rm -f "$WORK_DIR/ca_g1.cnf" "$WORK_DIR/index_g1.txt" "$WORK_DIR/index_g1.txt.old" \
	"$WORK_DIR/index_g1.txt.attr" "$WORK_DIR/index_g1.txt.attr.old" "$WORK_DIR/crlnumber_g1" \
	"$WORK_DIR/crlnumber_g1.old"
rm -rf "$WORK_DIR/new_certs_dir_g1"
