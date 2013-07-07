<script type="text/javascript" src="js/apply/jquery.modal.unidades.js" ></script>
<script type="text/javascript" src="js/apply/jquery.modal.logradouros.js" ></script>

<?php echo form_open('subunidades/modificar/'.$subunidade->id);?>
<table>
    <tr>
        <td><strong><?php echo form_label('Cód. Subunidade', 'id')?></strong></td>
        <td><?php echo form_input(array('name'=>'id','id'=>'id','size'=>'8'),$subunidade->id);?><?php echo form_error('id'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Unidade Pai', 'unidade_nome')?></strong></td>
        <td><input type="text" name="unidade_nome" placeholder="ESCOLHER UNIDADE" size="30" class="escolher-unidades" value="<?php echo $subunidade->unidade->nome; ?> / <?php echo $subunidade->unidade->descricao; ?>"><?php echo form_error('unidade_id'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Subunidade', 'nome')?></strong></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','size'=>'35'),$subunidade->nome);?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Descrição', 'descricao')?></strong></td>
        <td><?php echo form_input(array('name'=>'descricao','id'=>'descricao','size'=>'45'),$subunidade->descricao);?><?php echo form_error('descricao'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Endereço', 'logradouro_nome')?></strong></td>
        <td><input type="text" name="logradouro_nome" placeholder="ESCOLHER LOGRADOURO" size="60" class="escolher-logradouros" value="<?php echo $subunidade->logradouro->logradourotipo->nome; ?> <?php echo $subunidade->logradouro->nome; ?>"><?php echo form_error('logradouro_id'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Modificar','class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<input type="hidden" name="unidade_id" id="unidade_id" value="<?php echo $subunidade->unidade_id; ?>" />
		<div id="modal-unidades" title="Busca por Unidades">
				<input type="text" name="busca-unidades" id="busca-unidades" placeholder="LOCALIZAR POR NOME" size="20" />
                                <table>
                                    <thead>
                                        <tr><th>x</th><th>Unidade</th><th>Local</th><th>Ações</th></tr>
                                    </thead>
                                    <tbody id="resultado-unidades">
                                    </tbody>
                                </table>
		</div>

<input type="hidden" name="logradouro_id" id="logradouro_id" value="<?php echo $subunidade->logradouro_id; ?>" />
		<div id="modal-logradouros" title="Busca por Logradouros">
				<input type="text" name="busca-logradouros" id="busca-logradouros" placeholder="LOCALIZAR POR NOME" size="20" />
                                <table>
                                    <thead>
                                        <tr><th>x</th><th>Logradouro</th><th>Local</th><th>Ações</th></tr>
                                    </thead>
                                    <tbody id="resultado-logradouros">
                                    </tbody>
                                </table>
		</div>

<input type="hidden" name="id_old" id="id_old" value="<?php echo $subunidade->id; ?>" />


<?php echo form_close();



/* End of file modificar.php */
/* Location: ./application/views/desktop/subunidades/modificar.php */