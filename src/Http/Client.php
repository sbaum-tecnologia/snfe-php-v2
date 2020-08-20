<?php 

namespace SNFe\Http;

use GuzzleHttp\Client as Guzzle;
use SNFe\SNFe;

class Client extends Guzzle
{
    /**
     * Client constructor.
     */
    
   
    
    public function __construct(array $config = [])
    {
               
        $host = SNFe::getApiBase();        
        $token = SNFe::getToken();        
        $config = array_merge([
            'base_uri'        => $host,            
            'headers' => [
                'Content-Type' => 'application/json',
                'User-Agent'   => trim('SNFe-PHP/' . SNFe::$sdkVersion . "; {$host}"),
                'Authorization'   => 'Bearer ' . $token,
            ],
            'timeout' => 280,            
        ], $config);


        parent::__construct($config);
    }
    
    
    
    
}
