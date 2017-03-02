RESOURCES := \
	web/js/about-panel.min.js

all: vendor node_modules resources

resources: $(RESOURCES)

composer.phar:
	curl -SL 'https://getcomposer.org/installer' | php -- --filename=$@ --stable

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
	./node_modules/.bin/uglifyjs -m -c < $< > $@

%.js: %.es node_modules
	./node_modules/.bin/babel --presets latest $< > $@

.PHONY: all resources
.PRECIOUS: %.js
