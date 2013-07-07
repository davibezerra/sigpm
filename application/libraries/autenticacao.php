<?php

class Autenticacao {
    
    public function __construct(){
        
        $this->funcao = new SistemaFuncao();
    }
    
    public function is_allowed($class, $method, $user){

        $conditions['classe'] = $class;
        $conditions['metodo'] = $method;
        $total = $this->funcao->where($conditions)->count();

    }
    
}

/* End of file autenticacao.php */
/* Location: ./application/libraries/autenticacao.php */

