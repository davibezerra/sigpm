<?php echo form_open('sistemamodulos/modificar/'.$modulo->id);?>
<?php echo form_hidden('id', $modulo->id);?>  
<table>
    <tr>
        <td><?php echo form_label('Status', 'status');?></td>
        <td><?php echo form_input(array('name'=>'status','id'=>'status','maxlength'=>'2','size'=>'2'),$modulo->status);?><?php echo form_error('status'); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Módulo', 'nome');?></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50','size'=>'27'),$modulo->nome);?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Modificar','class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>
<?php echo form_close();


/* End of file modificar.php */
/* Location: ./application/views/desktop/sistemamodulos/modificar.php */

