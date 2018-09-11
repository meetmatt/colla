#!/usr/bin/env bash

set -e

if [ -z $1 ]; then
  echo "Usage: ${0} DOMAIN"
  exit
fi

DOMAIN=$1
KEY_DIR='./'
KEY_PATH="${KEY_DIR}${DOMAIN}"

openssl req \
    -newkey rsa:2048 \
    -x509 \
    -nodes \
    -keyout "${KEY_PATH}.key" \
    -new \
    -out "${KEY_PATH}.crt" \
    -subj "/CN=${DOMAIN}" \
    -reqexts SAN \
    -extensions SAN \
    -config <(cat /System/Library/OpenSSL/openssl.cnf \
        <(printf "[SAN]\nsubjectAltName=DNS:${DOMAIN}")) \
    -sha256 \
    -days 3650 &>/dev/null

if [[ "$OSTYPE" == "darwin"* ]]; then
    # Mac OSX
    echo "Store certificate in MAC OS X KeyChain:"
    echo "  sudo security add-trusted-cert -d -r trustRoot -k /Library/Keychains/System.keychain ${KEY_PATH}.crt"
elif [[ "$OSTYPE" == "linux-gnu" ]]; then
    # Linux
    echo "Add certificate as trusted:"
    echo "  sudo cp ${KEY_PATH}.crt /usr/local/share/ca-certificates/${DOMAIN}.pem"
    echo "  sudo update-ca-certificates"
fi
