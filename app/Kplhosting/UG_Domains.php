<?php namespace Kplhosting;
	/* 
		Author:IRADUKUNDA Blaise Antonio
		Developed for KPLHosting Platform
	*/
	use GuzzleHttp\Client;

	class UG_Domains extends Domains{

		private $domain = null;
		private $extensions = null;
		private $client;

		public function __construct(){
			parent::__construct('https://new.registry.co.ug:8006/api');
		}

		public function isAvailable($domain){
			$cleanDomain = $this->cleanURL($domain);
			$response = '';

		}
		public function whois($domain){
			$domain = $this->cleanURL($domain);
			$xmlCommand = "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"no\"?>
							<request cmd=\"whois\">
							    <domain name=\"$domain\" />
							</request>";
			$response = $this->post(['body' => $xmlCommand]);
			return $response;
		}
		public function create($domain){
			
		}

		public function modify(){

		}

		public function disable(){}

		public function activate(){}

	}