<?php echo form_open('operacoes/modificar/'.$operacao->id);?>

<table>
    <tr>
        <td><?php echo form_label('Status', 'status');?></td>
        <td><?php echo form_input(array('name'=>'status','id'=>'status','maxlength'=>'2','size'=>'2'),$operacao->status);?><?php echo form_error('status'); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Operação', 'nome');?></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50','size'=>'27'),$operacao->nome);?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Modificar','class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>
    
<input type="hidden" name="id" id="id" value="<?php echo $operacao->id;?>" />

<?php echo form_close();


/* End of file modificar.php */
/* Location: ./application/views/desktop/operacoes/modificar.php */

