install:
	composer install

test-integration:
	./vendor/bin/phpunit tests/Integration

test-unit:
	./vendor/bin/phpunit tests/Unit

test:
	./vendor/bin/phpunit tests/Integration
	./vendor/bin/phpunit tests/Unit
