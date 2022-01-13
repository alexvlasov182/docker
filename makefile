docker_php = docker_php-fpm_1
docker_nginx = docker_nginx_1
docker_mysql = docker_mysql_1

up: #Containers start
	docker-compose up -d

down: #Stop
	docker-compose stop

ps:
	docker ps

connect_php:
	docker exec -it $(docker_php) bash

connect_nginx:
	docker exec -it $(docker_nginx) bash

connect_mysql:
	docker exec -it $(docker_mysql) bash