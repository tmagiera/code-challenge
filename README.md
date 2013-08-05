#Instalation:
- download composer
curl -sS https://getcomposer.org/installer | php
- clone repository
git clone https://github.com/tmagiera/code-challenge.git && cd code-challenge
- update vendors
php ../composer.phar update --prefer-dist
- edit configuration data
[edit] app/confi/parameters.yml -> database connection & facebook auth
- create db schema
php app/console doctrine:schema:create
- import sample data
php app/console doctrine:fixtures:load
- download facebook feed
php app/console facebook:update
- run internal server
php app/console server:run

#Run:
now please visit:
- main site: http://localhost:8000/
- api documentation: http://localhost:8000/api/doc/
- rest service : http://localhost:8000/api/builds


#Comment:
I couldn't force Doctrine to update builds with current = false on build update - related code is in : Code\Bundle\ChallengeBundle\Event\BuildSubsriber but something is wrong. Sorry, but i don't have enough time for this excercise.
