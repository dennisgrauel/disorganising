#!/usr/bin/env sh

WEBROOT=/var/www/disorganising
HOST=root@139.180.172.99


ssh $HOST /bin/bash << EOF
  cd $WEBROOT
  git fetch
  git reset --hard origin/main

  chown -R www-data:www-data .
EOF
