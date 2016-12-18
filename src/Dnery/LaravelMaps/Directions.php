<?php namespace Dnery\LaravelMaps;

class Directions extends LaravelMaps {

	public function process($params = [])
	{
		$params['key'] = $this->api_key;
		$url = $this->base_url . 'directions/json?' . http_build_query($params);
		$response = parent::run($url);

		return $response;
	}

}
