<?php echo form_open('acaocategorias/modificar/'.$categoria->id);?>
<?php echo form_hidden('id', $categoria->id);?>  
<table>
    <tr>
        <td><?php echo form_label('Estado', 'nome');?></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50','size'=>'27'),$categoria->nome);?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Modificar', 'class="botao"');?><a href="javascript:history.back()" class="botao">voltar</a></td>
    </tr>
</table>
<?php echo form_close();


/* End of file modificar.php */
/* Location: ./application/views/desktop/acaocategorias/modificar.php */

