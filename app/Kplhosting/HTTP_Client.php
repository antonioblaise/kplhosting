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
		if(curl_errno($this->curl)){
			// RUN Socket if Curl isnt working //
			$response = $this->connect_socket($params);
		}

		curl_close($this->curl);
		return $response;
	}

	public function connect_socket($xml){
		$socket = fsockopen('ssl://new.registry.co.ug',8006, $errorno, $errstr, 30);
		if(!$socket){
			return false;
		}
		
		$headers = "POST / HTTP/1.1\n";
		$headers .= "Host: new.registry.co.ug/api:8006\n";
		$headers .= "Content-Type: text/xml\n";
		$headers .= "Content-Length: " . strlen($xml)."\r\n\r\n" ;

		$xml_response = '';
		$full_response = '';
		fwrite($socket, $headers.$xml);

		while (!feof($socket)){
			$response = fgets($socket);
			$full_response .= $response;

			if(preg_match("/^<\?xml version=/", $response)) {
				$xml_response .= "$response\n";
				while (!feof($socket)) {
					$response = fgets($socket);
					$full_response .= $response;
					$xml_response .= $response;
				}
				break;
			}
		}

		fclose($socket);
		if(!strlen($xml_response)) {
			$response = $full_response; 
		} 
		else {
			$response = $xml_response;
		}
		return $response;
	}
}

