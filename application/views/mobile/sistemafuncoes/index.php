<ul class="menu-inferior">
<?php echo form_open('sistemafuncoes/processa_busca'); ?>
    <li><?php echo anchor('sistemafuncoes/cadastrar', 'Cadastrar', 'class="botao"');?></li>
    <li><input type="text" id="termo" name="termo" placeholder="Localizar pelo nome" autocomplete="off" value="<?php echo @$termo;?>" /></li>
    <li><input type="submit" class="botao" id="buscar" value="Buscar" /></li>
    <li class="separador"></li>
    <?php if(@$resultados):?><li><div class="resultados-busca"><?php echo $resultados;?> resultados para <strong>"<?php echo $termo;?>"</strong></div></li><? endif;?>
    <?php echo $links;?>
<?php echo form_close();?>
</ul>

<table>
    <thead>
    <tr><th>x</th><th>Função</th><th>Descrição</th><th>Categoria</th><th class="acoes">Ações</th></tr>
    </thead>
    <tbody>
    <?php
foreach($funcoes as $data) {
    echo "<tr>
        <td>".$data->id ."</td>
        <td><strong>".$data->nome."</strong></td>
        <td>".$data->descricao. "</td>
        <td>".$data->sistemacategoria->nome. "</td>
        <td class=\"acoes\">".anchor('sistemafuncoes/modificar/'.$data->id.'','Modificar','class="botao"')." ".anchor('sistemafuncoes/excluir/'.$data->id.'', 'Excluir', 'class="botao"')."</td>
        </tr>\n";
}
?> 
    </tbody>       
</table>
<?php


/* End of file index.php */
/* Location: ./application/views/desktop/sistemafuncoes/index.php */
