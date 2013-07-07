<script type="text/javascript" src="js/apply/jquery.modal.unidades.js" ></script>

<?php echo form_open('sistemagrupos/modificar/'.$grupo->id);?>
<table>
    <tr>
        <td><strong><?php echo form_label('Grupo', 'nome')?></strong></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','size'=>'35'),$grupo->nome);?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td><strong><?php echo form_label('Unidade', 'unidade_nome')?></strong></td>
        <td><input type="text" name="unidade_nome" placeholder="ESCOLHER UNIDADE" size="30" class="escolher-unidades" value="<?php echo $grupo->unidade->nome; ?> / <?php echo $grupo->unidade->descricao; ?>"><?php echo form_error('unidade_id'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Modificar','class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<input type="hidden" name="unidade_id" id="unidade_id" value="<?php echo $grupo->unidade_id; ?>" />
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

<input type="hidden" name="id" id="id" value="<?php echo $grupo->id; ?>" />


<?php echo form_close();



/* End of file modificar.php */
/* Location: ./application/views/desktop/sistemagrupos/modificar.php */