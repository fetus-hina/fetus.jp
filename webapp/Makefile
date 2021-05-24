RESOURCES := \
	resource/css/blog-feed.css \
	resource/css/blog-feed.min.css \
	resource/css/site.css \
	resource/css/site.min.css \
	resource/js/blog-feed.js \
	resource/js/blog-feed.min.js \
	resource/js/rgb.js \
	resource/js/rgb.min.js

.PHONY: all
all: .browserslistrc config/cookie-secret.php vendor node_modules resources

.PHONY: clean
clean:
	rm -rf $(RESOURCES) web/assets/*

.PHONY: resources
resources: $(RESOURCES)

config/cookie-secret.php:
	@echo '<?php' > $@
	@echo '' >> $@
	@echo 'declare(strict_types=1);' >> $@
	@echo '' >> $@
	@echo "return '"$(shell head -c 32 /dev/urandom | base64 | tr '+/=' '-_.')"';" >> $@

composer.phar:
	curl -SL 'https://getcomposer.org/installer' | php -- --filename=$@ --stable
	@touch --date '2000-01-01T00:00:00Z' $@

composer.lock: composer.json composer.phar
	./composer.phar update -vvv
	touch $@

vendor: composer.lock
	./composer.phar install --prefer-dist -vvv
	touch $@

node_modules: package-lock.json
	npm clean-install
	@touch $@

%.min.js: %.js node_modules
	npx uglifyjs -m -c < $< > $@

%.js: %.es node_modules .browserslistrc
	npx babel $< > $@

%.min.css: %.css node_modules
	npx cleancss --format 'breaks:afterRuleEnds=on' $< > $@

%.css: %.scss node_modules .browserslistrc
	npx sass --charset --no-source-map $< | npx postcss --no-map --use autoprefixer > $@

.browserslistrc:
	curl -fsSL -o $@ 'https://raw.githubusercontent.com/twbs/bootstrap/main/.browserslistrc'

.PHONY: check-style
check-style: check-style-php check-style-js check-style-css

.PHONY: check-style-php
check-style-php: vendor
	vendor/bin/phpcs

.PHONY: check-style-js
check-style-js: node_modules
	npx semistandard --global='jQuery' 'resource/**/*.es'

.PHONY: check-style-css
check-style-css: node_modules
	npx stylelint 'resource/**/*.scss'
