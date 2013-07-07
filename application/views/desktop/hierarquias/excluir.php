<script type="text/javascript" src="js/apply/jquery.modal.confirm.js" ></script>

<?php echo form_open('hierarquias/excluir'); ?>
<table>
    <tr>
        <td><strong>Cód.</strong></td>
        <td><?php echo $hierarquia->id;?></td>
    </tr>
    <tr>
        <td><strong>Posto/Grad</strong></td>
        <td><?php echo $hierarquia->nome;?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_button(NULL,'Excluir','id="confirma" class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<div id="dialog-confirm" title="Confirmação de exclusão">
<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>O posto/graduação será permanentemente excluído da base de dados. Você tem certeza disso?</p>
</div>

<?php echo form_hidden('id', $hierarquia->id);?>  
<?php echo form_hidden('sigla', $hierarquia->sigla);?>  
           
<?php echo form_close();


/* End of file excluir.php */
/* Location: ./application/views/desktop/hierarquias/excluir.php */

