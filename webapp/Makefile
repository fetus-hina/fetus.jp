RESOURCES := \
	resource/css/blog-feed.css \
	resource/css/blog-feed.min.css \
	resource/css/sample-video.css \
	resource/css/sample-video.min.css \
	resource/css/site.css \
	resource/css/site.min.css \
	resource/css/twemoji.css \
	resource/css/twemoji.min.css \
	resource/images/japanese-flag.min.svg \
	resource/js/blog-feed.js \
	resource/js/blog-feed.min.js \
	resource/js/r18-dialog.js \
	resource/js/r18-dialog.min.js \
	resource/js/rgb.js \
	resource/js/rgb.min.js \
	resource/js/twemoji.js \
	resource/js/twemoji.min.js \
	resource/js/twitter-web-intents.js \
	resource/js/twitter-web-intents.min.js \
	web/favicon.ico \
	web/images/apple-touch-icon-114.png \
	web/images/apple-touch-icon-120.png \
	web/images/apple-touch-icon-144.png \
	web/images/apple-touch-icon-152.png \
	web/images/apple-touch-icon-180.png \
	web/images/apple-touch-icon-57.png \
	web/images/apple-touch-icon-60.png \
	web/images/apple-touch-icon-72.png \
	web/images/apple-touch-icon-76.png \
	web/images/favicon.svg

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
ifeq (, $(shell which composer 2>/dev/null))
	curl -fsSL 'https://getcomposer.org/installer' | php -- --filename=$@ --stable
else
	ln -s `which composer` $@
endif

vendor: composer.lock composer.phar
	./composer.phar install --prefer-dist
	@touch $@

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

resource/images/%.min.svg: resource/images/%.svg node_modules
	npx svgo -i $< -p 3 --multipass --final-newline -q -o $@

web/favicon.ico: web/images/favicon.ico
	ln -fs images/favicon.ico $@

web/images/favicon.%: node_modules
	cp node_modules/@fetus-hina/fetus.css/dist/favicon/$(notdir $@) $@

web/images/apple-touch-icon-%.png: node_modules
	cp node_modules/@fetus-hina/fetus.css/dist/favicon/$(notdir $@) $@

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
	npx semistandard 'resource/**/*.es'

.PHONY: check-style-css
check-style-css: node_modules
	npx stylelint 'resource/**/*.scss'

.PHONY: test
test: test-unit test-web

.PHONY: test-unit
test-unit: vendor
	./vendor/bin/codecept run unit

.PHONY: test-web
test-web: vendor
	./tests/bin/yii test/web
