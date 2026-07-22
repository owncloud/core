#!/bin/bash
# Generate test CRLs from the G2 PKI fixtures
# Uses openssl ca with a minimal ca.cnf for CRL generation

set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PKI_DIR="$SCRIPT_DIR/pki"
CRL_DIR="$SCRIPT_DIR/crl"
WORK_DIR="$SCRIPT_DIR"

# Create CRL output directory
mkdir -p "$CRL_DIR"

# Create minimal ca.cnf for CRL generation
cat > "$WORK_DIR/ca.cnf" << 'EOF'
[ ca ]
default_ca = CA_default

[ CA_default ]
dir              = .
certs            = $dir/pki
database         = $dir/index.txt
new_certs_dir    = $dir/new_certs_dir
serial           = $dir/crlnumber
default_crl_days = 365
default_md       = sha384

[ crl_ext ]
authorityKeyIdentifier = keyid:always
EOF

# Initialize CRL database
touch "$WORK_DIR/index.txt"
echo "01" > "$WORK_DIR/crlnumber"

# 1. Generate developers-empty.crl: valid CRL signed by intermediate-g2 with NO revoked certs
echo "Generating developers-empty.crl (no revoked certs)..."
openssl ca -config "$WORK_DIR/ca.cnf" \
	-cert "$PKI_DIR/intermediate-g2.crt" \
	-keyfile "$PKI_DIR/intermediate-g2.key" \
	-gencrl -out "$CRL_DIR/developers-empty.crl" \
	-crldays 365 \
	-batch

# 2. Generate developers-revoked.crl: CRL revoking leaf-example-app
echo "Generating developers-revoked.crl (revoking leaf-example-app)..."
# Revoke the leaf certificate
openssl ca -config "$WORK_DIR/ca.cnf" \
	-cert "$PKI_DIR/intermediate-g2.crt" \
	-keyfile "$PKI_DIR/intermediate-g2.key" \
	-revoke "$PKI_DIR/leaf-example-app.crt" \
	-batch
# Generate the CRL with the revoked cert
openssl ca -config "$WORK_DIR/ca.cnf" \
	-cert "$PKI_DIR/intermediate-g2.crt" \
	-keyfile "$PKI_DIR/intermediate-g2.key" \
	-gencrl -out "$CRL_DIR/developers-revoked.crl" \
	-crldays 365 \
	-batch

# 3. Generate wrong-issuer.crl: CRL signed by evil-intermediate (will NOT validate against real trust store)
echo "Generating wrong-issuer.crl (signed by evil-intermediate)..."
openssl ca -config "$WORK_DIR/ca.cnf" \
	-cert "$PKI_DIR/evil-intermediate.crt" \
	-keyfile "$PKI_DIR/evil-intermediate.key" \
	-gencrl -out "$CRL_DIR/wrong-issuer.crl" \
	-crldays 365 \
	-batch

echo "CRL generation complete!"
echo "Output files:"
ls -la "$CRL_DIR"/*.crl

# Clean up temporary files (do NOT commit these)
rm -f "$WORK_DIR/ca.cnf" "$WORK_DIR/index.txt" "$WORK_DIR/index.txt.old" \
	"$WORK_DIR/index.txt.attr" "$WORK_DIR/index.txt.attr.old" "$WORK_DIR/crlnumber" \
	"$WORK_DIR/crlnumber.old"
