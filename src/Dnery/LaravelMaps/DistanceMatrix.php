<?php namespace Dnery\LaravelMaps;

class DistanceMatrix extends LaravelMaps {

	public $api_key = null;

	public function __construct($api_key)
	{
		$this->api_key = $api_key;
	}

	public function process($params = [])
	{
		$params['key'] = $this->api_key;
		$url = $this->base_url . 'distancematrix/json?' . http_build_query($params);
		$response = $this->run($url);

		if ($response['http_code'] == 200)
			$response['data'] = json_decode($response['data']);

		return $response;
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
