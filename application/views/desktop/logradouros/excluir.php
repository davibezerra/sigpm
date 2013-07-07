<script type="text/javascript" src="js/apply/jquery.modal.confirm.js" ></script>

<?php echo form_open('logradouros/excluir'); ?>
<table>
    <tr>
        <td><strong>Município</strong></td>
        <td><?php echo $logradouro->bairro->distrito->municipio->nome;?>/<?php echo $logradouro->bairro->distrito->municipio->estado->sigla;?></td>
    </tr>
    <tr>
        <td><strong>Distrito</strong></td>
        <td><?php echo $logradouro->bairro->distrito->nome;?></td>
    </tr>
    <tr>
        <td><strong>Bairro</strong></td>
        <td><?php echo $logradouro->bairro->nome;?></td>
    </tr>
    <tr>
        <td><strong>Subunidade</strong></td>
        <td><?php echo $logradouro->subunidade->nome;?></td>
    </tr>
    <tr>
        <td><strong>Logradouro</strong></td>
        <td><strong><?php echo $logradouro->logradourotipo->nome;?> <?php echo $logradouro->nome;?></strong></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_button(NULL,'Excluir','id="confirma" class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<div id="dialog-confirm" title="Confirmação de exclusão">
<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>O bairro será permanentemente excluído da base de dados. Você tem certeza disso?</p>
</div>

<?php echo form_hidden('id', $logradouro->id);?>  
           
<?php echo form_close();


/* End of file excluir.php */
/* Location: ./application/views/desktop/logradouros/excluir.php */

