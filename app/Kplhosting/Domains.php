<?php namespace Kplhosting;

class Domains{

	private static $ug_extensions = ['ug','co.ug', 'or.ug',  'ac.ug',  'sc.ug', 'go.ug', 'ne.ug', 'com.ug', 'org.ug'];
	private static $rw_extensions = ['rw', 'co.rw', 'org.rw', 'coop.rw', 'ltd.rw', 'ac.rw'];

	public function __construct(){
		
	}

	public static function getDomainExtension($domain){
		$domain = self::cleanURL($domain);
		if($domain != false){
			$parse = preg_match_all('/^(?!-)([a-zA-Z0-9-]{2,63})(?<!-)\.([a-zA-Z\.]{2,})/i', $domain, $matches);
			if($parse){
				return $matches[2][0];
			}
			return false;
		}
		return false;
	}

	public static function getDomainDetails($domain){
		$domain = self::cleanURL($domain);
		if($domain != false){
			$parse = preg_match_all('/^(?!-)([a-zA-Z0-9-]{2,63})(?<!-)\.([a-zA-Z\.]{2,})/i', $domain, $matches);
			if($parse){
				return $matches;
			}
			return false;
		}
		return false;
	}

	public static function cleanURL($url){
		$url = preg_replace("/(^(http(s)?:\/\/|www\.))?(www\.)?([a-z-\.0-9]+)/","$5", trim($url));
	    if(preg_match("/^([a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,6})/", $url, $domain)){
	    	return $domain[1];
	    }else{
	    	return false;
	    }
	}

	public static function isUgandan($domain){
		$cleanDomain =  self::cleanURL($domain);
		$extension = self::getDomainExtension($domain);

		if(in_array($extension, self::$ug_extensions)){
			return true;
		}
		return false;
	}

	public static function isRwandan($domain){
		$cleanDomain = self::cleanURL($domain);
		$extension = self::getDomainExtension($domain);

		if(in_array($extension, self::$rw_extensions)){
			return true;
		}
		return false;
	}

	public static function intlDomain($domain){
		$cleanDomain = self::cleanURL($domain);
		$extension = self::getDomainExtension($domain);

		if(! in_array($extion, self::$rw_extensions) && ! in_array($domain, self::$ug_extensions)){
			return true;
		}
		return false;
	}
}