# Indigo DBAL Extensions

[![Build Status](https://travis-ci.org/indigophp/dbal-extensions.svg?branch=develop)](https://travis-ci.org/indigophp/dbal-extensions)
[![Latest Stable Version](https://poser.pugx.org/indigophp/dbal-extensions/v/stable.png)](https://packagist.org/packages/indigophp/dbal-extensions)
[![Total Downloads](https://poser.pugx.org/indigophp/dbal-extensions/downloads.png)](https://packagist.org/packages/indigophp/dbal-extensions)
[![License](https://poser.pugx.org/indigophp/dbal-extensions/license.png)](https://packagist.org/packages/indigophp/dbal-extensions)
[![Dependency Status](http://www.versioneye.com/user/projects/5410e2504cd1606d2a0001e3/badge.svg?style=flat)](http://www.versioneye.com/user/projects/5410e2504cd1606d2a0001e3)

**Some useful DBAL related things.**


## Install

Via Composer

``` json
{
    "require": {
        "indigophp/dbal-extensions": "@stable"
    }
}
```


## Usage

Currently implemented features:

* `EnumType`: Extend this type to implement custom enumerations
* `MoneyType`: Use this type if your monetary values are not strictly tied to a currency
* `FullMoneyType`: Use this type if your monetary values are strictly tied to a currency (values are stored as string)


**Note:** You must add the required types to the DBAL Type registry.


## Testing

``` bash
$ codecept run
```


## Contributing

Please see [CONTRIBUTING](https://github.com/indigophp/dbal-extensions/blob/develop/CONTRIBUTING.md) for details.


## Credits

- [Márk Sági-Kazár](https://github.com/sagikazarmark)
- [All Contributors](https://github.com/indigophp/dbal-extensions/contributors)


## License

The MIT License (MIT). Please see [License File](https://github.com/indigophp/dbal-extensions/blob/develop/LICENSE) for more information.
