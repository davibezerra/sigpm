<?php echo form_open('municipios/excluir'); ?>
<table>
    <tr>
        <td><strong>Estado</strong></td>
        <td><?php echo $municipio->estados->nome;?>/<?php echo $municipio->estados->sigla;?></td>
    </tr>
    <tr>
        <td><strong>Município</strong></td>
        <td><?php echo $municipio->nome;?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_button(NULL,'Excluir','id="confirma" class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<div id="dialog-confirm" title="Confirmação de exclusão">
<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>O município será permanentemente excluído da base de dados. Você tem certeza disso?</p>
</div>

<script type="text/javascript" src="js/apply/jquery.modal.confirm.js" ></script>

<?php echo form_hidden('id', $municipio->id);?>  
<?php echo form_hidden('sigla', $municipio->estados->sigla);?>  
           
<?php echo form_close();


/* End of file excluir.php */
/* Location: ./application/views/desktop/municipios/excluir.php */

