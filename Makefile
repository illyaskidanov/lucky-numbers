build:
	docker run -it -v $(PWD):/app composer install \
	&& docker-compose build
run:
	docker-compose up -d
stop:
	docker-compose stop
test:
	docker-compose exec -it php sh -c "php vendor/bin/codecept run"