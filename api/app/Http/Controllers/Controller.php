<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function listPage (){
        return view('index');
    }

    public function handleSearch(Request $request){     
  
        $input = $request->input('input');

        $apiQuote = 'https://api.iextrading.com/1.0/stock/' . $input . '/quote';
        $apiCompany = 'https://api.iextrading.com/1.0/stock/' . $input . '/company';

        $url = array($apiQuote, $apiCompany);

        $client = array();
        $response = array(); 
        $json = array();
        $object = array();

        for($i = 0; $i < count($url); $i++){
            array_push($client, new Client(['base_uri' => $url[$i]]));
            array_push($response, $client[$i]->request('GET'));
            array_push($json, $response[$i]->getBody());
            array_push($object, json_decode($json[$i]));
            
        }
        $latestPrice = $object[0]->latestPrice ;
        $name = $object[0]->companyName;
        $description = $object[1]->description;
        $CEO = $object[1]->CEO;

        return view('index', compact('name', 'latestPrice', 'description', 'CEO')); 
        


        /*
          
        $input = $request->input('input');

        $apiQuote = 'https://api.iextrading.com/1.0/stock/' . $input . '/quote';
        $apiLogo = 'https://api.iextrading.com/1.0/stock/' . $input . '/logo';
        $apiNews = 'https://api.iextrading.com/1.0/stock/' . $input . '/news/last/1';

        $url = array($apiQuote, $apiLogo, $apiNews);

        $client = array();
        $response = array(); 
        $json = array();
        $object = array();

        for($i = 0; $i < count($url); $i++){
            array_push($client, new Client(['base_uri' => $url[$i]]));
            array_push($response, $client[$i]->request('GET'));
            array_push($json, $response[$i]->getBody());
            array_push($object, json_decode($json[$i]));
            
        }
        $latestPrice = $object[0]->latestPrice ;
        $name = $object[0]->companyName;
        $logo = $object[1]->url;
        $headline = $object[2][0]->headline;
        $summary = $object[2][0]->summary;

        return view('index', compact('name', 'latestPrice', 'logo', 'headline', 'summary')); 
        */
    }

}
