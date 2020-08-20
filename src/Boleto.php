<?php

namespace SNFe;

class Boleto extends Resource
{
    /**
     * The endpoint that will hit the API.
     *
     * @return string
     */
    public function endpoint()
    {
        return 'Boleto';
    }

    public function create($data){        
        return $this->apiRequester->request('POST', $this->url(null,'emissao'), ['json' => $data]);
    }

    public function gerarCnab($bank_account_id){        
        return $this->apiRequester->request('GET', $this->url($bank_account_id,'gerarCNAB'));
    }

    public function retornoCnab($bank_account_id,$data){        
        return $this->apiRequester->request('POST', $this->url($bank_account_id,'lerCNAB'), ['json' => $data]);
    }



    
}