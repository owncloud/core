#!/bin/bash
# Generate G1 RSA-4096 PKI with expired leaf for legacy transition tests
# The leaf is valid from 2020-01-01 to 2020-12-31 (entirely in the past).
# Usage: ./gen_g1_pki.sh
# Output: pki/ (appends to existing, preserving G2 PKI)

set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PKI_DIR="$SCRIPT_DIR/pki"

# Ensure PKI directory exists (gen_g2_pki.sh should have created it)
mkdir -p "$PKI_DIR"

echo "Generating G1 RSA-4096 PKI with expired leaf..."

# ============ G1 PKI (legacy, RSA-4096, expired leaf) ============

# 1. Generate root-g1 CA key and self-signed cert
# Validity: 2020-01-01 to 2025-12-31 (past-dated, but root still valid at test times)
echo "Generating root-g1..."
openssl genrsa -out "$PKI_DIR/root-g1.key" 4096 2>/dev/null
openssl req -new -x509 -key "$PKI_DIR/root-g1.key" -out "$PKI_DIR/root-g1.crt" \
    -subj "/CN=ownCloud Code Signing Root G1" \
    -set_serial 1 \
    -not_before 200101000000Z \
    -not_after 251231235959Z \
    -addext "basicConstraints=critical,CA:TRUE" \
    -addext "keyUsage=critical,keyCertSign,cRLSign" \
    -addext "subjectKeyIdentifier=hash" 2>/dev/null || \
    # Fallback: if openssl x509 doesn't support -not_before/-not_after, use faketime
    (faketime '2020-01-01' openssl req -new -x509 -key "$PKI_DIR/root-g1.key" -out "$PKI_DIR/root-g1.crt" \
        -days 2190 \
        -subj "/CN=ownCloud Code Signing Root G1" \
        -addext "basicConstraints=critical,CA:TRUE" \
        -addext "keyUsage=critical,keyCertSign,cRLSign" \
        -addext "subjectKeyIdentifier=hash" 2>/dev/null)

# 2. Generate intermediate-g1 CA key and CSR
echo "Generating intermediate-g1..."
openssl genrsa -out "$PKI_DIR/intermediate-g1.key" 4096 2>/dev/null
openssl req -new -key "$PKI_DIR/intermediate-g1.key" -out "$PKI_DIR/intermediate-g1.csr" \
    -subj "/CN=ownCloud Code Signing Intermediate G1" 2>/dev/null

# Sign intermediate with root-g1
# Validity: 2020-01-01 to 2025-12-31
openssl x509 -req -in "$PKI_DIR/intermediate-g1.csr" \
    -CA "$PKI_DIR/root-g1.crt" -CAkey "$PKI_DIR/root-g1.key" \
    -CAcreateserial -out "$PKI_DIR/intermediate-g1.crt" \
    -set_serial 2 \
    -not_before 200101000000Z \
    -not_after 251231235959Z \
    -extfile <(cat <<'EOF'
basicConstraints=critical,CA:TRUE,pathlen:0
keyUsage=critical,keyCertSign,cRLSign
subjectKeyIdentifier=hash
authorityKeyIdentifier=keyid,issuer
EOF
) 2>/dev/null || \
    # Fallback: use faketime
    (faketime '2020-01-01' openssl x509 -req -in "$PKI_DIR/intermediate-g1.csr" \
        -CA "$PKI_DIR/root-g1.crt" -CAkey "$PKI_DIR/root-g1.key" \
        -CAcreateserial -out "$PKI_DIR/intermediate-g1.crt" -days 2190 \
        -extfile <(cat <<'EOF'
basicConstraints=critical,CA:TRUE,pathlen:0
keyUsage=critical,keyCertSign,cRLSign
subjectKeyIdentifier=hash
authorityKeyIdentifier=keyid,issuer
EOF
) 2>/dev/null)

rm -f "$PKI_DIR/intermediate-g1.csr"

# 3. Generate leaf-g1-expired (example-app, RSA-4096, EXPIRED)
# Validity: 2020-01-01 to 2020-12-31 (entirely in the past, will be expired when tested)
echo "Generating leaf-g1-expired..."
openssl genrsa -out "$PKI_DIR/leaf-g1-expired.key" 4096 2>/dev/null
openssl req -new -key "$PKI_DIR/leaf-g1-expired.key" -out "$PKI_DIR/leaf-g1-expired.csr" \
    -subj "/CN=example-app" 2>/dev/null

# Sign leaf with intermediate-g1 using RSA
openssl x509 -req -in "$PKI_DIR/leaf-g1-expired.csr" \
    -CA "$PKI_DIR/intermediate-g1.crt" -CAkey "$PKI_DIR/intermediate-g1.key" \
    -CAcreateserial -out "$PKI_DIR/leaf-g1-expired.crt" \
    -set_serial 3 \
    -not_before 200101000000Z \
    -not_after 201231235959Z \
    -extfile <(cat <<'EOF'
basicConstraints=critical,CA:FALSE
keyUsage=critical,digitalSignature
extendedKeyUsage=codeSigning
subjectKeyIdentifier=hash
authorityKeyIdentifier=keyid,issuer
EOF
) 2>/dev/null || \
    # Fallback: use faketime
    (faketime '2020-01-01' openssl x509 -req -in "$PKI_DIR/leaf-g1-expired.csr" \
        -CA "$PKI_DIR/intermediate-g1.crt" -CAkey "$PKI_DIR/intermediate-g1.key" \
        -CAcreateserial -out "$PKI_DIR/leaf-g1-expired.crt" -days 365 \
        -extfile <(cat <<'EOF'
basicConstraints=critical,CA:FALSE
keyUsage=critical,digitalSignature
extendedKeyUsage=codeSigning
subjectKeyIdentifier=hash
authorityKeyIdentifier=keyid,issuer
EOF
) 2>/dev/null)

rm -f "$PKI_DIR/leaf-g1-expired.csr"

echo "G1 PKI generated in $PKI_DIR"
ls -lah "$PKI_DIR"/root-g1* "$PKI_DIR"/intermediate-g1* "$PKI_DIR"/leaf-g1-expired*
