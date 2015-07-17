<?php namespace Kplhosting;

use GuzzleHttp\Client;

class Domains{

	private $ug_extensions = ['ug','co.ug', 'or.ug',  'ac.ug',  'sc.ug', 'go.ug', 'ne.ug', 'com.ug', 'org.ug'];
	private $rw_extensions = ['rw', 'co.rw', 'org.rw', 'coop.rw', 'ltd.rw', 'ac.rw'];
	private $client;

	public function __construct($uri = null){
		$this->client = new Client();		
	}

	public function getDomainExtension($domain){
		$domain = $this->cleanURL($domain);
		if($domain != false){
			$parse = preg_match_all('/^(?!-)([a-zA-Z0-9-]{2,63})(?<!-)\.([a-zA-Z\.]{2,})/i', $domain, $matches);
			if($parse){
				return $matches[2][0];
			}
			return false;
		}
		return false;
	}

	public function getDomainDetails($domain){
		$domain = $this->cleanURL($domain);
		if($domain != false){
			$parse = preg_match_all('/^(?!-)([a-zA-Z0-9-]{2,63})(?<!-)\.([a-zA-Z\.]{2,})/i', $domain, $matches);
			if($parse){
				return $matches;
			}
			return false;
		}
		return false;
	}

	public function cleanURL($url){
		$url = preg_replace("/(^(http(s)?:\/\/|www\.))?(www\.)?([a-z-\.0-9]+)/","$5", trim($url));
	    if(preg_match("/^([a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,6})/", $url, $domain)){
	    	return $domain[1];
	    }else{
	    	return false;
	    }
	}

	public function isDomainRW($domain){
		$cleanDomain = $this->cleanURL($domain);
		$extension = $this->getDomainExtension($cleanDomain);
		
		if(in_array($extension, $this->rw_extensions)){
			return true;
		}
		return false;
	}

	public function isDomainUG($domain){
		$cleanDomain = $this->cleanURL($domain);
		$extension = $this->getDomainExtension($cleanDomain);

		if(in_array($extension, $this->ug_extensions)){
			return true;
		}
		return false;
	}

	public function isDomainIntl($domain){
		$cleanDomain = $this->cleanURL($domain);
		$extension = $this->getDomainExtension($cleanDomain);

		if(!in_array($extension, $this->ug_extensions) && !in_array($extension, $this->rw_extensions)){
			return true;
		}

		return false;
	}

	public function isDomainEU($domain){

	}

	public function isDomainAsia($domain){

	}

	public function post($uri, $params = []){
		$request = $this->client->post($uri, $params);
		$response = $request->getBody();
		return $response;
	}

	public function get($uri, $params = []){
		$request = $this->client->get($uri, $params);
		$response = $request->getBody();
		return $response;
	}

	public function UG_Whois_Command($domain){
		$domain = $this->cleanURL($domain);
		return '
			<?xml version="1.0" encoding="UTF-8" standalone="no"?>
			<request cmd="whois">
			    <domain name="'.$domain.'" />
			</request>
		';
	}

	public function UG_Available_Command($domain){
		$domain = $this->cleanURL($domain);
		return '
			<?xml version="1.0" encoding="UTF-8" standalone="no"?>
			<request cmd="check">
			    <domains>
			        <domain name="'.$domain.'"></domain>
			    </domains>
			</request>
		';
	}
}