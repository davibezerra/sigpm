<script type="text/javascript" src="js/apply/jquery.modal.logradourotipos.js" ></script>
<script type="text/javascript" src="js/apply/jquery.modal.bairros.js" ></script>
<script type="text/javascript" src="js/apply/jquery.modal.subunidades.js" ></script>

<?php echo form_open('logradouros/modificar');?>
<table>
    <tr>
        <td><strong><?php echo form_label('Tipo', 'logradourotipo_id')?></strong></td>
        <td><input type="text" name="logradourotipo_nome" placeholder="ESCOLHER TIPO" size="20" class="escolher-tipos" value="<?php echo $logradouro->logradourotipo->nome; ?>" /><?php echo form_error('logradourotipo_id'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Logradouro', 'nome')?></strong></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','size'=>'40'),$logradouro->nome);?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Bairro', 'bairro_id')?></strong></td>
        <td><input type="text" name="bairro_nome" placeholder="ESCOLHER BAIRRO" size="30" class="escolher-bairros" value="<?php echo $logradouro->bairro->distrito->nome; ?> / <?php echo $logradouro->bairro->nome; ?>"><?php echo form_error('bairro_id'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Subunidade', 'subunidade_id')?></strong></td>
        <td><input type="text" name="subunidade_nome" placeholder="ESCOLHER SUBUNIDADE" size="35" class="escolher-subunidades" value="<?php echo $logradouro->subunidade->nome; ?>"><?php echo form_error('subunidade_id'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Modificar','class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<input type="hidden" name="logradourotipo_id" id="logradourotipo_id" value="<?php echo $logradouro->logradourotipo_id;?>" />
		<div id="modal-tipos" title="Busca por Tipos">
				<input type="text" name="busca-tipos" id="busca-tipos" placeholder="LOCALIZAR POR NOME" size="20" />
                                <table>
                                    <thead>
                                        <tr><th>x</th><th>Tipo</th><th>Ações</th></tr>
                                    </thead>
                                    <tbody id="resultado-tipos">
                                    </tbody>
                                </table>
		</div>

<input type="hidden" name="bairro_id" id="bairro_id" value="<?php echo $logradouro->bairro_id;?>" />
		<div id="modal-bairros" title="Busca por Bairros">
				<input type="text" name="busca-bairros" id="busca-bairros" placeholder="LOCALIZAR POR NOME" size="20" />
                                <table>
                                    <thead>
                                        <tr><th>x</th><th>Bairro</th><th>Distrito</th><th>Ações</th></tr>
                                    </thead>
                                    <tbody id="resultado-bairros">
                                    </tbody>
                                </table>
		</div>

<input type="hidden" name="subunidade_id" id="subunidade_id" value="<?php echo $logradouro->subunidade_id;?>" />
		<div id="modal-subunidades" title="Busca por Subunidades">
				<input type="text" name="busca-subunidades" id="busca-subunidades" placeholder="LOCALIZAR POR NOME" size="20" />
                                <table>
                                    <thead>
                                        <tr><th>x</th><th>Subunidade/th><th>Unidade</th><th>Ações</th></tr>
                                    </thead>
                                    <tbody id="resultado-subunidades">
                                    </tbody>
                                </table>
		</div>

<input type="hidden" name="id" id="id" value="<?php echo $logradouro->id;?>" />

<?php echo form_close();


/* End of file modificar.php */
/* Location: ./application/views/desktop/logradouros/modificar.php */
