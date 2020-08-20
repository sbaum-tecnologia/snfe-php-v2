<?php

namespace SNFe;

class SNFe
{
    /**
     * This Package SDK Version.
     * @var string
     */
    public static $sdkVersion = '2.0.0';

       

    /**
     * The Environment variable name for API Key.
     * @var string
     */
    public static $tokenEnvVar = 'SNFE_TOKEN';    
    public static $snfeEnviroment = 'SNFE_ENV';

    /**
     * Get Vindi API Key from environment.
     * @return string
     */
    public static function getToken()
    {   
        return static::$tokenEnvVar;
        
    }
    
    public static function getApiBase()
    {
        if(getenv(static::$snfeEnviroment)=="dev"){
            return 'https://dev.snfe.com.br/v2/';
        }
        return 'https://api.snfe.com.br/v2/';        
    }
    
}
