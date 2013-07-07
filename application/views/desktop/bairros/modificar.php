<script type="text/javascript" src="js/apply/jquery.modal.distritos.js" ></script>

<?php echo form_open('bairros/modificar');?>
<table>
    <tr>
        <td><strong><?php echo form_label('Distrito', 'distrito_id')?></strong></td>
        <td><input type="text" name="bairro_nome" placeholder="ESCOLHER BAIRRO" size="30" class="escolher-distritos" value="<?php echo $bairro->distrito->municipio->nome; ?> / <?php echo $bairro->distrito->nome; ?>"><?php echo form_error('bairro_id'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Bairro', 'nome')?></strong></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','size'=>'35'),$bairro->nome);?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Modificar','class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<input type="hidden" name="distrito_id" id="distrito_id" value="<?php echo $bairro->distrito_id;?>" />
<input type="hidden" name="id" id="id" value="<?php echo $bairro->id;?>" />

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


/* End of file modificar.php */
/* Location: ./application/views/desktop/bairros/modificar.php */
