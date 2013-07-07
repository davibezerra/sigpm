<ul data-role="listview">
<?php
foreach($categorias as $data) {
    echo "<li>".anchor('ocorrenciacategorias/modificar/'.$data->id.'', ''.$data->nome.'')."</li>\n";
}
?>
</ul>
<?php


/* End of file index.php */
/* Location: ./application/views/mobile/ocorrenciacategorias/index.php */
