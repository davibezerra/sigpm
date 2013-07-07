<?php echo form_open('estados/processa_busca'); ?>
<div id="topcontain" data-role="fieldcontain">
    <?php echo anchor('estados/cadastrar', 'Cadastrar', 'data-role="button" data-inline="true" data-iconpos="notext" data-icon="plus" data-theme="b"');?>
    <input type="search" placeholder="Buscar pelo nome" name="termo" value="<?php echo @$termo;?>" />
</div>
<?php echo form_close();?>

<?php if(@$resultados):?><div class="flashmessage ui-bar ui-bar-c"><h3 style="display:inline-block; width:92%; margin-top:5px;"><?php echo $resultados;?> resultados para <strong>"<?php echo $termo;?>"</strong></h3><div style="display:inline-block; width:8%; margin-top:0px; text-align:right;"><a href="#" data-role="button" class="close-message" data-icon="delete" data-inline="true" data-rel="close" data-iconpos="notext">Fechar</a></div></div><? endif;?>

<ul data-role="listview" data-split-theme="f" data-split-icon="bars">
<?php
foreach($uf as $data) {

    echo '<li>'.anchor('#', ''.$data->nome.'').''.anchor('#popupMenu'.$data->id.'', ''.$data->nome.'','data-rel="popup" data-theme="b"').'
<div data-role="popup" id="popupMenu'.$data->id.'" data-theme="a">
        <ul data-role="listview" data-inset="true" data-theme="c">
            <li data-role="divider" data-theme="b">'.$data->nome.'</li>
            <li data-icon="edit" data-theme="d">'.anchor('/estados/modificar/'.$data->id, 'Modificar').'</li>
            <li data-icon="delete">'.anchor('/estados/excluir/'.$data->id, 'Excluir').'</li>
        </ul>
</div></li>';


}
?> 
</ul>

<?php

echo $links;


/* End of file index.php */
/* Location: ./application/views/mobile/estados/index.php */
