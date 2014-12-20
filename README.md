# bear/dbal-module

Doctrine Dbal Module for BEAR.Sunday

## Installation

### composer install

    composer require bear/dbal-module
 
### Module install

```php
use path/to/SkeletonModule;

class AppModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->install(new {SkeletonModule});
    }
}

```
### Inject

 * DbalInject for `Doctrine\DBAL\Driver\Connection` interface
 
### Env

 * no
 
### Demo

 * n/a
 
