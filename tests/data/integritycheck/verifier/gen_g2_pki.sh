#!/bin/bash
# Generate G2 EC-P384 PKI and negative test certs for chain validation tests
# Usage: ./gen_g2_pki.sh
# Output: pki/

set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PKI_DIR="$SCRIPT_DIR/pki"

# Clean and create PKI directory
rm -rf "$PKI_DIR"
mkdir -p "$PKI_DIR"

echo "Generating G2 EC-P384 PKI..."

# ============ Good PKI ============

# 1. Generate root CA key and self-signed cert
echo "Generating root-g2..."
openssl ecparam -name secp384r1 -genkey -out "$PKI_DIR/root-g2.key"
openssl req -new -x509 -key "$PKI_DIR/root-g2.key" -out "$PKI_DIR/root-g2.crt" -days 3650 \
    -subj "/CN=ownCloud Code Signing Root G2" \
    -addext "basicConstraints=critical,CA:TRUE" \
    -addext "keyUsage=critical,keyCertSign,cRLSign" \
    -addext "subjectKeyIdentifier=hash"

# 2. Generate intermediate CA key and CSR
echo "Generating intermediate-g2..."
openssl ecparam -name secp384r1 -genkey -out "$PKI_DIR/intermediate-g2.key"
openssl req -new -key "$PKI_DIR/intermediate-g2.key" -out "$PKI_DIR/intermediate-g2.csr" \
    -subj "/CN=ownCloud Code Signing Intermediate G2"

# Sign intermediate with root
openssl x509 -req -in "$PKI_DIR/intermediate-g2.csr" \
    -CA "$PKI_DIR/root-g2.crt" -CAkey "$PKI_DIR/root-g2.key" \
    -CAcreateserial -out "$PKI_DIR/intermediate-g2.crt" -days 3650 \
    -extfile <(cat <<'EOF'
basicConstraints=critical,CA:TRUE,pathlen:0
keyUsage=critical,keyCertSign,cRLSign
subjectKeyIdentifier=hash
authorityKeyIdentifier=keyid,issuer
EOF
)
rm -f "$PKI_DIR/intermediate-g2.csr"

# 3. Generate leaf certificate (example-app)
echo "Generating leaf-example-app..."
openssl ecparam -name secp384r1 -genkey -out "$PKI_DIR/leaf-example-app.key"
openssl req -new -key "$PKI_DIR/leaf-example-app.key" -out "$PKI_DIR/leaf-example-app.csr" \
    -subj "/CN=example-app"

# Sign leaf with intermediate
openssl x509 -req -in "$PKI_DIR/leaf-example-app.csr" \
    -CA "$PKI_DIR/intermediate-g2.crt" -CAkey "$PKI_DIR/intermediate-g2.key" \
    -CAcreateserial -out "$PKI_DIR/leaf-example-app.crt" -days 3650 \
    -extfile <(cat <<'EOF'
basicConstraints=critical,CA:FALSE
keyUsage=critical,digitalSignature
extendedKeyUsage=codeSigning
subjectKeyIdentifier=hash
authorityKeyIdentifier=keyid,issuer
EOF
)
rm -f "$PKI_DIR/leaf-example-app.csr"

# ============ Negative test leaves (all signed by good intermediate) ============

# 4. Leaf with CA:TRUE (should be rejected as leaf)
echo "Generating leaf-ca-true..."
openssl ecparam -name secp384r1 -genkey -out "$PKI_DIR/leaf-ca-true.key"
openssl req -new -key "$PKI_DIR/leaf-ca-true.key" -out "$PKI_DIR/leaf-ca-true.csr" \
    -subj "/CN=example-app"

openssl x509 -req -in "$PKI_DIR/leaf-ca-true.csr" \
    -CA "$PKI_DIR/intermediate-g2.crt" -CAkey "$PKI_DIR/intermediate-g2.key" \
    -CAcreateserial -out "$PKI_DIR/leaf-ca-true.crt" -days 3650 \
    -extfile <(cat <<'EOF'
basicConstraints=critical,CA:TRUE
keyUsage=critical,digitalSignature
extendedKeyUsage=codeSigning
subjectKeyIdentifier=hash
authorityKeyIdentifier=keyid,issuer
EOF
)
rm -f "$PKI_DIR/leaf-ca-true.csr"

# 5. Leaf without extendedKeyUsage
echo "Generating leaf-no-eku..."
openssl ecparam -name secp384r1 -genkey -out "$PKI_DIR/leaf-no-eku.key"
openssl req -new -key "$PKI_DIR/leaf-no-eku.key" -out "$PKI_DIR/leaf-no-eku.csr" \
    -subj "/CN=example-app"

