<script type="text/javascript" src="js/apply/jquery.modal.acaocategorias.js" ></script>

<?php echo form_open('acaotipos/modificar/'.$tipo->id);?>
<table>
    <tr>
        <td><strong><?php echo form_label('Categoria', 'acaocategoria_id')?></strong></td>
        <td><input type="text" name="categoria_nome" placeholder="ESCOLHER CATEGORIA" size="30" class="escolher-categorias" value="<?php echo $tipo->acaocategoria->nome; ?>" /><?php echo form_error('acaocategoria_id'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Tipo', 'nome');?></strong></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50','size'=>'35'),$tipo->nome);?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Modificar', 'class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<input type="hidden" name="acaocategoria_id" id="acaocategoria_id" value="<?php echo $tipo->acaocategoria_id;?>" />
<input type="hidden" name="id" id="id" value="<?php echo $tipo->id;?>" />

		<div id="modal-categorias" title="Busca por Categorias">
				<input type="text" name="busca-categorias" id="busca-categorias" placeholder="LOCALIZAR POR NOME" size="20" />
                                <table>
                                    <thead>
                                        <tr><th>x</th><th>Categoria</th><th>Ações</th></tr>
                                    </thead>
                                    <tbody id="resultado-categorias">
                                    </tbody>
                                </table>
		</div>

<?php echo form_close();


/* End of file modificar.php */
/* Location: ./application/views/desktop/acaotipos/modificar.php */

