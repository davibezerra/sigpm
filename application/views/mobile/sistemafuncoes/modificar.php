<script type="text/javascript" src="js/apply/jquery.modal.sistemacategorias.js" ></script>

<?php echo form_open('sistemafuncoes/modificar/'.$funcao->id);?>

<table>
    <tr>
        <td><?php echo form_label('Status', 'status');?></td>
        <td><?php echo form_input(array('name'=>'status','id'=>'status','maxlength'=>'2','size'=>'2'),$funcao->status);?><?php echo form_error('status'); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Menu', 'menu');?></td>
        <td><?php echo form_input(array('name'=>'menu','id'=>'menu','maxlength'=>'2','size'=>'2'),$funcao->menu);?><?php echo form_error('menu'); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Categoria', 'sistemacategoria_id')?></td>
        <td><input type="text" name="categoria_nome" placeholder="ESCOLHER CATEGORIA" size="20" class="escolher-categorias" value="<?php echo $funcao->sistemacategoria->nome; ?>" /><?php echo form_error('sistemacategoria_id'); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Classe', 'classe');?></td>
        <td><?php echo form_input(array('name'=>'classe','id'=>'classe','maxlength'=>'50','size'=>'27'),$funcao->classe);?><?php echo form_error('classe'); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Método', 'metodo');?></td>
        <td><?php echo form_input(array('name'=>'metodo','id'=>'metodo','maxlength'=>'50','size'=>'27'),$funcao->metodo);?><?php echo form_error('metodo'); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Função', 'nome');?></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50','size'=>'27'),$funcao->nome);?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Descrição', 'descricao');?></td>
        <td><?php echo form_input(array('name'=>'descricao','id'=>'descricao','maxlength'=>'100','size'=>'50'),$funcao->descricao);?><?php echo form_error('descricao'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Modificar','class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<input type="hidden" name="sistemacategoria_id" id="sistemacategoria_id" value="<?php echo $funcao->sistemacategoria_id;?>" />
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
    
<input type="hidden" name="id" id="id" value="<?php echo $funcao->id;?>" />

<?php echo form_close();


/* End of file modificar.php */
/* Location: ./application/views/desktop/sistemafuncoes/modificar.php */

