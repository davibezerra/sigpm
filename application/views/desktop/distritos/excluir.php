<script type="text/javascript" src="js/apply/jquery.modal.confirm.js" ></script>

<?php echo form_open('distritos/excluir'); ?>
<table>
    <tr>
        <td><strong>Município</strong></td>
        <td><?php echo $distrito->municipios->nome;?>/<?php echo $distrito->municipios->estados->sigla;?></td>
    </tr>
    <tr>
        <td><strong>Distrito</strong></td>
        <td><?php echo $distrito->nome;?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_button(NULL,'Excluir','id="confirma" class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<div id="dialog-confirm" title="Confirmação de exclusão">
<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>O distrito será permanentemente excluído da base de dados. Você tem certeza disso?</p>
</div>

<?php echo form_hidden('id', $distrito->id);?>  
           
<?php echo form_close();


/* End of file excluir.php */
/* Location: ./application/views/desktop/distritos/excluir.php */

