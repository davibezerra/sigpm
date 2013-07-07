<?php echo form_open('estados/cadastrar');?>

<?php echo form_label('Estado', 'nome');?>
<?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50'),set_value('nome'));?><?php echo form_error('nome'); ?>

<?php echo form_label('Sigla', 'sigla')?>
<?php echo form_input(array('name'=>'sigla','id'=>'sigla','maxlength'=>'2'),set_value('sigla'));?><?php echo form_error('sigla'); ?>

<?php echo form_submit(NULL,'Cadastrar','data-inline="true" data-icon="check" data-theme="e"');?>
<a href="javascript:history.back()" data-role="button" data-inline="true" data-icon="back">Voltar</a>

<?php echo form_close();



/* End of file cadastrar.php */
/* Location: ./application/views/mobile/estados/cadastrar.php */
