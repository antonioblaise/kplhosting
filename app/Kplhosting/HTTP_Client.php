<?php namespace Kplhosting;

class HTTP_Client{
	private $curl;

	public function __construct($options){
		$this->curl = curl_init();
		$this->url = $options['url'];
	}

	public function get($url, $options = array()){
		$params = [];
		if(isset($options['params'])){
			$params = $options['params'];
		}
		curl_setopt($this->curl, CURLOPT_URL, $url);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->curl, CURLOPT_HEADER, 0);
		curl_setopt($this->curl, CURLOPT_POSTFIELDS, $params);
		$response = curl_exec($this->curl);
		curl_close($this->curl);
		return $response;
	}

	public function post($url, $options = array()){
		$params = [];
		if(isset($options['params'])){
			$params = $options['params'];
		}
		curl_setopt($this->curl, CURLOPT_URL, $url);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($this->curl, CURLOPT_POST, 1);
		curl_setopt($this->curl, CURLOPT_HEADER, 0);
		curl_setopt($this->curl, CURLOPT_POSTFIELDS, $params);
		// Fetching Response
		$response = curl_exec($this->curl);
		curl_close($this->curl);
		return $response;
	}
}