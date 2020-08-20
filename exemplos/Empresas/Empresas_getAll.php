<?php
    require __DIR__.'/../vendor/autoload.php';
    use SNFe\Empresas;        
    // Coloca o Token SNFe  no environment do PHP.
    $snfe_token="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJjb250YV9pZCI6Ijc1MCIsInVzZXIiOnsiaWQiOiI2NzAiLCJlbWFpbCI6ImFwaV80c2lzQHNiYXVtLmNvbS5iciIsInNlbmhhIjoiIzEyMzQifSwiZGF0YV9jcmlhZG8iOiIxOVwvMDhcLzIwMjAiLCJleHBpcmUiOiIwMVwvMzBcLzE5NzAifQ.n2j9wTFaRjzUoiXmyD09Dnmo-6Hs-2u42ccLH-5Ze8tCPf8R88kg-c16yIRflMsthHvwVfwlhDjFruNyfPHoRg";    
    putenv('SNFE_TOKEN='.$snfe_token);    
    // Define o ambiente no environment do PHP - esse ambiente não tem vinculo com Produção/Homologação na Sefaz.
    $snfe_env = "prod";    
    putenv('SNFE_ENV='.$snfe_env);


    $_serviceEmpresa = new Empresas();    
    try {    
        $ret = $_serviceEmpresaInvoice->all();
        print_r($ret);
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    
?>