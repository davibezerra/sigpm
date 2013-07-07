<script type="text/javascript" src="js/apply/jquery.modal.distritos.js" ></script>

<?php echo form_open('bairros/cadastrar');?>
<table>
    <tr>
        <td><strong><?php echo form_label('Distrito', 'distrito_id')?></strong></td>
        <td><input type="text" name="distrito_nome" placeholder="ESCOLHER DISTRITO" size="30" class="escolher-distritos"><?php echo form_error('distrito_id'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Bairro', 'nome')?></strong></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','size'=>'20'),set_value('nome'));?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Cadastrar','class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<input type="hidden" name="distrito_id" id="distrito_id" />
		<div id="modal-distritos" title="Busca por Distritos">
				<input type="text" name="busca-distritos" id="busca-distritos" placeholder="LOCALIZAR POR NOME" size="20" />
                                <table>
                                    <thead>
                                        <tr><th>x</th><th>Distrito</th><th>Município</th><th>Ações</th></tr>
                                    </thead>
                                    <tbody id="resultado-distritos">
                                    </tbody>
                                </table>
		</div>

<?php echo form_close();



/* End of file cadastrar.php */
/* Location: ./application/views/desktop/bairros/cadastrar.php */
