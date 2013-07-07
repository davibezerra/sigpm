<script type="text/javascript" src="js/apply/jquery.modal.unidades.js" ></script>
<script type="text/javascript" src="js/apply/jquery.modal.logradouros.js" ></script>

<?php echo form_open('unidades/modificar/'.$unidade->id);?>
<table>
    <tr>
        <td><strong><?php echo form_label('Cód. Unidade', 'id')?></strong></td>
        <td><?php echo form_input(array('name'=>'id','id'=>'id','size'=>'8'),$unidade->id);?><?php echo form_error('id'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Unidade Pai', 'unidade_nome')?></strong></td>
        <td><input type="text" name="unidade_nome" placeholder="ESCOLHER UNIDADE" size="25" class="escolher-unidades" value="<?php echo $unidade->unidade->descricao; ?>"><?php echo form_error('unidade_id'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Unidade', 'nome')?></strong></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','size'=>'30'),$unidade->nome);?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Descrição', 'descricao')?></strong></td>
        <td><?php echo form_input(array('name'=>'descricao','id'=>'descricao','size'=>'40'),$unidade->descricao);?><?php echo form_error('descricao'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Slogan', 'slogan')?></strong></td>
        <td><?php echo form_input(array('name'=>'slogan','id'=>'slogan','size'=>'45'),$unidade->slogan);?><?php echo form_error('slogan'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Endereço', 'logradouro_nome')?></strong></td>
        <td><input type="text" name="logradouro_nome" placeholder="ESCOLHER LOGRADOURO" size="60" class="escolher-logradouros" value="<?php echo $unidade->logradouro->logradourotipo->nome; ?> <?php echo $unidade->logradouro->nome; ?>"><?php echo form_error('logradouro_id'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Número', 'numero')?></strong></td>
        <td><?php echo form_input(array('name'=>'numero','id'=>'numero','size'=>'10'),$unidade->numero);?><?php echo form_error('numero'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Complemento', 'complemento')?></strong></td>
        <td><?php echo form_input(array('name'=>'complemento','id'=>'complemento','size'=>'30'),$unidade->complemento);?><?php echo form_error('complemento'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Modificar','class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<input type="hidden" name="unidade_id" id="unidade_id" value="<?php echo $unidade->unidade_id; ?>" />
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

<input type="hidden" name="logradouro_id" id="logradouro_id" value="<?php echo $unidade->logradouro_id; ?>" />
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

<input type="hidden" name="id_old" id="id_old" value="<?php echo $unidade->id; ?>" />

<?php echo form_close();



/* End of file cadastrar.php */
/* Location: ./application/views/desktop/unidades/modificar.php */