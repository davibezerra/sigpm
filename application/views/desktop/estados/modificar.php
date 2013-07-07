<?php echo form_open('estados/modificar/'.$uf->id.'/'.$uf->sigla);?>
<?php echo form_hidden('id', $uf->id);?>  
<table>
    <tr>
        <td><?php echo form_label('Estado', 'nome');?></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50','size'=>'27'),$uf->nome);?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Sigla', 'sigla');?></td>
        <td><?php echo form_input(array('name'=>'sigla','id'=>'sigla','maxlength'=>'2','size'=>'2'),$uf->sigla);?><?php echo form_error('sigla'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Modificar', 'class="botao"');?><a href="javascript:history.back()" class="botao">voltar</a></td>
    </tr>
</table>
<?php echo form_close();


/* End of file modificar.php */
/* Location: ./application/views/desktop/estados/modificar.php */

