<?php
    require __DIR__.'/../../vendor/autoload.php';
    use SNFe\Empresas;        
    // Coloca o Token SNFe  no environment do PHP.
    $snfe_token="";    
    putenv('SNFE_TOKEN='.$snfe_token);    
    // Define o ambiente no environment do PHP - esse ambiente não tem vinculo com Produção/Homologação na Sefaz.
    $snfe_env = "prod";    
    putenv('SNFE_ENV='.$snfe_env);


    $_serviceEmpresa = new Empresas();    

    //Criando uma Empresa
    try {    
        $_empresa_nova = [
                "cnpj" => "14567321000187",
                "razao_social" => "Empresa de teste 001",
                "nome_fantasia" => "Meu Teste",
                "inscricao_estadual" => "123456",
                "inscricao_municipal" => "",
                "cidade_id" => "3549904",
                "endereco" => "Rua de Exemplo",
                "numero" => "1",
                "complemento" => "Sala 2",
                "bairro" => "Jardim ",
                "cep" => "80000123",
                "telefone" => "5599566985",
                "email" => "teste@testando.com.br",
                "senha_nfse" => "123teste",                
                "tp_Amb"=> [
                            "id"=> "2"
                            ],
                "tp_CRT" => [
                            "id" => "1"
                            ]
                ];
        $ret = $_serviceEmpresa->create($_empresa_nova);        
        $_id =  $ret->id;
        echo "Empresa Criada id:" . $_id . " <br/>";
    } catch (\Exception $e) {
        echo $e->getMessage()  . "-  Htttp Code: " . $e->getCode();
    }    
    
    //Consultando
    try { 
        // Criando creitérios para busca da empresa!!
        $_criterios =[
                        'order'=>'id desc',
                        'limit'=>10,
                        'page'=>1,
                        'filtros'=>[['id','>','1']]];
        
        $ret = $_serviceEmpresa->all($_criterios);        
        echo "Total Empresas: " .  $ret->total_records . "<br/>";
    } catch (\Exception $e) {
        echo $e->getMessage()  . "-  Htttp Code: " . $e->getCode();
    }

    //Alterando
    try { 
        $_empresa_alterada = [
                "razao_social" => "Nome Alterado!!",
            ];        
        $ret = $_serviceEmpresa->update($_id,$_empresa_alterada);
        echo "Empresa Alterada: <br/>";        
    } catch (\Exception $e) {
        echo $e->getMessage()  . "-  Htttp Code: " . $e->getCode();
    }

    //Buscando pelo id
    try { 
        $ret = $_serviceEmpresa->retrieve($_id);
        echo "Empresa Carregada: <br/>";
        echo $ret->razao_social . "<br/>";        
    } catch (\Exception $e) {
        echo $e->getMessage()  . "-  Htttp Code: " . $e->getCode();
    }

    //Excluindo
    try { 
        $ret = $_serviceEmpresa->delete($_id);        
        echo $ret . "<br/>";        
    } catch (\Exception $e) {
        echo $e->getMessage()  . "-  Htttp Code: " . $e->getCode();
    }


    //Consultando
    try { 
        // Criando creitérios para busca da empresa!!
        $_criterios =[
                        'order'=>'id desc',
                        'limit'=>10,
                        'page'=>1,
                        'filtros'=>[['id','>','1']]];
        
        $ret = $_serviceEmpresa->all($_criterios);        
        echo "Total Empresas: " .  $ret->total_records . "<br/>";
    } catch (\Exception $e) {
        echo $e->getMessage()  . "-  Htttp Code: " . $e->getCode();
    }

    
?>