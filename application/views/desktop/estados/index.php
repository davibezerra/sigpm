<ul class="menu-inferior">
<?php echo form_open('estados/processa_busca'); ?>
    <li><?php echo anchor('estados/cadastrar', 'Cadastrar', 'class="botao"');?></li>
    <li><input type="text" id="termo" name="termo" title="Você deve informar um termo para pesquisa" placeholder="LOCALIZAR PELO NOME" autocomplete="off" value="<?php echo @$termo;?>" /></li>
    <li><input type="submit" class="botao" id="buscar" value="Buscar" /></li>
    <li class="separador"></li>
    <?php if(@$resultados):?><li><div class="resultados-busca"><?php echo $resultados;?> resultados para <strong>"<?php echo $termo;?>"</strong></div></li><? endif;?>
<?php echo form_close();?>
</ul>

<table>
    <thead>
    <tr><th>x</th><th>Estado</th><th>Sigla</th><th class="acoes">Ações</th></tr>
    </thead>
    <tbody>
    <?php
foreach($uf as $data) {
    echo "<tr>
        <td>".$data->id ."</td>
        <td>".$data->nome. "</td>
        <td>".$data->sigla. "</td>
        <td class=\"acoes\">".anchor('estados/modificar/'.$data->id.'', 'Modificar', 'class="botao"')." ".anchor('estados/excluir/'.$data->id.'', 'Excluir', 'class="botao"')."</td>
        </tr>\n";
}
?> 
    </tbody>       
</table>
<?php

echo $links;


/* End of file index.php */
/* Location: ./application/views/desktop/estados/index.php */
