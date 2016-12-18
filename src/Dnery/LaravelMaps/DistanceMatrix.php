<?php namespace Dnery\LaravelMaps;

class DistanceMatrix extends LaravelMaps {

	public function process($params = [])
	{
		$params['key'] = $this->api_key;
		$url = $this->base_url . 'distancematrix/json?' . http_build_query($params);
		$response = parent::run($url);

		if ($response['http_code'] == 200)
			$response['data'] = json_decode($response['data']);

		return $response;
	}
}
