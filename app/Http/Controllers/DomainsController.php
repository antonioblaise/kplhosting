<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\Http\Controllers\Controller;
use Kplhosting\Domains;
use Kplhosting\UG_Domains;
use Sabre\Xml\Reader;

class DomainsController extends Controller
{
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
        $domain = $request->input('domain');
        $parse = Domains::getDomainDetails($domain);
        $results = null;
        $response = null;
        if($parse != false){
            $results = [
                'domain_name' => $parse[0][0],
                'domain' => $parse[1][0],
                'extension' => $parse[2][0]
            ];
        }
        else{
            Session::flash('errordomain', 'Invalid Domain Name.. Please type correctly!');
        }

        if(Domains::isUgandan($domain)){
            $response = UG_Domains::isAvailable(Domains::cleanURL($domain));
        }elseif (Domains::isRwandan($domain)) {
            var_dump(Domains::cleanURL($domain));
        }
        return view('domain.search', compact('response', $response));
    }

    public function home(){
        return view('homepage');
    }

    public function reservation(){}
}