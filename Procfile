web: vendor/bin/heroku-php-apache2 public/
release: php app/console doctrine:schema:update --force
web: $(composer config bin-dir)/heroku-php-nginx -C nginx.conf public/
