<?php echo form_open('ocorrenciacategorias/cadastrar');?>

<?php echo form_label('Categoria', 'nome');?>
<?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50','size'=>'27'),set_value('nome'));?><?php echo form_error('nome'); ?>

<?php echo form_submit(NULL,'Cadastrar','data-inline="true" data-icon="check" data-theme="b"');?>
<a href="javascript:history.back()" data-role="button" data-inline="true" data-icon="back" data-theme="e">Voltar</a>

<?php echo form_close();

/* End of file cadastrar.php */
/* Location: ./application/views/desktop/ocorrenciacategorias/cadastrar.php */
