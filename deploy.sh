#!/bin/bash

set -ue

git push origin master

make bin/dep
./bin/dep deploy production
