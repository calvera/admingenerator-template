#!/bin/bash

sudo rm -rf var/cache/*
sudo rm -rf var/logs/*
sudo rm -rf var/sessions/*

mkdir -p var/cache var/logs var/sessions web/cache

HTTPDUSER=`ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`

if [ "$1" ]; then ME=$1; else ME=`whoami`; fi

sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:"$ME":rwX var/cache var/logs var/sessions web/cache web/images/user
sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:"$ME":rwX var/cache var/logs var/sessions web/cache web/images/user

