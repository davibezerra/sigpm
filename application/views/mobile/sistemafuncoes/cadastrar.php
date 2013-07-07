<script type="text/javascript" src="js/apply/jquery.modal.sistemacategorias.js" ></script>

<?php echo form_open('sistemafuncoes/cadastrar','data-ajax="false"');?>
<?php echo form_label('Status', 'nome');?>
<select name="status" id="status" data-role="slider"><option value="0">Off</option><option value="1">On</option></select>

<?php echo form_label('Menu', 'menu');?>
<select name="menu" id="menu" data-role="slider"><option value="0">Off</option><option value="1">On</option></select>

<?php echo form_label('Categoria', 'sistemacategoria_id')?>
<input type="text" name="categoria_nome" placeholder="ESCOLHER CATEGORIA" size="20" class="escolher-categorias"><?php echo form_error('sistemacategoria_id'); ?>

<?php echo form_label('Classe', 'classe');?>
<?php echo form_input(array('name'=>'classe','id'=>'classe','maxlength'=>'50','size'=>'27'),set_value('classe'));?><?php echo form_error('classe'); ?>

<?php echo form_label('Método', 'metodo');?>
<?php echo form_input(array('name'=>'metodo','id'=>'metodo','maxlength'=>'50','size'=>'27'),set_value('metodo'));?><?php echo form_error('metodo'); ?>

<?php echo form_label('Função', 'nome');?>
<?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50','size'=>'27'),set_value('nome'));?><?php echo form_error('nome'); ?>

<?php echo form_label('Descrição', 'descricao');?>
<?php echo form_input(array('name'=>'descricao','id'=>'descricao','maxlength'=>'100','size'=>'50'),set_value('descricao'));?><?php echo form_error('descricao'); ?>

<?php echo form_submit(NULL,'Cadastrar','data-inline="true" data-icon="check" data-theme="e"');?>
<a href="javascript:history.back()" data-role="button" data-inline="true" data-icon="back">Voltar</a>

<?php echo form_close();



/* End of file cadastrar.php */
/* Location: ./application/views/mobile/sistemafuncoes/cadastrar.php */
