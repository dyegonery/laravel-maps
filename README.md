# Laravel Maps

Laravel Maps is a simple package that helps you connect laravel with Google Maps WebServices.

## Installation

### Composer

```
$ composer require dnery/laravel-maps 
```

```
{
    "require": {
        "dnery/laravel-maps": "dev-master"
    }
}
```

### Without Composer

Just download the repository and install under the vendor/ folder in your laravel project.

After installing the package in your project, add the package's Service Provider to ```app/config/app.php``` in the providers section:

```
'Dnery\LaravelMaps\LaravelMapsServiceProvider',
```

Also add the Alias of the LaravelMaps package, in the aliases section:

```
'LaravelMaps'	  => 'Dnery\LaravelMaps\Facades\LaravelMaps',
```

Publish the configuration file of the package in your project:
```
php artisan config:publish dnery/laravel-maps
```

## Usage

First, fill your api_key (you can find it in your painel at Google Developers Console) in the generated config file, located at ```app/config/packages/dnery/laravel-maps/config.php```.
After this, all you need to do is initialize the LaravelMaps with the name of the webservice that you want to use.

```
$geocode = Laravel::init('geocode')
```

Currently, LaravelMaps can integrate with 4 webservices from Google Maps:
	- Google Maps Distance Matrix API (https://developers.google.com/maps/documentation/distance-matrix/?hl=pt-br)
		- Use ```LaravelMaps::init('distance-matrix');```

	- Google Places API Web Service (https://developers.google.com/places/web-service/?hl=pt-br)
		- Use ```LaravelMaps::init('places');```

	- Google Maps Geocoding Api (https://developers.google.com/maps/documentation/geocoding/?hl=pt-br)
		- Use ```LaravelMaps::init('geocode');```

	- Google Maps Directions API (https://developers.google.com/maps/documentation/directions/?hl=pt-br)
		- Use ```LaravelMaps::init('directions');



When using Geocoding, Directions and Distance Matrix API, just call ```$maps->process($params);```
	- You can find the params for his use in the respective API, at Google. (Links above)

When using Places API, call ```$maps->run('method', $params);```

## Contributing

This is a package that I created and released because of personal need in projects that I maintain. Please, feel free to make pull request and submit issues to help improve this package.
