# Ray.DbalModule
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Ray-Di/Ray.DbalModule/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/Ray-Di/Ray.DbalModule/?branch=develop)
[![Build Status](https://travis-ci.org/ray-di/Ray.DbalModule.svg)](https://travis-ci.org/Ray-Di/Ray.DbalModule)

[Doctrine Dbal](https://github.com/doctrine/dbal) module for [Ray.Di](https://github.com/koriym/Ray.Di)

## Installation

### Composer install

    $ composer require ray/dbal-module
 
### Module install

```php
use BEAR\DbalModule\DbalModule;
use Ray\Di\AbstractModule;

class AppModule extends AbstractModule
{
    protected function configure()
    {
        $this->install(new DbalModule('driver=pdo_sqlite&memory=true');
    }
}

```
### DI trait

 * [DbalInject](https://github.com/BEARSunday/BEAR.DbalModule/blob/master/src/DbalInject.php) for `Doctrine\DBAL\Driver\Connection` interface
 
### Demo

    $ php docs/demo/run.php
    // It works!

### Requiuments

 * PHP 5.4+
 * hhvm
 
