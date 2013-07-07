<ul class="menu-inferior">
<?php echo form_open('unidades/processa_busca'); ?>
    <li><?php echo anchor('unidades/cadastrar', 'Cadastrar', 'class="botao"');?></li>
    <li><input type="text" id="termo" name="termo" placeholder="Localizar pelo nome" autocomplete="off" value="<?php echo @$termo;?>" /></li>
    <li><input type="submit" class="botao" id="buscar" value="Buscar" /></li>
    <li class="separador"></li>
    <?php if(@$resultados):?><li><div class="resultados-busca"><?php echo $resultados;?> resultados para <strong>"<?php echo $termo;?>"</strong></div></li><? endif;?>
<?php echo form_close();?>
</ul>

<table>
    <thead>
    <tr><th>x</th><th>Unidade</th><th>Local</th><th>Ações</th></tr>
    </thead>
    <tbody>
<?php
foreach($unidades as $data) {
    echo "<tr>
        <td>".$data->id."</td>
        <td><strong>".$data->nome."</strong> - ".$data->descricao."</td>
        <td>".$data->logradouro->bairro->distrito->municipio->nome." / ".$data->logradouro->bairro->distrito->municipio->estado->sigla."</td>
        <td>".anchor('unidades/detalhar/'.$data->id.'', 'Detalhar','class="botao"')." ".anchor('unidades/modificar/'.$data->id.'', 'Modificar','class="botao"')." ".anchor('unidades/excluir/'.$data->id.'', 'Excluir','class="botao"')."</td>
        </tr>\n";
}
?>        
</table>

<?php

echo $links;


/* End of file index.php */
/* Location: ./application/views/desktop/unidades/index.php */
