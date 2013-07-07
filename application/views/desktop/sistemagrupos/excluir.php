<script type="text/javascript" src="js/apply/jquery.modal.confirm.js" ></script>

<?php echo form_open('sistemagrupos/excluir'); ?>
<table>
    <tr>
        <td><strong>Cód. Grupo</strong></td>
        <td><?php echo $grupo->id;?></td>
    </tr>
    <tr>
        <td><strong>Grupo</strong></td>
        <td><?php echo $grupo->nome;?></td>
    </tr>
    <tr>
    <tr>
        <td><strong>Unidade</strong></td>
        <td><?php echo $grupo->unidade->nome;?>/<?php echo $grupo->unidade->descricao;?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_button(NULL,'Excluir','id="confirma" class="botao"');?><a href="javascript:history.back()" class="botao">Voltar</a></td>
    </tr>
</table>

<div id="dialog-confirm" title="Confirmação de exclusão">
<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>O grupo será permanentemente excluído da base de dados. Você tem certeza disso?</p>
</div>

<?php echo form_hidden('id', $grupo->id);?>  
           
<?php echo form_close();


/* End of file excluir.php */
/* Location: ./application/views/desktop/subunidades/excluir.php */