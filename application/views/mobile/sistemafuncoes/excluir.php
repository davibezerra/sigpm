<script type="text/javascript" src="js/apply/jquery.modal.confirm.js" ></script>

<?php echo form_open('sistemafuncoes/excluir'); ?>
<table>
    <tr>
        <td><strong>Status</strong></td>
        <td><?php echo $funcao->status;?></td>
    </tr>
    <tr>
        <td><strong>Menu</strong></td>
        <td><?php echo $funcao->menu;?></td>
    </tr>
    <tr>
        <td><strong>Categoria</strong></td>
        <td><?php echo $funcao->sistemacategoria->nome;?></td>
    </tr>
    <tr>
        <td><strong>Classe</strong></td>
        <td><?php echo $funcao->classe;?></td>
    </tr>
    <tr>
        <td><strong>Método</strong></td>
        <td><?php echo $funcao->metodo;?></td>
    </tr>
    <tr>
        <td><strong>Função</strong></td>
        <td><?php echo $funcao->nome;?></td>
    </tr>
    <tr>
        <td><strong>Descrição</strong></td>
        <td><?php echo $funcao->descricao;?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_button(NULL,'excluir','id="confirma" class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<div id="dialog-confirm" title="Confirmação de exclusão">
<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>A funcionalidade será permanentemente excluído da base de dados. Você tem certeza disso?</p>
</div>

<?php echo form_hidden('id', $funcao->id);?>  
           
<?php echo form_close();


/* End of file excluir.php */
/* Location: ./application/views/desktop/sistemafuncoes/excluir.php */

