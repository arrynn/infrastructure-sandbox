## Infrastructure sandbox

This is a sandbox repository for development and testing of the following libraries:

* https://github.com/arrynn/multilayered-infrastructure
* https://github.com/arrynn/laravel-helpers

These libraries are not packagized as they are in early development.

### Requirements
```
PHP 7.1.3
# Other requirements come from the libraries and Laravel itself
# Built on Laravel 5.6.12
```

### Installation
* Checkout this repository `git clone git@github.com:arrynn/infrastructure-sandbox.git`
* `cd` into the  sandbox project
* before running `composer install` clone repositories `git@github.com:arrynn/multilayered-infrastructure.git` 
and `https://github.com/arrynn/laravel-helpers` into their corresponding directories in `lib/Arrynn/LaravelHelpers` 
and `lib/Arrynn/MultilayeredInfrastructure` respectively. You can see the directories listed in `composer.json` in the `psr-4` block. 