# Dimsog\Geoimage
A very small library to extract geo coordinates (latitude and longitude ) from an image

Supported PHP versions:
* PHP 5.4
* PHP 5.5
* PHP 5.6
* PHP 7.0
* PHP 7.1
* PHP 7.2
* PHP 7.3
* PHP 7.4
* PHP 8.0
* PHP 8.1

# Install
```bash
composer require dimsog/php-geo-image
```

# Example
```php
use Dimsog\Geoimage\Coordinates;

$coordinates = Coordinates::extract(__DIR__ . '/image.jpg');

// $coordinates is:
// [
//      53.144123 (Latitude),
//      35.369734 (Longitude)
// ]
```

This method returns null, if the coordinates are not found