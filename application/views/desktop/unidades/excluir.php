<script type="text/javascript" src="js/apply/jquery.modal.confirm.js" ></script>

<?php echo form_open('unidades/excluir'); ?>
<table>
    <tr>
        <td><strong>Cód. Unidade</strong></td>
        <td><?php echo $unidade->id;?></td>
    </tr>
    <tr>
        <td><strong>Unidade Pai</strong></td>
        <td><?php echo $unidade->pai->nome; ?></td>
    </tr>
    <tr>
        <td><strong>Unidade</strong></td>
        <td><?php echo $unidade->nome;?></td>
    </tr>
    <tr>
        <td><strong>Descrição</strong></td>
        <td><?php echo $unidade->descricao;?></td>
    </tr>
    <tr>
        <td><strong>Slogan</strong></td>
        <td><?php echo $unidade->slogan;?></td>
    </tr>
    <tr>
        <td><strong>Endereço</strong></td>
        <td><?php echo $unidade->logradouro->logradourotipo->nome; ?> <?php echo $unidade->logradouro->nome; ?></td>
    </tr>
    <tr>
        <td><strong>Número</strong></td>
        <td><?php echo $unidade->numero;?></td>
    </tr>
    <tr>
        <td><strong>Complemento</strong></td>
        <td><?php echo $unidade->complemento;?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_button(NULL,'Excluir','id="confirma" class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<div id="dialog-confirm" title="Confirmação de exclusão">
<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>A Unidade será permanentemente excluída da base de dados. Você tem certeza disso?</p>
</div>

<?php echo form_hidden('id', $unidade->id);?>  
           
<?php echo form_close();


/* End of file excluir.php */
/* Location: ./application/views/desktop/unidades/excluir.php */