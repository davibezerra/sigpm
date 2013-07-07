<script type="text/javascript" src="js/apply/jquery.modal.municipios.js" ></script>

<?php echo form_open('distritos/modificar');?>
<table>
    <tr>
        <td><strong><?php echo form_label('Município', 'municipio_id')?></strong></td>
        <td><input type="text" name="municipio_nome" placeholder="ESCOLHER MUNICÍPIO" size="30" class="escolher-municipios" value="<?php echo $distrito->municipios->nome; ?>"><?php echo form_error('municipio_id'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Distrito', 'nome')?></strong></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','size'=>'35'),$distrito->nome);?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Modificar','class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<input type="hidden" name="municipio_id" id="municipio_id" value="<?php echo $distrito->municipio_id;?>" />
<input type="hidden" name="id" id="id" value="<?php echo $distrito->id;?>" />

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
