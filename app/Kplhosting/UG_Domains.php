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
			$xml = "
				<epp xmlns=\"urn:ietf:params:xml:ns:epp-1.0\">
					<command>
				        <info>
				            <domain:info xmlns:domain=\"http://epp.cfi.co.ug/doc\">
				                <domain:name>$domain</domain:name>
				            </domain:info>
				        </info>
				    </command>
				</epp>";
			$response = self::sendRequest($xml);
			return $response;
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
			$client = new HTTP_Client([
				'url' => 'https://new.registry.co.ug:8006/api'
			]);

			$options = [
				'params' => $xmlData 
			]; 

			$response = $client->post('https://new.registry.co.ug:8006/api', $options);
			//$response = $client->connect_socket($xmlData);
			return $response;
		}
	}