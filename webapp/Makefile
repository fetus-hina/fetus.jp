all: vendor

composer.phar:
	curl -SL 'https://getcomposer.org/installer' | php -- --filename=$@ --stable

composer.lock: composer.json composer.phar
	./composer.phar update -vvv

vendor: composer.lock
	./composer.phar install --prefer-dist -vvv
