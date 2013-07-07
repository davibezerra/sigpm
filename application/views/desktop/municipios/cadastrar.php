<?php echo form_open('municipios/cadastrar');?>
<table>
    <tr>
        <td><strong><?php echo form_label('Estado', 'estado_id')?></strong></td>
        <td><input type="text" name="estado_nome" placeholder="ESCOLHER ESTADO" size="30" class="escolher-estados" value="<?php echo set_value('estado_nome'); ?>" /><?php echo form_error('estado_id'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Município', 'nome');?></strong></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50','size'=>'27'),set_value('nome'));?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Cadastrar', 'class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<input type="hidden" name="estado_id" id="estado_id" />

		<div id="modal-estados" title="Busca por Estados">
				<input type="text" name="busca-estados" id="busca-estados" placeholder="LOCALIZAR POR NOME" size="20" />
                                <table>
                                    <thead>
                                        <tr><th>x</th><th>Estado</th><th>Ações</th></tr>
                                    </thead>
                                    <tbody id="resultado-estados">
                                    </tbody>
                                </table>
		</div>

<script type="text/javascript" src="js/apply/jquery.modal.estados.js" ></script>

<?php echo form_close();

/* End of file cadastrar.php */
/* Location: ./application/views/desktop/municipios/cadastrar.php */
