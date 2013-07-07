<ul class="menu-inferior">
<?php echo form_open('municipios/processa_busca'); ?>
    <li><?php echo anchor('municipios/cadastrar', 'Cadastrar', 'class="botao"');?></li>
    <li><input type="text" id="termo" name="termo" title="Você deve informar um termo para pesquisa" placeholder="LOCALIZAR PELO NOME" autocomplete="off" value="<?php echo @$termo;?>" /></li>
    <li><input type="submit" class="botao" id="buscar" value="Buscar" /></li>
    <li class="separador"></li>
    <?php if(@$resultados):?><li><div class="resultados-busca"><?php echo $resultados;?> resultados para <strong>"<?php echo $termo;?>"</strong></div></li><?php endif;?>
<?php echo form_close();?>
</ul>

<table>
    <thead>
    <tr><th>x</th><th>Municipio</th><th>Ações</th></tr>
    </thead>
    <tbody>
    <?php
foreach($municipios as $data) {
    echo "<tr>
        <td>".$data->id."</td>
        <td>".$data->nome."/".$data->estados->sigla."</td>
        <td>".anchor('municipios/modificar/'.$data->id.'', 'Modificar', 'class="botao"')." ".anchor('municipios/excluir/'.$data->id.'', 'Excluir', 'class="botao"')."</td>
        </tr>\n";
}
?>        
</table>

<?php

echo $links;

/* End of file index.php */
/* Location: ./application/views/desktop/municipios/index.php */