openssl x509 -req -in "$PKI_DIR/leaf-no-eku.csr" \
    -CA "$PKI_DIR/intermediate-g2.crt" -CAkey "$PKI_DIR/intermediate-g2.key" \
    -CAcreateserial -out "$PKI_DIR/leaf-no-eku.crt" -days 3650 \
    -extfile <(cat <<'EOF'
basicConstraints=critical,CA:FALSE
keyUsage=critical,digitalSignature
subjectKeyIdentifier=hash
authorityKeyIdentifier=keyid,issuer
EOF
)
rm -f "$PKI_DIR/leaf-no-eku.csr"

# 6. Leaf without digitalSignature in keyUsage
echo "Generating leaf-no-digsig..."
openssl ecparam -name secp384r1 -genkey -out "$PKI_DIR/leaf-no-digsig.key"
openssl req -new -key "$PKI_DIR/leaf-no-digsig.key" -out "$PKI_DIR/leaf-no-digsig.csr" \
    -subj "/CN=example-app"

openssl x509 -req -in "$PKI_DIR/leaf-no-digsig.csr" \
    -CA "$PKI_DIR/intermediate-g2.crt" -CAkey "$PKI_DIR/intermediate-g2.key" \
    -CAcreateserial -out "$PKI_DIR/leaf-no-digsig.crt" -days 3650 \
    -extfile <(cat <<'EOF'
basicConstraints=critical,CA:FALSE
keyUsage=critical,keyEncipherment
extendedKeyUsage=codeSigning
subjectKeyIdentifier=hash
authorityKeyIdentifier=keyid,issuer
EOF
)
rm -f "$PKI_DIR/leaf-no-digsig.csr"

# ============ Evil (rogue) PKI for trust-bypass test ============

# 7. Generate evil root CA
echo "Generating evil-root..."
openssl ecparam -name secp384r1 -genkey -out "$PKI_DIR/evil-root.key"
openssl req -new -x509 -key "$PKI_DIR/evil-root.key" -out "$PKI_DIR/evil-root.crt" -days 3650 \
    -subj "/CN=Evil Root" \
    -addext "basicConstraints=critical,CA:TRUE" \
    -addext "keyUsage=critical,keyCertSign,cRLSign" \
    -addext "subjectKeyIdentifier=hash"

# 8. Generate evil intermediate
echo "Generating evil-intermediate..."
openssl ecparam -name secp384r1 -genkey -out "$PKI_DIR/evil-intermediate.key"
openssl req -new -key "$PKI_DIR/evil-intermediate.key" -out "$PKI_DIR/evil-intermediate.csr" \
    -subj "/CN=Evil Intermediate"

openssl x509 -req -in "$PKI_DIR/evil-intermediate.csr" \
    -CA "$PKI_DIR/evil-root.crt" -CAkey "$PKI_DIR/evil-root.key" \
    -CAcreateserial -out "$PKI_DIR/evil-intermediate.crt" -days 3650 \
    -extfile <(cat <<'EOF'
basicConstraints=critical,CA:TRUE,pathlen:0
keyUsage=critical,keyCertSign,cRLSign
subjectKeyIdentifier=hash
authorityKeyIdentifier=keyid,issuer
EOF
)
rm -f "$PKI_DIR/evil-intermediate.csr"

# 9. Generate evil leaf (impersonates "example-app" but signed by evil intermediate)
echo "Generating evil-leaf..."
openssl ecparam -name secp384r1 -genkey -out "$PKI_DIR/evil-leaf.key"
openssl req -new -key "$PKI_DIR/evil-leaf.key" -out "$PKI_DIR/evil-leaf.csr" \
    -subj "/CN=example-app"

openssl x509 -req -in "$PKI_DIR/evil-leaf.csr" \
    -CA "$PKI_DIR/evil-intermediate.crt" -CAkey "$PKI_DIR/evil-intermediate.key" \
    -CAcreateserial -out "$PKI_DIR/evil-leaf.crt" -days 3650 \
    -extfile <(cat <<'EOF'
basicConstraints=critical,CA:FALSE
keyUsage=critical,digitalSignature
extendedKeyUsage=codeSigning
subjectKeyIdentifier=hash
authorityKeyIdentifier=keyid,issuer
EOF
)
rm -f "$PKI_DIR/evil-leaf.csr"

echo "G2 PKI generated in $PKI_DIR"
ls -lah "$PKI_DIR"
