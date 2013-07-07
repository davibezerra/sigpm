<ul class="menu-inferior">
<?php echo form_open('operacoes/processa_busca'); ?>
    <li><?php echo anchor('operacoes/cadastrar', 'Cadastrar', 'class="botao"');?></li>
    <li><input type="text" id="termo" name="termo" placeholder="Localizar pelo nome" autocomplete="off" value="<?php echo @$termo;?>" /></li>
    <li><input type="submit" class="botao" id="buscar" value="Buscar" /></li>
    <li class="separador"></li>
    <?php if(@$resultados):?><li><div class="resultados-busca"><?php echo $resultados;?> resultados para <strong>"<?php echo $termo;?>"</strong></div></li><? endif;?>
<?php echo form_close();?>
</ul>

<table>
    <thead>
    <tr><th>x</th><th>Operação</th><th>Ações</th></tr>
    </thead>
    <tbody>
    <?php
foreach($operacoes as $data) {
    echo "<tr>
        <td>".$data->id ."</td>
        <td><strong>".$data->nome."</strong></td>
        <td>".anchor('operacoes/modificar/'.$data->id.'','Modificar','class="botao"')." ".anchor('operacoes/excluir/'.$data->id.'', 'Excluir', 'class="botao"')."</td>
        </tr>\n";
}
?> 
    </tbody>       
</table>
<?php

echo $links;

/* End of file index.php */
/* Location: ./application/views/desktop/operacoes/index.php */
