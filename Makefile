SUBDIRS := webapp

.PHONY: all
all: $(SUBDIRS) bin/dep

.PHONY: clean
clean: $(SUBDIRS)
	rm -rf bin/dep deployer/vendor

.PHONY: resources
resources: $(SUBDIRS)

.PHONY: $(SUBDIRS)
$(SUBDIRS):
	make -C $@ $(MAKECMDGOALS)

bin/dep: deployer/vendor
	ln -sf ../deployer/vendor/bin/dep $@

deployer/vendor: deployer/composer.lock deployer/composer.json
	cd deployer && composer install --prefer-dist --no-interaction
	@touch $@
