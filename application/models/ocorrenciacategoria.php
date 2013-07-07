<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OcorrenciaCategoria extends DataMapper {

    var $table = "ocorrenciacategorias";
    var $has_many = array('ocorrenciatipo' => array(
            'class' => 'ocorrenciatipo',
            'other_field' => 'ocorrenciacategoria'
        )
    );

    function __construct($id = NULL){
        parent::__construct($id);
    }

}

/* End of file ocorrenciacategoria.php */
/* Location: ./application/models/ocorrenciacategoria.php */
