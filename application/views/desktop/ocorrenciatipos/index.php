<ul class="menu-inferior">
<?php echo form_open('ocorrenciatipos/processa_busca'); ?>
    <li><?php echo anchor('ocorrenciatipos/cadastrar', 'Cadastrar', 'class="botao"');?></li>
    <li><input type="text" id="termo" name="termo" title="Você deve informar um termo para pesquisa" placeholder="LOCALIZAR PELO NOME" autocomplete="off" value="<?php echo @$termo;?>" /></li>
    <li><input type="submit" class="botao" id="buscar" value="Buscar" /></li>
    <li class="separador"></li>
    <?php if(@$resultados):?><li><div class="resultados-busca"><?php echo $resultados;?> resultados para <strong>"<?php echo $termo;?>"</strong></div></li><? endif;?>
<?php echo form_close();?>
</ul>

<table>
    <thead>
    <tr><th>x</th><th>Tipo</th><th>Categoria</th><th>Ações</th></tr>
    </thead>
    <tbody>
    <?php
foreach($tipos as $data) {
    echo "<tr>
        <td>".$data->id."</td>
        <td><strong>".$data->nome."</strong></td>
        <td>".$data->ocorrenciacategorias->nome."</td>
        <td>".anchor('ocorrenciatipos/modificar/'.$data->id.'', 'Modificar', 'class="botao"')." ".anchor('ocorrenciatipos/excluir/'.$data->id.'', 'Excluir', 'class="botao"')."</td>
        </tr>\n";
}
?>        
</table>

<?php

echo $links;

/* End of file index.php */
/* Location: ./application/views/desktop/ocorrenciatipos/index.php */
