<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SistemaFuncao extends DataMapper {

    var $table = "sistemafuncoes";
    var $has_one = array('sistemacategoria' => array(
            'class' => 'sistemacategoria',
            'other_field' => 'sistemafuncao'
        )
    );
    
    function __construct($id = NULL){
        parent::__construct($id);
    }

}

/* End of file sistemafuncao.php */
/* Location: ./application/models/sistemafuncao.php */
