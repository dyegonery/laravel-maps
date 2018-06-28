<?php namespace Dnery\LaravelMaps;

class LaravelMaps {

	protected $api_key = null;

	protected $base_url = 'https://maps.googleapis.com/maps/api/';

	public function __construct()
	{
		$this->api_key = config('google_maps.api_key');
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
