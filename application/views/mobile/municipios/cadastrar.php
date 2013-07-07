<script type="text/javascript" src="js/lib/jquery.mobile.autocomplete.min.js" ></script>
<script type="text/javascript" src="js/apply/jquery.mobile.autocomplete.estados.js" ></script>

<?php echo form_open('municipios/cadastrar','data-ajax="false"');?>

<?php echo form_label('Estado', 'estado_id')?>
<input type="text" id="autocomplete" name="estado_nome" value="<?php echo set_value('estado_nome'); ?>" /><?php echo form_error('estado_id'); ?>
<ul id="resultados" data-role="listview" data-inset="true"></ul>

<?php echo form_label('Município', 'nome');?>
<?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50','size'=>'27'),set_value('nome'));?><?php echo form_error('nome'); ?>

<?php echo form_submit(NULL,'Cadastrar','data-inline="true" data-icon="check" data-theme="e"');?>
<a href="javascript:history.back()" data-role="button" data-inline="true" data-icon="back">Voltar</a>

<input type="hidden" name="estado_id" id="estado_id" />


<?php echo form_close();

/* End of file cadastrar.php */
/* Location: ./application/views/mobile/municipios/cadastrar.php */
