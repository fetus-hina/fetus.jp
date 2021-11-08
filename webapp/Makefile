RESOURCES := \
	resource/css/blog-feed.css \
	resource/css/blog-feed.min.css \
	resource/css/floating-action-button.css \
	resource/css/floating-action-button.min.css \
	resource/css/site.css \
	resource/css/site.min.css \
	resource/js/back-to-top.js \
	resource/js/back-to-top.min.js \
	resource/js/blog-feed.js \
	resource/js/blog-feed.min.js \
	resource/js/rgb.js \
	resource/js/rgb.min.js

.PHONY: all
all: .browserslistrc config/cookie-secret.php vendor node_modules resources

.PHONY: clean
clean:
	rm -rf $(RESOURCES) config/deploy-id.php web/assets/*

.PHONY: resources
resources: $(RESOURCES)
	$(MAKE) config/deploy-id.php

config/cookie-secret.php:
	@echo '<?php' > $@
	@echo '' >> $@
	@echo 'declare(strict_types=1);' >> $@
	@echo '' >> $@
	@echo "return '"$(shell head -c 32 /dev/urandom | base64 | tr '+/=' '-_.')"';" >> $@

.PHONY: config/deploy-id.php
config/deploy-id.php:
	./yii config/generate-deploy-id

composer.phar:
	curl -SL 'https://getcomposer.org/installer' | php -- --filename=$@ --stable
	@touch --date '2000-01-01T00:00:00Z' $@

vendor: composer.lock composer.phar
	./composer.phar install --prefer-dist
	touch $@

node_modules: package-lock.json
	npm clean-install
	@touch $@

%.min.js: %.js node_modules
	npx terser -m -c -f ascii_only=true -o $@ $<

%.js: %.es node_modules .browserslistrc
	npx babel $< > $@

%.min.css: %.css node_modules
	npx postcss $< --no-map --use cssnano > $@

%.css: %.scss node_modules .browserslistrc
	npx sass --charset --no-source-map $< | npx postcss --no-map --use autoprefixer > $@

.browserslistrc:
	curl -fsSL -o $@ 'https://raw.githubusercontent.com/twbs/bootstrap/main/.browserslistrc'

.PHONY: check-style
check-style: check-style-php check-style-js check-style-css

.PHONY: check-style-php
check-style-php: check-style-phpcs check-style-phpstan

.PHONY: check-style-phpcs
check-style-phpcs: vendor
	vendor/bin/phpcs

.PHONY: check-style-phpstan
check-style-phpstan: vendor
	./vendor/bin/phpstan analyze --memory-limit=1G

.PHONY: check-style-js
check-style-js: node_modules
	npx semistandard --global='jQuery' 'resource/**/*.es'

.PHONY: check-style-css
check-style-css: node_modules
	npx stylelint 'resource/**/*.scss'

.PHONY: test
test: test-unit test-web

.PHONY: test-unit
test-unit: vendor
	/usr/bin/env XDEBUG_MODE=coverage \
		./vendor/bin/codecept run unit \
			--coverage \
			--coverage-html=./web/coverage/ \
			--coverage-text=./runtime/coverage/coverage.txt \
			--coverage-xml=./runtime/coverage/coverage.xml

.PHONY: test-web
test-web: vendor
	./tests/bin/yii test/web
