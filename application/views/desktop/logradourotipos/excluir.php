<script type="text/javascript" src="js/apply/jquery.modal.confirm.js" ></script>

<?php echo form_open('logradourotipos/excluir'); ?>
<table>
    <tr>
        <td><strong>Tipo</strong></td>
        <td><?php echo $tipo->nome;?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_button(NULL,'excluir','id="confirma"');?><a href="javascript:history.back()">voltar</a></td>
    </tr>
</table>

<div id="dialog-confirm" title="Confirmação de exclusão">
<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>O tipo de logradouro será permanentemente excluído da base de dados. Você tem certeza disso?</p>
</div>

<?php echo form_hidden('id', $tipo->id);?>  
           
<?php echo form_close();


/* End of file excluir.php */
/* Location: ./application/views/desktop/bairros/excluir.php */

