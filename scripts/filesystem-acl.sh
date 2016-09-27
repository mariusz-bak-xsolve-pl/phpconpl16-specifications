#!/bin/bash

echo "+ remove cache, logs and sessions directories"
sudo rm -rf ./var/cache ./var/logs ./var/sessions

echo "+ create cache, logs and sessions directories"
mkdir ./var/cache
mkdir ./var/logs
mkdir ./var/sessions

echo "+ apply filesystem ACL on cache, logs and sessions directories"
sudo setfacl -R -m u:www-data:rwX -m u:`whoami`:rwX ./var/cache ./var/logs ./var/sessions
sudo setfacl -dR -m u:www-data:rwX -m u:`whoami`:rwX ./var/cache ./var/logs ./var/sessions
