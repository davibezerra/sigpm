<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OcorrenciaTipo extends DataMapper {

    var $table = "ocorrenciatipos";
    var $has_one = array('ocorrenciacategoria');
    
    function __construct($id = NULL){
        parent::__construct($id);
    }

}

/* End of file ocorrenciacategoria.php */
/* Location: ./application/models/ocorrenciacategoria.php */
