<ul class="menu-inferior">
<?php echo form_open('bairros/processa_busca'); ?>
    <li><?php echo anchor('bairros/cadastrar', 'Cadastrar', 'class="botao"');?></li>
    <li><input type="text" id="termo" name="termo" placeholder="Localizar pelo nome" autocomplete="off" value="<?php echo @$termo;?>" /></li>
    <li><input type="submit" class="botao" id="buscar" value="Buscar" /></li>
    <li class="separador"></li>
    <?php if(@$resultados):?><li><div class="resultados-busca"><?php echo $resultados;?> resultados para <strong>"<?php echo $termo;?>"</strong></div></li><? endif;?>
<?php echo form_close();?>
</ul>

<table>
    <thead>
    <tr><th>x</th><th>Bairro</th><th>Distrito</th><th>Município</th><th>Ações</th></tr>
    </thead>
    <tbody>
    <?php
foreach($bairros as $data) {
    echo "<tr>
        <td>".$data->id."</td>
        <td>".$data->nome."</td>
        <td>".$data->distritos->nome."</td>
        <td>".$data->distritos->municipios->nome."/".$data->distritos->municipios->estados->sigla."</td>
        <td>".anchor('bairros/modificar/'.$data->id.'', 'Modificar', 'class="botao"')." ".anchor('bairros/excluir/'.$data->id.'', 'Excluir', 'class="botao"')."</td>
        </tr>\n";
}
?>        
</table>

<?php

echo $links;

/* End of file index.php */
/* Location: ./application/views/desktop/bairros/index.php */
