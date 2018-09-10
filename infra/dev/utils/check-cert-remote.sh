#!/usr/bin/env bash

set -e

if [ -z $1 ]; then
  echo "Usage: ${0} DOMAIN"
  exit
fi

DOMAIN=$1

openssl s_client -showcerts -servername server -connect "${DOMAIN}:443"
