<?php echo form_open('hierarquias/cadastrar');?>
<table>
    <tr>
        <td><strong><?php echo form_label('Código', 'id');?></strong></td>
        <td><?php echo form_input(array('name'=>'id','id'=>'id','maxlength'=>'5','size'=>'4'),set_value('id'));?><?php echo form_error('id'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Posto/Grad', 'nome');?></strong></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50','size'=>'27'),set_value('nome'));?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Cadastrar', 'class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<?php echo form_close();



/* End of file cadastrar.php */
/* Location: ./application/views/desktop/hierarquias/cadastrar.php */
