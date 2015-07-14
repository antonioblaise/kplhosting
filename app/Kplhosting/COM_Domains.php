<?php namespace Kplhosting;

use GuzzleHttp\Client;

class COM_Domains{
	
	private $client;
	private $responseFormat = "json";

	public function __construct(){
		/* Guzzle HTTP Client */
		$this->client = new Client([
			'base_uri' => 'https://testapi.internet.bs'
		]);
	}
	public function check($domain){
		$params = [
			'form_params' => [
				'ApiKey' => 'api here',
				'Password' => '',
				'Domain' => $domain,
				'ResponseFormat' => $this->responseFormat
			]
		];
		$response = json_decode($this->sendRequest('check', $params));

		if($response['STATUS'] == "AVAILABLE"){
			return true;
		}else{
			return false;
		}
	}

	public function create($domain,$params){
		if($this->check($domain)){
			if(is_Asian($domain)){
				$params = []; // .asia domain names
			}elseif ($this->isEuropean($domain)) {
				$params = []; // .eu domain names
			}else{
				// Universal Domain Names (.com,.net,.org,.co,.io, .biz, ....etc)
				$params = [];
			}

			$response = $this->sendRequest('create', $params);
		}
		return false;
	}

	public function modify($domain){
		if(! $this->check($domain)){
		}
		return false;
	}

	public function activate($domain){

	}

	public function disable($domain){

	}

	public function whois($domain){

	}

	public function sendRequest($path, $params){
		$response = $this->post('/Domain/'.$path, $params);
		return $response;
	}
}