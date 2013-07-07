<script type="text/javascript" src="js/apply/jquery.modal.sistemacategorias.js" ></script>

<?php echo form_open('sistemafuncoes/cadastrar');?>
<table>
    <tr>
        <td><strong><?php echo form_label('Status', 'nome');?></strong></td>
        <td><?php echo form_input(array('name'=>'status','id'=>'status','maxlength'=>'3','size'=>'3'),set_value('status'));?><?php echo form_error('status'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Menu', 'menu');?></strong></td>
        <td><?php echo form_input(array('name'=>'menu','id'=>'menu','maxlength'=>'3','size'=>'3'),set_value('menu'));?><?php echo form_error('menu'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Categoria', 'sistemacategoria_id')?></strong></td>
        <td><input type="text" name="categoria_nome" placeholder="ESCOLHER CATEGORIA" size="20" class="escolher-categorias"><?php echo form_error('sistemacategoria_id'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Classe', 'classe');?></strong></td>
        <td><?php echo form_input(array('name'=>'classe','id'=>'classe','maxlength'=>'50','size'=>'27'),set_value('classe'));?><?php echo form_error('classe'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Método', 'metodo');?></strong></td>
        <td><?php echo form_input(array('name'=>'metodo','id'=>'metodo','maxlength'=>'50','size'=>'27'),set_value('metodo'));?><?php echo form_error('metodo'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Função', 'nome');?></strong></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50','size'=>'27'),set_value('nome'));?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Descrição', 'descricao');?></strong></td>
        <td><?php echo form_input(array('name'=>'descricao','id'=>'descricao','maxlength'=>'100','size'=>'50'),set_value('descricao'));?><?php echo form_error('descricao'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Cadastrar','class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<input type="hidden" name="sistemacategoria_id" id="sistemacategoria_id" />
		<div id="modal-categorias" title="Busca por Categorias">
				<input type="text" name="busca-categorias" id="busca-categorias" placeholder="LOCALIZAR POR NOME" size="20" />
                                <table>
                                    <thead>
                                        <tr><th>x</th><th>Categoria</th><th>Módulo</th><th>Ações</th></tr>
                                    </thead>
                                    <tbody id="resultado-categorias">
                                    </tbody>
                                </table>
		</div>

<?php echo form_close();



/* End of file cadastrar.php */
/* Location: ./application/views/desktop/sistemafuncoes/cadastrar.php */
