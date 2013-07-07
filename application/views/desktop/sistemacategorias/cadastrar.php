<script type="text/javascript" src="js/apply/jquery.modal.sistemamodulos.js" ></script>

<?php echo form_open('sistemacategorias/cadastrar');?>
<table>
    <tr>
        <td><strong><?php echo form_label('Status', 'nome');?></strong></td>
        <td><?php echo form_input(array('name'=>'status','id'=>'status','maxlength'=>'3','size'=>'3'),set_value('status'));?><?php echo form_error('status'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Módulo', 'sistemamodulo_id')?></strong></td>
        <td><input type="text" name="modulo_nome" placeholder="ESCOLHER MÓDULO" size="20" class="escolher-modulos"><?php echo form_error('sistemamodulo_id'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Categoria', 'nome');?></strong></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50','size'=>'27'),set_value('nome'));?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Cadastrar','class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<input type="hidden" name="sistemamodulo_id" id="sistemamodulo_id" />
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

<?php echo form_close();



/* End of file cadastrar.php */
/* Location: ./application/views/desktop/sistemacategorias/cadastrar.php */
