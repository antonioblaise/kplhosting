<?php namespace Kplhosting;

class Domains{

	protected $ug_extensions =array(
		'ug', 
		'co.ug',
		'or.ug', 
		'ac.ug', 
		'sc.ug',
		'go.ug',
		'ne.ug',
		'com.ug',
		'org.ug'
	);

	protected $rw_extensions = array(
		'rw',
		'co.rw',
		'org.rw',
		'coop.rw',
		'ltd.rw',
		'ac.rw'
	);

	public function __construct(){}

	public static function getDomainExtension($domain){
		$search = preg_match_all('/^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z.]{2,}$/i', $domain, $matches, PREG_SET_ORDER);
		if($search){
			//$results = ['domain_name'=> $matches[0][0],'name' => $matches[0][1],'extension' => $matches[0][2]];
			return $matches;
		}
		return false;
	}

	public static function acceptableExtension($domain){
		$extension = self::getDomainExtension($domain)[0][2];
		if(in_array($extension, $ug_extensions)){
			return 'it is a ugandan domain name';
		}
		elseif(in_array($extension, $rw_extensions)){
			return 'it is a rwandan domain name';
		}
	}
}