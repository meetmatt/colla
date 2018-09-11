#!/usr/bin/env bash

set -e

if [ -z $1 ]; then
  echo "Usage: ${0} DOMAIN [TARGET_DIRECTORY]"
  exit
fi

DOMAIN=$1

if [ -z $2 ]; then
  TARGET='./'
else
  TARGET=$2
  # add trailing slash
  length=${#TARGET}
  last_char=${TARGET:length-1:1}
  [[ $last_char != "/" ]] && TARGET="$TARGET/"; :
fi

echo "Generating certificate for ${DOMAIN}"

openssl req \
    -newkey rsa:2048 \
    -x509 \
    -nodes \
    -keyout "${TARGET}${DOMAIN}.key" \
    -new \
    -out "${TARGET}${DOMAIN}.crt" \
    -subj "/CN=${DOMAIN}" \
    -reqexts SAN \
    -extensions SAN \
    -config <(cat /System/Library/OpenSSL/openssl.cnf \
        <(printf "[SAN]\nsubjectAltName=DNS:${DOMAIN}")) \
    -sha256 \
    -days 3650

echo "OK! ${TARGET}${DOMAIN}.key ${TARGET}${DOMAIN}.crt"
