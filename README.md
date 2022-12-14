# docker-laravel-vue
To get started, cd into the laravel folder and run docker-compose up.

# Getting started
# Init Docker

install docker desktop

cd into the laravel folder

`cd laravel`

then:

`docker-compose build`

Wait for everything to be configured

Then:

`docker-compose up -d`

Once all the containers are initialized, you need to connect to the backend container:


run `docker-compose exec laravel composer install`

run `docker-compose exec laravel composer dump-autoload`

run `docker-compose exec laravel php artisan migrate`

# Routes

Laravel api uses localhost/api as the base url.
VueJS app uses localhost:8080 for live development.
When deploying to production, VueJS routes will be served at localhost through an nginx proxy container, no need for adding the port.

# For Production Deployment
Uncomment the lines in vue.dockerfile comment out what isn't uncommented.

# Note: Windows
 Permissions errors when running docker on windows with laravel happen due to file ownership differences in your project folder vs inside the docker container. I've added a user in docker.compose under laravel to fix this error. No need for chmod or chown commands.

## List route
GET Login -- http://localhost:8080/
GET Admin -- http://localhost:8080/admin/private
