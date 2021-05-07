RESOURCES := \
	resource/css/blog-feed.css \
	resource/css/blog-feed.min.css \
	resource/css/site.css \
	resource/css/site.min.css \
	resource/js/about-panel.js \
	resource/js/about-panel.min.js \
	resource/js/blog-feed.js \
	resource/js/blog-feed.min.js

.PHONY: all
all: config/cookie-secret.php vendor node_modules resources

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
	touch --date '2000-01-01T00:00:00Z' $@

composer.lock: composer.json composer.phar
	./composer.phar update -vvv
	touch $@

vendor: composer.lock
	./composer.phar install --prefer-dist -vvv
	touch $@

node_modules: package.json
	npm install
	touch $@

%.min.js: %.js node_modules
	npx uglifyjs -m -c < $< > $@

%.js: %.es node_modules
	npx babel $< > $@

%.min.css: %.css node_modules
	npx cleancss --format 'breaks:afterRuleEnds=on' $< > $@

%.css: %.scss node_modules
	npx sass --charset --no-source-map $< | npx postcss --no-map --use autoprefixer > $@

%.min.svg: %.svg node_modules
	npx svgo -q --multipass -i $< -o $@
