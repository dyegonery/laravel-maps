<?php namespace Dnery\LaravelMaps;

class LaravelMaps {

	protected $api_key = null;

	public $base_url = 'https://maps.googleapis.com/maps/api/';

	public function __construct()
	{
		$this->api_key = $this->api_key;
	}

	public function init($class)
	{
		switch ($class) {
			case 'places':
				$res = new Places();
				break;
			case 'geocode':
				$res = new Geocode();
				break;
			case 'distance-matrix':
				$res = new DistanceMatrix();
				break;
			default:
				# code...
				break;
		}

		return $res;
	}

	public function run($url)
	{

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 60);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 60);
		if (\App::environment() == 'local') {
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
		}

		$data = curl_exec($curl);
		$cerror = curl_error($curl);
		$cerrno = curl_errno($curl);
		$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);

		return [
			'http_code' => $http_code,
			'data' => $data
		];
	}

}
