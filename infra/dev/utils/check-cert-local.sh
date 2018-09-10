#!/usr/bin/env bash

set -e

if [ -z $1 ]; then
  echo "Usage: ${0} KEY.crt"
  exit
fi

KEY=$1

openssl x509 -in "${KEY}" -text -noout
