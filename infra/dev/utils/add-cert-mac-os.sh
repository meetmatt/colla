#!/usr/bin/env bash

set -e

if [ -z $1 ]; then
  echo "Usage: ${0} KEY"
  exit
fi

KEY=$1

sudo security add-trusted-cert -d -r trustRoot -k /Library/Keychains/System.keychain "${KEY}"
