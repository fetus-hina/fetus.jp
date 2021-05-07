SUBDIRS := webapp

.PHONY: all
all: $(SUBDIRS)

.PHONY: clean
clean: $(SUBDIRS)

.PHONY: resources
resources: $(SUBDIRS)

.PHONY: $(SUBDIRS)
$(SUBDIRS):
	make -C $@ $(MAKECMDGOALS)
