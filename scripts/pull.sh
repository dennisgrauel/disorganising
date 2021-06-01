#!/usr/bin/env sh

WEBROOT=/var/www/disorganising
HOST=root@139.180.172.99

rsync -r -a -p -t -u -zz --no-perms --no-owner --no-group --checksum --exclude=".*" -P -h -i --delete $HOST:$WEBROOT/content ./