#!/bin/bash
# Prepare a plugin release

# ask/get the plugin handle
read -p "Enter the plugin handle (e.g. handle):" handle

# ask/get the version from command line (e.g 1.0.0)
read -p "Enter the plugin version to prepare (e.g. 1.0.0):" version

# set the release path
releasePath=~/Desktop/$handle

# move folder to ~/Desktop
cp -R . $releasePath

# install composer dependencies
cd $releasePath && composer install

# remove support files (LICENSE, README.me, .gitignore and etc.)
cd $releasePath && rm -rf {.idea,LICENSE,README.md,.gitignore,prepare-release.sh,releases.json,.git}

# zip the folder based on the handle
zip -r ~/Desktop/$handle-$version.zip $releasePath
