<?php
    require __DIR__.'/../vendor/autoload.php';
    use SNFe\Boleto;        
    // Coloca o Token SNFe  no environment do PHP.
    $snfe_token="";    
    putenv('SNFE_TOKEN='.$snfe_token);    
    // Define o ambiente no environment do PHP - esse ambiente não tem vinculo com Produção/Homologação na Sefaz.
    $snfe_env = "prod";    
    putenv('SNFE_ENV='.$snfe_env);

    $_service = new Boleto();    


    //Criando um boleto
    try {    
        $_emp = XX;
        $_acount_id =  XX;
        $_boleto = [            
                "empresas_id"=> $_emp, // Id da Empresa
                "bank_account_id"=> $_acount_id, // id da conta bancária
                "nome"=> "9090/1", // Numero do Título
                "data_vencimento"=> "2020-08-15",
                "data_documento"=> "2020-08-01",
                "valor"=> 870.09,
                "sacado_nome"=> "Teste pela API",
                "sacado_cpf_cnpj"=> "94672901114",
                "sacado_endereco"=> "Rua de Teste - S/N",
                "sacado_bairro"=> "Centro",
                "sacado_cep"=> "80060100",
                "sacado_cidade"=> "Curitiba",
                "sacado_uf"=> "PR",
                "multa"=>0.02,   // Multa - entre 0 e 1 ex. 2% = 0.02
                "juros"=>0.01    // Juros - entre 0 e 1 ex. 1% = 0.01        
                ];
        $ret = $_service->create($_boleto);        
        print_r($ret);
    } catch (\Exception $e) {
        echo $e->getMessage()  . "-  Htttp Code: " . $e->getCode();
    }  
    
    // Gerar o Arquivo Cnab
    try {                    
        $ret = $_service->gerarCnab($_acount_id);        
        print_r($ret);
    } catch (\Exception $e) {
        echo $e->getMessage()  . "-  Htttp Code: " . $e->getCode();
    }  

    // Ler o Arquivo Cnab
    try {                    
        $_file_content  = base64_encode(file_get_contents("../resources/retorno.txt"));     
        $data = [
            "fileb64" => $_file_content
        ];
        $ret = $_service->retornoCnab($_acount_id,$data);        
        print_r($ret);
    } catch (\Exception $e) {
        echo $e->getMessage()  . "-  Htttp Code: " . $e->getCode();
    }  
    

?>