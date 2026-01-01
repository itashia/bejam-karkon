.PHONY: up down build logs app artisan composer fresh test clean

up:
	docker compose up -d

down:
	docker compose down

build:
	docker compose build --no-cache

logs:
	docker compose logs -f app

app:
	docker compose exec app bash

artisan:
	docker compose exec app php artisan $(filter-out $@,$(MAKECMDGOALS))

composer:
	docker compose exec -u root app composer $(filter-out $@,$(MAKECMDGOALS))

fresh:
	docker compose exec app php artisan migrate:fresh --seed

test:
	docker compose exec app php artisan test

clean:
	docker compose down -v
	rm -rf vendor composer.lock
	sudo chown -R $(USER):$(USER) .
	chmod -R 775 storage bootstrap/cache

start: clean build up

restart: down up

%:
	@:
