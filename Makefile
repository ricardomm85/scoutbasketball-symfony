linter:
	@echo "Running linter..."
	@docker-compose run php vendor/bin/ecs check --fix

test:
	@echo "Running tests..."
	@docker-compose run php vendor/bin/phpunit

bash:
	@echo "Running bash..."
	@docker-compose exec php bash

phpstan:
	@echo "Running phpstan..."
	@docker-compose run php vendor/bin/phpstan analyse --xdebug

rector:
	@echo "Running rector..."
	@docker-compose run php vendor/bin/rector process
