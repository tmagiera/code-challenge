Instalation:
# download composer
curl -sS https://getcomposer.org/installer | php
# clone repository
git clone https://github.com/tmagiera/code-challenge.git && cd code-challenge
# update vendors
php ../composer.phar update --prefer-dist
# edit configuration data
[edit] app/confi/parameters.yml -> database connection & facebook auth
# create db schema
php app/console doctrine:schema:create
# import sample data
php app/console doctrine:fixtures:load
# download facebook feed
php app/console facebook:update
# run internal server
php app/console server:run

now please visit: http://localhost:8000/
