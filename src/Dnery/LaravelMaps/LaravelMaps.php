<?php namespace Dnery\LaravelMaps;

use Illuminate\Config\Repository as Config;

class LaravelMaps {

	protected $api_key = null;

	public $base_url = 'https://maps.googleapis.com/maps/api/';

	public function __construct(Config $config)
	{
		$this->api_key = $config->get('laravel-maps::api_key');
	}

	public function init($class)
	{
		switch ($class) {
			case 'places':
				$res = new Places($this->api_key);
				break;
			case 'geocode':
				$res = new Geocode($this->api_key);
				break;
			case 'distance-matrix':
				$res = new DistanceMatrix($this->api_key);
				break;
			case 'directions':
				$res = new Directions($this->api_key);
				break;
			default:
				# code...
				break;
		}

		return $res;
	}

}
