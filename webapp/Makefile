RESOURCES := \
	resource/css/blog-feed.css \
	resource/css/blog-feed.min.css \
	resource/css/site.css \
	resource/css/site.min.css \
	resource/js/about-panel.js \
	resource/js/about-panel.min.js \
	resource/js/blog-feed.js \
	resource/js/blog-feed.min.js \
	web/images/ostatus.min.svg

.PHONY: all
all: vendor node_modules resources

.PHONY: clean
clean:
	rm -rf $(RESOURCES)

.PHONY: resources
resources: $(RESOURCES)

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
	npx cleancss -O 2 --skip-rebase --format 'breaks:afterRuleEnds=on' $< > $@

%.css: %.scss node_modules
	npx node-sass --output-style expanded $< | npx postcss --use autoprefixer > $@

%.min.svg: %.svg node_modules
	npx svgo -q --multipass -i $< -o $@

web/images/ostatus.svg:
	curl -sSL -o $@ 'https://github.com/OStatus/assets/raw/master/ostatus.svg'
