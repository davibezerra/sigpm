<ul class="menu-inferior">
<?php echo form_open('logradourotipos/processa_busca'); ?>
    <li><?php echo anchor('logradourotipos/cadastrar', 'Cadastrar', 'class="botao"');?></li>
    <li><input type="text" id="termo" name="termo" placeholder="Localizar pelo nome" autocomplete="off" value="<?php echo @$termo;?>" /></li>
    <li><input type="submit" class="botao" id="buscar" value="Buscar" /></li>
    <li class="separador"></li>
    <?php if(@$resultados):?><li><div class="resultados-busca"><?php echo $resultados;?> resultados para <strong>"<?php echo $termo;?>"</strong></div></li><? endif;?>
<?php echo form_close();?>
</ul>

<table>
    <thead>
    <tr><th>x</th><th>Tipo</th><th>Ações</th></tr>
    </thead>
    <tbody>
    <?php
foreach($tipos as $data) {
    echo "<tr>
        <td>".$data->id."</td>
        <td>".$data->nome."</td>
        <td>".anchor('logradourotipos/modificar/'.$data->id.'', 'Modificar')." ".anchor('logradourotipos/excluir/'.$data->id.'', 'Excluir')."</td>
        </tr>\n";
}
?>        
</table>

<?php

echo $links;

/* End of file index.php */
/* Location: ./application/views/desktop/logradourotipos/index.php */
