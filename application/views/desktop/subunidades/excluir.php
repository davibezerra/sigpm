<script type="text/javascript" src="js/apply/jquery.modal.confirm.js" ></script>

<?php echo form_open('subunidades/excluir'); ?>
<table>
    <tr>
        <td><strong>Cód. Subnidade</strong></td>
        <td><?php echo $subunidade->id;?></td>
    </tr>
    <tr>
        <td><strong>Unidade Pai</strong></td>
        <td><?php echo $subunidade->unidade->nome; ?> / <?php echo $subunidade->unidade->descricao; ?></td>
    </tr>
    <tr>
        <td><strong>Subunidade</strong></td>
        <td><?php echo $subunidade->nome;?></td>
    </tr>
    <tr>
        <td><strong>Descrição</strong></td>
        <td><?php echo $subunidade->descricao;?></td>
    </tr>
    <tr>
        <td><strong>Endereço</strong></td>
        <td><?php echo $subunidade->logradouro->logradourotipo->nome; ?> <?php echo $subunidade->logradouro->nome; ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_button(NULL,'Excluir','id="confirma" class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<div id="dialog-confirm" title="Confirmação de exclusão">
<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>A Subunidade será permanentemente excluída da base de dados. Você tem certeza disso?</p>
</div>

<?php echo form_hidden('id', $subunidade->id);?>  
           
<?php echo form_close();


/* End of file excluir.php */
/* Location: ./application/views/desktop/subunidades/excluir.php */