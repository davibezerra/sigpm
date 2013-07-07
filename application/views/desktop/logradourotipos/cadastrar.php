<?php echo form_open('logradourotipos/cadastrar');?>
<table>
    <tr>
        <td><strong><?php echo form_label('Tipo', 'nome')?></strong></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','size'=>'20'),set_value('nome'));?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Cadastrar');?><a href="javascript:history.back()">Voltar</a></td>
    </tr>
</table>

<?php echo form_close();


/* End of file cadastrar.php */
/* Location: ./application/views/desktop/logradourotipos/cadastrar.php */
