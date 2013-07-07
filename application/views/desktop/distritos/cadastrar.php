<script type="text/javascript" src="js/apply/jquery.modal.municipios.js" ></script>

<?php echo form_open('distritos/cadastrar');?>
<table>
    <tr>
        <td><strong><?php echo form_label('Município', 'municipio_id')?></strong></td>
        <td><input type="text" name="municipio_nome" placeholder="ESCOLHER MUNICÍPIO" size="30" class="escolher-municipios"><?php echo form_error('municipio_id'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Distrito', 'nome')?></strong></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','size'=>'20'),set_value('nome'));?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Cadastrar','class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<input type="hidden" name="municipio_id" id="municipio_id" />
		<div id="modal-municipios" title="Busca por Municípios">
				<input type="text" name="busca-municipios" id="busca-municipios" placeholder="LOCALIZAR POR NOME" size="20" />
                                <table>
                                    <thead>
                                        <tr><th>x</th><th>Município</th><th>Ações</th></tr>
                                    </thead>
                                    <tbody id="resultado-municipios">
                                    </tbody>
                                </table>
		</div>

<?php echo form_close();



/* End of file cadastrar.php */
/* Location: ./application/views/desktop/distritos/cadastrar.php */
