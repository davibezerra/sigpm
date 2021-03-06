<ul class="menu-inferior">
<?php echo form_open('distritos/processa_busca'); ?>
    <li><?php echo anchor('distritos/cadastrar', 'Cadastrar', 'class="botao"');?></li>
    <li><input type="text" id="termo" name="termo" title="Você deve informar um termo para pesquisa" placeholder="Localizar pelo nome" autocomplete="off" value="<?php echo @$termo;?>" /></li>
    <li><input type="submit" class="botao" id="buscar" value="Buscar" /></li>
    <li class="separador"></li>
    <?php if(@$resultados):?><li><div class="resultados-busca"><?php echo $resultados;?> resultados para <strong>"<?php echo $termo;?>"</strong></div></li><? endif;?>
<?php echo form_close();?>
</ul>

<table>
    <thead>
    <tr><th>x</th><th>Distrito</th><th>Município</th><th>Ações</th></tr>
    </thead>
    <tbody>
    <?php
foreach($distritos as $data) {
    echo "<tr>
        <td>".$data->id."</td>
        <td>".$data->nome."</td>
        <td>".$data->municipios->nome."/".$data->municipios->estados->sigla."</td>
        <td>".anchor('distritos/modificar/'.$data->id.'/'.$data->sigla.'', 'Modificar', 'class="botao"')." ".anchor('distritos/excluir/'.$data->id.'/'.$data->sigla.'', 'Excluir', 'class="botao"')."</td>
        </tr>\n";
}
?>        
</table>

<?php

echo $links;

/* End of file index.php */
/* Location: ./application/views/desktop/distritos/index.php */
