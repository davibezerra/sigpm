<script type="text/javascript" src="js/apply/jquery.modal.confirm.js" ></script>

<?php echo form_open('operacoes/excluir'); ?>
<table>
    <tr>
        <td><strong>Status</strong></td>
        <td><?php echo $operacao->status;?></td>
    </tr>
    <tr>
        <td><strong>Operação</strong></td>
        <td><?php echo $operacao->nome;?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_button(NULL,'excluir','id="confirma" class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<div id="dialog-confirm" title="Confirmação de exclusão">
<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>A operação será permanentemente excluído da base de dados. Você tem certeza disso?</p>
</div>

<?php echo form_hidden('id', $operacao->id);?>  
           
<?php echo form_close();


/* End of file excluir.php */
/* Location: ./application/views/desktop/operacoes/excluir.php */

