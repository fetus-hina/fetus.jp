SUBDIRS := webapp

.PHONY: all
all: $(SUBDIRS) bin/dep

.PHONY: clean
clean: $(SUBDIRS)
	rm -rf bin/dep

.PHONY: resources
resources: $(SUBDIRS)

.PHONY: $(SUBDIRS)
$(SUBDIRS):
	make -C $@ $(MAKECMDGOALS)

bin/dep:
	curl -fsSL -o $@ 'https://deployer.org/releases/v6.8.0/deployer.phar'
	chmod +x $@
