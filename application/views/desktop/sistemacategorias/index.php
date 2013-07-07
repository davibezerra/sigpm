<ul class="menu-inferior">
<?php echo form_open('sistemacategorias/processa_busca'); ?>
    <li><?php echo anchor('sistemacategorias/cadastrar', 'Cadastrar', 'class="botao"');?></li>
    <li><input type="text" id="termo" name="termo" placeholder="Localizar pelo nome" autocomplete="off" value="<?php echo @$termo;?>" /></li>
    <li><input type="submit" class="botao" id="buscar" value="Buscar" /></li>
    <li class="separador"></li>
    <?php if(@$resultados):?><li><div class="resultados-busca"><?php echo $resultados;?> resultados para <strong>"<?php echo $termo;?>"</strong></div></li><? endif;?>
<?php echo form_close();?>
</ul>

<table>
    <thead>
    <tr><th>x</th><th>Categoria</th><th>Módulo</th><th>Ações</th></tr>
    </thead>
    <tbody>
    <?php
foreach($categorias as $data) {
    echo "<tr>
        <td>".$data->id ."</td>
        <td><strong>".$data->nome."</strong></td>
        <td>".$data->sistemamodulo->nome. "</td>
        <td>".anchor('sistemacategorias/modificar/'.$data->id.'', 'Modificar','class="botao"')." ".anchor('sistemacategorias/excluir/'.$data->id.'', 'Excluir','class="botao"')."</td>
        </tr>\n";
}
?> 
    </tbody>       
</table>
<?php

echo $links;


/* End of file index.php */
/* Location: ./application/views/desktop/sistemamodulos/index.php */
