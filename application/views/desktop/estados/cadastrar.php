<?php echo form_open('estados/cadastrar');?>
<table>
    <tr>
        <td><strong><?php echo form_label('Estado', 'nome');?></strong></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50','size'=>'27'),set_value('nome'));?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Sigla', 'sigla')?></strong></td>
        <td><?php echo form_input(array('name'=>'sigla','id'=>'sigla','maxlength'=>'2','size'=>'2'),set_value('sigla'));?><?php echo form_error('sigla'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Cadastrar', 'class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<?php echo form_close();



/* End of file cadastrar.php */
/* Location: ./application/views/desktop/estados/cadastrar.php */
