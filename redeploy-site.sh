#!/bin/sh

git fetch && git reset origin/main --hard
chmod -R 755 storage bootstrap/cache
