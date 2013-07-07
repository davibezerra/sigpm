<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acao extends DataMapper {

    var $table = "acoes";
    var $has_one = array('ocorrencia','operacao');

    function __construct($id = NULL){
        parent::__construct($id);
    }

}

/* End of file country.php */
/* Location: ./application/models/bairro.php */
