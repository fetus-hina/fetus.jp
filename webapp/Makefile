GZ_RESOURCES := \
	web/css/blog-feed.min.css.gz \
	web/css/site.min.css.gz \
	web/js/about-panel.min.js.gz \
	web/js/blog-feed.min.js.gz
BR_RESOURCES := $(GZ_RESOURCES:.gz=.br)
RESOURCES := $(GZ_RESOURCES) $(BR_RESOURCES)

all: vendor node_modules resources

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

%.gz: % node_modules
	rm -f $@ || true
	./node_modules/.bin/zopfli --gzip -i 10 $<

%.br: %
	rm -f $@ || true
	bro --quality 11 --input $< --output $@

%.min.js: %.js node_modules
	./node_modules/.bin/uglifyjs -m -c < $< > $@

%.js: %.es node_modules
	./node_modules/.bin/babel --presets latest $< > $@

%.min.css: %.css node_modules
	./node_modules/.bin/cleancss -O 2 --skip-rebase --format 'breaks:afterRuleEnds=on' $< > $@

%.css: %.scss node_modules
	./node_modules/.bin/node-sass $< | ./node_modules/.bin/postcss --use autoprefixer > $@

.PHONY: all resources
.PRECIOUS: %.css %.min.css %.js %.min.js
