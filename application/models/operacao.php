<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operacao extends DataMapper {

    var $table = "operacoes";
    var $has_many = array('acao');

    function __construct($id = NULL){
        parent::__construct($id);
    }

}

/* End of file operacao.php */
/* Location: ./application/models/operacao.php */
