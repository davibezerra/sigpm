<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AcaoTipo extends DataMapper {

    var $table = "acaotipos";
    var $has_one = array('acaocategoria' => array(
            'class' => 'acaocategoria',
            'other_field' => 'acaotipo'
        )
    );

    function __construct($id = NULL){
        parent::__construct($id);
    }

}

/* End of file acaotipo.php */
/* Location: ./application/models/acaotipo.php */
