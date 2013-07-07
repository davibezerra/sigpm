<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SistemaCategoria extends DataMapper {

    var $table = "sistemacategorias";
    var $has_one = array('sistemamodulo' => array(
            'class' => 'sistemamodulo',
            'other_field' => 'sistemacategoria'
        )
    );

    var $has_many = array('sistemafuncao' => array(
            'class' => 'sistemafuncao',
            'other_field' => 'sistemacategoria'
        )
    );

    function __construct($id = NULL){
        parent::__construct($id);
    }

}

/* End of file sistemacategoria.php */
/* Location: ./application/models/sistemacategoria.php */
