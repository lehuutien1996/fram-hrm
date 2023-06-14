#!/bin/sh

set -e

case "${1:-}" in
    "php-fpm")
        exec php-fpm -F
        ;;
    "nginx")
        exec nginx -g "daemon off;"
        ;;
    "/bin/sh" | "sh" | "/bin/bash" | "bash" )
        exec "$@"
        ;;
    *)
        echo "Usage: ${0} {php-fpm|nginx|bash|sh}" >&2
        exit 3
        ;;
esac
