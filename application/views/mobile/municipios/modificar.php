<script type="text/javascript" src="js/lib/jquery.mobile.autocomplete.min.js" ></script>
<script type="text/javascript" src="js/apply/jquery.mobile.autocomplete.estados.js" ></script>

<?php echo form_open('municipios/modificar/'.$municipio->id);?>
<?php echo form_hidden('id', $municipio->id);?>  

<?php echo form_label('Estado', 'estado_id')?>
<input type="search" id="autocomplete" name="estado_nome" placeholder="ESCOLHER ESTADO" value="<?php echo $municipio->estado->nome; ?>"><?php echo form_error('estado_id'); ?>
<ul id="resultados" data-role="listview" data-inset="true"></ul>

<?php echo form_label('Município', 'nome');?>
<?php echo form_input(array('name'=>'nome','id'=>'nome'),$municipio->nome);?><?php echo form_error('nome'); ?>

<?php echo form_submit(NULL,'Modificar','data-inline="true" data-icon="check" data-theme="e"');?>
<a href="#" data-role="button" data-rel="back" data-inline="true" data-icon="back">Voltar</a>

<input type="hidden" name="estado_id" id="estado_id" value="<?php echo $municipio->estado_id;?>" />
<input type="hidden" name="id" id="id" value="<?php echo $municipio->id;?>" />

<?php echo form_close();


/* End of file modificar.php */
/* Location: ./application/views/mobile/municipios/modificar.php */

