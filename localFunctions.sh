#!/bin/bash

source ./colors.sh;
export DOCKER_PATH=/docker
export SERVER_COMPOSE_FILE_PATH=./docker/docker-compose.yml

if [ -f ./docker/.env ]; then
    set -a
    source ./docker/.env
    set +a
fi

ENV_DIRS=(/docker /nginx /php-fpm /php-cli)

function makeCopyFromEnvFile()
{
    COPY_FROM_ENV=".env"

    if [[ -n "$1" ]]; then
        COPY_FROM_ENV+=".$1"
    else
        COPY_FROM_ENV+=".example"
    fi
}

# Create .env from .env.example
function env()
{
    makeCopyFromEnvFile "$1"

    # if [ ! -f .env ]; then
        cp ./$COPY_FROM_ENV ./.env
    # fi
}

function dockerEnv()
{
    makeCopyFromEnvFile "$1"

    for dir in ${ENV_DIRS[@]} ; do
        cp ./$DOCKER_PATH/$dir/$COPY_FROM_ENV ./$DOCKER_PATH/$dir/.env
    done

    # if [ ! -f ./docker/.env ]; then
    #     cp ./docker/$COPY_FROM_ENV ./docker/.env
    # fi
}

function status()
{
    docker compose ps
}

function start()
{
    docker compose up -d --force-recreate --remove-orphans
    status
}

function stop()
{
    docker compose down --remove-orphans
}

function restart()
{
    docker compose restart "${@:1}"
}

function pull()
{
    docker compose pull --no-parallel
}

function build()
{
	docker compose build "${@:1}"
}

function bash()
{
    CONTAINER="${1:-php-cli}";
    echo $CONTAINER;

    docker compose run --rm $CONTAINER bash
}

function test()
{
    docker compose run --rm php-cli bash -c "./vendor/bin/phpunit --colors=always ${@:1}"
}

function sh()
{
    CONTAINER="${1:-php-cli}";

    docker compose run --rm $CONTAINER sh
}

function artisan()
{
    docker compose run --rm php-cli bash -c "php artisan ${@:1}"
}

function composer()
{
    docker compose run --rm php-cli bash -c "composer ${@:1}"
}

function logs()
{
    docker compose logs "${@:1}"
}
