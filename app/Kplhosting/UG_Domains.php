<?php namespace Kplhosting;
/* 
	Author:IRADUKUNDA Blaise Antonio
	Developed for KPLHosting Platform
*/

	class UG_Domains extends Domains{

		private $domain = null;
		private $extensions = null;
		private $xmlQuery;

		public function __construct(){
			$this->extensions = $this->ug_extensions;
		}

		public function isAvailable(){
			return false;
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

		public function sendRequest($xmlData){
			$client = new GuzzleHttp\Client();
			$response = $client->post('https://new.registry.co.ug:8006/api');
		}
	}