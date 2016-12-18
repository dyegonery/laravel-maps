<?php namespace Dnery\LaravelMaps;

class Places extends LaravelMaps {

	public function run($func, $params = [])
	{
		$params['key'] = $this->api_key;
		$url = $this->base_url . 'place/' . $func . '/json?' . http_build_query($params);
		$response = parent::run($url);

		if ($response['http_code'] == 200)
			$response['data'] = json_decode($response['data']);

		return $response;
	}
}
