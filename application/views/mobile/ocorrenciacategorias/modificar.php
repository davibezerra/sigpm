<?php echo form_open('ocorrenciacategorias/modificar/'.$categoria->id);?>
<?php echo form_hidden('id', $categoria->id);?>  

<?php echo form_label('Categoria', 'nome');?>
<?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50','size'=>'27'),$categoria->nome);?><?php echo form_error('nome'); ?></td>

<?php echo form_submit(NULL,'Modificar','data-inline="true" data-icon="check" data-theme="b"');?>
<a href="#" data-role="button" data-inline="true" data-icon="back" data-theme="e" data-rel="back">Voltar</a>
<?php echo form_close();


/* End of file modificar.php */
/* Location: ./application/views/mobile/ocorrenciacategorias/modificar.php */

