<?php echo form_open('estados/modificar/'.$uf->id);?>
<?php echo form_hidden('id', $uf->id);?>  

<?php echo form_label('Estado', 'nome');?>
<?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50','size'=>'27'),$uf->nome);?><?php echo form_error('nome'); ?>

<?php echo form_label('Sigla', 'sigla');?>
<?php echo form_input(array('name'=>'sigla','id'=>'sigla','maxlength'=>'2','size'=>'2'),$uf->sigla);?><?php echo form_error('sigla'); ?>

<?php echo form_submit(NULL,'Modificar','data-inline="true" data-icon="check" data-theme="e"');?>
<a href="#" data-role="button" data-rel="back" data-inline="true" data-icon="back">Voltar</a>
<?php echo form_close();


/* End of file modificar.php */
/* Location: ./application/views/mobile/estados/modificar.php */

