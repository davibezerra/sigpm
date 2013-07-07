<ul class="menu-inferior">
<?php echo form_open('subunidades/processa_busca'); ?>
    <li><?php echo anchor('subunidades/cadastrar', 'Cadastrar', 'class="botao"');?></li>
    <li><input type="text" id="termo" name="termo" placeholder="Localizar pelo nome" autocomplete="off" value="<?php echo @$termo;?>" /></li>
    <li><input type="submit" class="botao" id="buscar" value="Buscar" /></li>
    <li class="separador"></li>
    <?php if(@$resultados):?><li><div class="resultados-busca"><?php echo $resultados;?> resultados para <strong>"<?php echo $termo;?>"</strong></div></li><? endif;?>
<?php echo form_close();?>
</ul>

<table>
    <thead>
    <tr><th>x</th><th>SubUnidade</th><th>Unidade</th><th>Ações</th></tr>
    </thead>
    <tbody>
<?php
foreach($subunidades as $data) {
    echo "<tr>
        <td>".$data->id."</td>
        <td><strong>".$data->nome."</strong></td>
        <td>".$data->unidade->nome."/".$data->unidade->descricao."</td>
        <td>".anchor('subunidades/detalhar/'.$data->id.'', 'Detalhar','class="botao"')." ".anchor('subunidades/modificar/'.$data->id.'', 'Modificar','class="botao"')." ".anchor('subunidades/excluir/'.$data->id.'', 'Excluir','class="botao"')."</td>
        </tr>\n";
}
?>        
</table>

<?php

echo $links;

/* End of file index.php */
/* Location: ./application/views/desktop/subunidades/index.php */
