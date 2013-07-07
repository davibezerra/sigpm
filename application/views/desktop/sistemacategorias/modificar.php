<script type="text/javascript" src="js/apply/jquery.modal.sistemamodulos.js" ></script>

<?php echo form_open('sistemacategorias/modificar/'.$categoria->id);?>

<table>
    <tr>
        <td><?php echo form_label('Status', 'status');?></td>
        <td><?php echo form_input(array('name'=>'status','id'=>'status','maxlength'=>'2','size'=>'2'),$categoria->status);?><?php echo form_error('status'); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Módulo', 'sistemamodulo_id')?></td>
        <td><input type="text" name="modulo_nome" placeholder="ESCOLHER MÓDULO" size="20" class="escolher-modulos" value="<?php echo $categoria->sistemamodulo->nome; ?>" /><?php echo form_error('sistemamodulo_id'); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Categoria', 'nome');?></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50','size'=>'27'),$categoria->nome);?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Modificar','class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<input type="hidden" name="sistemamodulo_id" id="sistemamodulo_id" value="<?php echo $categoria->sistemamodulo_id;?>" />
		<div id="modal-modulos" title="Busca por Módulos">
				<input type="text" name="busca-modulos" id="busca-modulos" placeholder="LOCALIZAR POR NOME" size="20" />
                                <table>
                                    <thead>
                                        <tr><th>x</th><th>Módulo</th><th>Ações</th></tr>
                                    </thead>
                                    <tbody id="resultado-modulos">
                                    </tbody>
                                </table>
		</div>
    
<input type="hidden" name="id" id="id" value="<?php echo $categoria->id;?>" />

<?php echo form_close();


/* End of file modificar.php */
/* Location: ./application/views/desktop/sistemacategorias/modificar.php */

