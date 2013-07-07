<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
        'sistemamodulos' => array(
                array(
                        'field' => 'status',
                        'label' => 'Status',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'nome',
                        'label' => 'Módulo',
                        'rules' => 'required'
                     )
                ),
        'sistemacategorias' => array(
                array(
                        'field' => 'status',
                        'label' => 'Status',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'sistemamodulo_id',
                        'label' => 'Módulo',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'nome',
                        'label' => 'Categoria',
                        'rules' => 'required'
                     )
                ),
        'sistemafuncoes' => array(
                array(
                        'field' => 'status',
                        'label' => 'Status',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'sistemacategoria_id',
                        'label' => 'Categoria',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'menu',
                        'label' => 'Menu',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'classe',
                        'label' => 'Classe',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'metodo',
                        'label' => 'Método',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'nome',
                        'label' => 'Função',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'descricao',
                        'label' => 'Descrição',
                        'rules' => 'required'
                     )
                ),
        'sistemagrupos' => array(
                array(
                        'field' => 'unidade_id',
                        'label' => 'Unidade',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'nome',
                        'label' => 'Grupo',
                        'rules' => 'required'
                     )
            ),
        'ocorrenciacategorias' => array(
                array(
                        'field' => 'nome',
                        'label' => 'Categoria',
                        'rules' => 'required'
                     )
                ),
        'ocorrenciatipos' => array(
                array(
                        'field' => 'nome',
                        'label' => 'Tipo',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'ocorrenciacategoria_id',
                        'label' => 'Categoria',
                        'rules' => 'required'
                     )
            ),
        'hierarquias' => array(
                array(
                        'field' => 'id',
                        'label' => 'Código',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'nome',
                        'label' => 'Posto/Grad',
                        'rules' => 'required'
                     )
            ),
        'estados' => array(
                array(
                        'field' => 'nome',
                        'label' => 'Estado',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'sigla',
                        'label' => 'Sigla',
                        'rules' => 'required'
                     )
                ),
        'municipios' => array(
                array(
                        'field' => 'estado_id',
                        'label' => 'Estado',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'nome',
                        'label' => 'Município',
                        'rules' => 'required'
                     )
            ),
        'distritos' => array(
                array(
                        'field' => 'municipio_id',
                        'label' => 'Município',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'nome',
                        'label' => 'Distrito',
                        'rules' => 'required'
                     )
            ),
        'bairros' => array(
                array(
                        'field' => 'distrito_id',
                        'label' => 'Distrito',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'nome',
                        'label' => 'Bairro',
                        'rules' => 'required'
                     )
            ),
        'logradourotipos' => array(
                array(
                        'field' => 'nome',
                        'label' => 'Tipo',
                        'rules' => 'required'
                     )
            ),
        'logradouros' => array(
                array(
                        'field' => 'logradourotipo_id',
                        'label' => 'Tipo do Logradouro',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'bairro_id',
                        'label' => 'Bairro',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'nome',
                        'label' => 'Logradouro',
                        'rules' => 'required'
                     )
            ),
        'unidades' => array(
                array(
                        'field' => 'id',
                        'label' => 'Cód. Unidade',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'logradouro_id',
                        'label' => 'Logradouro',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'nome',
                        'label' => 'Unidade',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'descricao',
                        'label' => 'Descrição',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'slogan',
                        'label' => 'Slogan',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'numero',
                        'label' => 'Número',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'complemento',
                        'label' => 'Complemento',
                        'rules' => 'required'
                     )
            ),
        'subunidades' => array(
                array(
                        'field' => 'id',
                        'label' => 'Cód. Subunidade',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'unidade_id',
                        'label' => 'Unidade Pai',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'logradouro_id',
                        'label' => 'Logradouro',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'nome',
                        'label' => 'Subunidade',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'descricao',
                        'label' => 'Descrição',
                        'rules' => 'required'
                     )
            ),
        'acaocategorias' => array(
                array(
                        'field' => 'nome',
                        'label' => 'Categoria',
                        'rules' => 'required'
                     )
            ),
        'acaotipos' => array(
                array(
                        'field' => 'acaocategoria_id',
                        'label' => 'Cód. Categoria',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'nome',
                        'label' => 'Tipo',
                        'rules' => 'required'
                     )
            ),
        'operacoes' => array(
                array(
                        'field' => 'status',
                        'label' => 'Status',
                        'rules' => 'required'
                     ),
                array(
                        'field' => 'nome',
                        'label' => 'Operação',
                        'rules' => 'required'
                     )
            )
      );


/* End of file form_validation.php */
/* Location: ./application/config/form_validation.php */