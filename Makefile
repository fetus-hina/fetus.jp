all: init
	docker-compose build

init: docker-compose.yml webapp/config/cookie-secret.php

docker-compose.yml: docker-compose.in.yml secrets/github-token.txt
	sed s/%GITHUB_TOKEN%/$(shell cat secrets/github-token.txt)/ < $< > $@

webapp/config/cookie-secret.php:
	echo '<?php' > $@
	echo "return '"$(shell head -c 32 /dev/urandom | base64 | tr '+/=' '-_.')"';" >> $@

.PHONY: all init
