# nia - Locating

Locating component provides locators which are used to locate a resource by name over several places.

## Installation

Require this package with Composer.

```bash
composer require nia/locating
```

## Tests
To run the unit test use the following command:

```bash
$ cd /path/to/nia/component/
$ phpunit --bootstrap=vendor/autoload.php tests/
```

## Locators
The component provides several locators but you are free to write your own locator by implementing the `Nia\Locating\LocatorInterface` interface for a more specific use case.

| Locator | Description |
| --- | --- |
| `Nia\Locating\CompositeLocator` | Composite locators are used to combine multiple locators and use them as one. |
| `Nia\Locating\DirectoryLocator` | Locator using a directory to search for resources. |

## How to use
The following sample shows you how to use the `Nia\Locating\CompositeLocator` with `Nia\Locating\DirectoryLocator`.

```php
$locator = new CompositeLocator([
    new DirectoryLocator('/path/to/common/directory'),
    new DirectoryLocator('/path/to/another/directory'),
    new DirectoryLocator('/path/to/customer/directory/')
]);

$locations = $locator->locate('/images/logos/summer.png');
// array(2) {
//    [0]=>
//    string(..) "/path/to/common/directory/images/logos/summer.png"
//    [1]=>
//    string(..) "/path/to/customer/directory/images/logos/summer.png"
// }
```
