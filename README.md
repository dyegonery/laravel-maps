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

## Usage

Initializing the Laravel Maps

```
$maps = new LaravelMaps();

$maps->api_key = 'you_api_key';

$service = $maps->init('service');
```

Currently, LaravelMaps can integrate with 5 webservices from Google Maps:
	- Google Maps Distance Matrix API (https://developers.google.com/maps/documentation/distance-matrix/?hl=pt-br)
		- Use ```$maps->init('distance-matrix');```

	- Google Places API Web Service (https://developers.google.com/places/web-service/?hl=pt-br)
		- Use ```$maps->init('places');```

	- Google Maps Geocoding Api (https://developers.google.com/maps/documentation/geocoding/?hl=pt-br)
		- Use ```$maps->init('geocode');```

	- Google Maps Directions API (https://developers.google.com/maps/documentation/directions/?hl=pt-br)
		- Use ```$maps->init('directions');```



When using Geocoding, Directions and Distance Matrix API, just call ```$maps->process($params);```
	- You can find the params for his use in the respective API, at Google. (Links above)

When using Places API, call ```$maps->run('method', $params);```

## Contributing

This is a package that I created and released because of personal need in projects that I maintain. Please, feel free to make pull request and submit issues to help improve this package.
