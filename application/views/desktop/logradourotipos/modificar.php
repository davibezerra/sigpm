<?php echo form_open('logradourotipos/modificar');?>
<table>
    <tr>
        <td><strong><?php echo form_label('Tipo', 'nome')?></strong></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','size'=>'35'),$tipo->nome);?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Modificar');?><a href="javascript:history.back()">Voltar</a></td>
    </tr>
</table>

<input type="hidden" name="id" id="id" value="<?php echo $tipo->id;?>" />

<?php echo form_close();


/* End of file modificar.php */
/* Location: ./application/views/desktop/logradourotipos/modificar.php */
