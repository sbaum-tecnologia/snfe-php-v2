<?php
    require __DIR__.'/../vendor/autoload.php';
    use SNFe\Empresas;        
    // Coloca o Token SNFe  no environment do PHP.
    $snfe_token="";    
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