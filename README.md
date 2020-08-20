![alt text align:center](https://www.sbaum.com.br/assets/img/logo-sbaum.png "Sbaum-Tecnologia")

# SNFe - SDK PHP


## Descrição
Este pacote consiste em um SDK em PHP para a utilizacao do sistema SNFe através de api - REST.

# Requisitos
- PHP >=5.5.19;


# Instalação

Via Composer

```bash
composer require sbaum-tecnologia/snfe-php-v2:dev-master
```

## Licença
GNU GPLv3. Por favor, veja o [Arquivo de Licença](license.txt) para mais informações.

## Exemplo
```php
require __DIR__.'/../vendor/autoload.php';

// Coloca o Token SNFe  no environment do PHP.

putenv('SNFE_TOKEN=INFORME SEU TOKEN AQUI');


// Cria Objetos de Consulta/Servico
 

$ServiceEmpresas = new SNFe\Empresas();

$empresaNova = [
    'razao_social'=>'Teste',
    'nome_fantasia'=>'Teste',
    'cnpj'=>'50.311.620/0001-10',
    'inscricao_municipal'=>'',
    'inscricao_estadual'=>'',
    'endereco'=>'',
    'numero'=>'',
    'complemento'=>'',
    'bairro'=>'',
    'cidade'=>'',
    'estado'=>'',
    'cep'=>'',
    'responsavel_nome'=>'',
    'responsavel_email'=>'',
    'responsavel_telefone'=>'',
];



try {
    $_retCreate = $ServiceEmpresas->create(['data'=>$empresaNova]);
} catch (Exception $e) {
       echo $e->getMessage();
       exit;
}


try {        
    
    $ret = $ServiceEmpresas->all(['order'=>'cnpj desc','limit'=>10,'page'=>1,'filtros'=>[['id','>','1']]]);
    
    foreach ($ret->obj as $emp_obj){        
        /*
         * Busca a empresa pelo id
         */        
            $_ret = $ServiceEmpresas->get($emp_obj->id);
        
            echo "CNPJ: " . $_ret->cnpj . "</br>";
            echo "ID: " . $_ret->id . "</br>";
         }
    }
    
    echo '--Fim--';
} catch (Exception $e) {
    echo $e->getMessage();    
}
# snfe-php-v2
