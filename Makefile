build:
	docker run -it -v $(PWD):/app composer install \
	&& docker-compose build
run:
	docker-compose up -d
stop:
	docker-compose stop