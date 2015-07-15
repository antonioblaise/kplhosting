<?php namespace Kplhosting;
/* 
	Author:IRADUKUNDA Blaise Antonio
	Developed for KPLHosting Platform
*/

	use GuzzleHttp\Client;

	class UG_Domains extends Domains{

		private $domain = null;
		private $extensions = null;
		private $xmlQuery;
		private static $client;

		public function __construct(){
			$this->extensions = $this->ug_extensions;
		}

		public static function isAvailable($domain){
			$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"no\"?><request cmd=\"whois\"><domain name=\"$domain\"></domain></request>";
			$response = self::sendRequest($xml);
			return $response->getBody();
		}
		public function create($domain){
			
		}

		public function modify(){

		}

		public function disable(){}

		public function activate(){}

		public function whois(){}

		public function constructQuery($xml){
			$this->xmlQuery = $final_xml;
			return $final_xml;
		}

		public static function sendRequest($xmlData){
			$client = new Client();
			$request = $client->get('https://new.registry.co.ug:8006/api', ['body' => $xmlData , 'verify' => false, 'timeout' => 0]);
			return $request;
		}
	}