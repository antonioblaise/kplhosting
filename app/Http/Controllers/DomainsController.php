<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller;
use Kplhosting\UG_Domains;
use Domains;
use InternetBS\InternetBS;
use Sabre\Xml\Reader;

class DomainsController extends Controller
{
    private $client;
    
    public function __construct(){
        $this->client = new Client();
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request){
        $domain = strtolower($request->input('domain'));
        $response = [];
        $response['domain'] = $domain;
        $response['country'] = null;
        $response['status'] = false;
        $response['domain_details'] = Domains::getDomainDetails($domain);
        if(Domains::isDomainUG($domain)){
            $response['country'] = "UGANDA";
            $xml = (string) Domains::post('https://new.registry.co.ug:8006/api', ['body' => Domains::UG_Whois_Command($domain)]); 
            $reader = new Reader();
            $reader->xml($xml);
            $parsedXML = $reader->parse();
            $data = $parsedXML['value'];
            $status = (int) $parsedXML['attributes']['status'];
            if($status){
                $response['status'] = true;
                Session::flash('errordomain', $domain.' domain is not available');
                $response['data']['domain'] = $data[1]['attributes'];
                $response['data']['registrant'] = $data[2]['value'][0]['attributes'];
                $response['data']['admin'] = $data[2]['value'][1]['attributes'];
                $response['data']['billing'] = $data[2]['value'][2]['attributes'];
                $response['data']['tech'] = $data[2]['value'][3]['attributes'];
                $response['data']['nameservers'] = [
                    "ns1" => $data[3]['value'][0]['value'],
                    "ns2" => $data[3]['value'][1]['value'],
                    "ns3" => $data[3]['value'][2]['value'],
                    "ns4" => $data[3]['value'][3]['value']
                ];
            }
            else{
                Session::flash('successdomain', $domain.' domain is available');
            }
        }
        elseif(Domains::isDomainRW($domain)){
            $response['country'] = "RWANDA";
            $response['status'] = true;
            $response['data'] = [];
            $domain = Domains::cleanURL($domain);
            $params = [
                'form_params' => [
                    'search' => $domain
                ],
                'verify' => false
            ];
            $data = Domains::post('https://whois.ricta.org.rw/whois.jsp', $params);
            if(preg_match_all('/<tr><th>(?:[a-zA-Z\s]+)<\/th><td><a href=\'(.+)\'>(?:[a-zA-Z\.]+)<\/a>/im', $data, $matches)){
                Session::flash('errordomain', $domain.' domain is not available');
            }
            else{
                Session::flash('successdomain', $domain. ' domain is available');
            }
        }
        else{
            $domain = Domains::cleanURL($domain);
            if(!empty($domain)){
                $response['country'] = "INTERNATIONAL";
                try {
                    InternetBS::init('X1A7S0D7X8N0U0U0I6S2', 'Toto197500cxz');
                    if(InternetBS::api()->domainCheck($domain)){
                        Session::flash('successdomain', $domain.' domain is available');
                    }else{
                        Session::flash('errordomain', $domain. ' domain is not available');
                    }
                    
                } catch (Exception $e) {
                    Session::flash('errordomain', ' Incorrect input domain. please type correctly');
                }
            }
            else{
                Session::flash('errordomain', ' Incorrect input domain. please type correctly');
            }
        }

        return view('domain.search', compact('response', $response));
    }

    public function home(){
        return view('homepage');
    }

    public function reservation(Request $request){
        
    }
}