# Makefile

install:
	composer install

init:
	composer run-script phpcs -- --standard=PSR12 src bin
