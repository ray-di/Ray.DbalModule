# Ray.DbalModule
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Ray-Di/Ray.DbalModule/badges/quality-score.png?b=1.x)](https://scrutinizer-ci.com/g/Ray-Di/Ray.DbalModule/?branch=1.x)
[![Code Coverage](https://scrutinizer-ci.com/g/Ray-Di/Ray.DbalModule/badges/coverage.png?b=1.x)](https://scrutinizer-ci.com/g/Ray-Di/Ray.DbalModule/?branch=1.x)
[![Build Status](https://scrutinizer-ci.com/g/Ray-Di/Ray.DbalModule/badges/build.png?b=1.x)](https://scrutinizer-ci.com/g/Ray-Di/Ray.DbalModule/build-status/1.x)
[![Build Status](https://travis-ci.org/ray-di/Ray.DbalModule.svg?branch=1.x)](https://travis-ci.org/ray-di/Ray.DbalModule)

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

### for named binding

Set `qualifer` in 2nd parameter in DbalModule.

```php
$this->install(new DbalModule('driver=pdo_sqlite&memory=true', 'log_db');
```

Use qualifer in `@Inject`.

```php
/**
 * @Inject
 * @Named("log_db")
 */
public function setLogDb(Connection $logDb)
{
    $this->logDb = $logDb;
}
```
## DI trait

 * [DbalInject](https://github.com/BEARSunday/BEAR.DbalModule/blob/1.x/src/DbalInject.php) for `Doctrine\DBAL\Driver\Connection` interface
 
## Demo

    $ php docs/demo/run.php
    // It works!
 
