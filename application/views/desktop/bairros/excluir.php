<script type="text/javascript" src="js/apply/jquery.modal.confirm.js" ></script>

<?php echo form_open('bairros/excluir'); ?>
<table>
    <tr>
        <td><strong>Distrito</strong></td>
        <td><?php echo $bairro->distrito->municipio->nome;?> / <?php echo $bairro->distrito->nome;?>/</td>
    </tr>
    <tr>
        <td><strong>Bairro</strong></td>
        <td><?php echo $bairro->nome;?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_button(NULL,'Excluir','id="confirma" class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<div id="dialog-confirm" title="Confirmação de exclusão">
<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>O bairro será permanentemente excluído da base de dados. Você tem certeza disso?</p>
</div>

<?php echo form_hidden('id', $bairro->id);?>  
           
<?php echo form_close();


/* End of file excluir.php */
/* Location: ./application/views/desktop/bairros/excluir.php */

