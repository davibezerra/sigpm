<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SistemaGrupo extends DataMapper {

    var $table = "sistemagrupos";

    var $has_one = array('unidade');
    
    function __construct($id = NULL){
        parent::__construct($id);
    }

}

/* End of file sistemagrupo.php */
/* Location: ./application/models/sistemagrupo.php */
