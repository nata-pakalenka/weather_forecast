echo "Coding standards errors have been detected. Running phpcs..."
vendor/bin/phpcs src tests --standard=PSR12 --warning-severity=0 -q --extensions=php $@
