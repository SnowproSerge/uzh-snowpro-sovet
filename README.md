# uzh-snowpro-sovet

- запуск докера
    docker-compose up -d --build

- запуск композера
docker run --rm --interactive --tty --volume C:\work\PhpProject\uzh-snowpro-sovet:/app composer install

- создание докер машины
docker-machine create --driver hyperv vm

- запуск докер машины
 cd 'C:\Program Files\Docker\Docker\resources\bin\'
 docker-machine.exe env vm

docker-machine env vm /
 export DOCKER_TLS_VERIFY="1" /
 export DOCKER_HOST="tcp://172.16.62.130:2376" /
 export DOCKER_CERT_PATH="/Users/snows/.docker/machine/machines/vm" /
 export DOCKER_MACHINE_NAME="vm"
 # Run this command to configure your shell:
 # eval "$(docker-machine env vm)"