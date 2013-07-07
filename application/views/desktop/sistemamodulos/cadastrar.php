<?php echo form_open('sistemamodulos/cadastrar');?>
<table>
    <tr>
        <td><strong><?php echo form_label('Status', 'nome');?></strong></td>
        <td><?php echo form_input(array('name'=>'status','id'=>'status','maxlength'=>'3','size'=>'3'),set_value('status'));?><?php echo form_error('status'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Módulo', 'nome');?></strong></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50','size'=>'27'),set_value('nome'));?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Cadastrar','class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<?php echo form_close();



/* End of file cadastrar.php */
/* Location: ./application/views/desktop/sistemamodulos/cadastrar.php */
