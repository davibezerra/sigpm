<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AcaoCategoria extends DataMapper {

    var $table = "acaocategorias";
    var $has_many = array('acaotipo' => array(
            'class' => 'acaotipo',
            'other_field' => 'acaocategoria'
        )
    );

    function __construct($id = NULL){
        parent::__construct($id);
    }

}

/* End of file acaocategoria.php */
/* Location: ./application/models/acaocategoria.php */
