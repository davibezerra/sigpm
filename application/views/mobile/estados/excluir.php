<?php echo form_open('estados/excluir','id="excluir"'); ?>

<?php echo form_label('Estado', 'nome');?>
<?php echo form_input(array('name'=>'nome','id'=>'nome','disabled'=>'disabled'),$uf->nome);?>

<?php echo form_label('Sigla', 'sigla');?>
<?php echo form_input(array('name'=>'sigla','id'=>'sigla','disabled'=>'disabled'),$uf->sigla);?>

<a href="#janelaExcluir" data-rel="popup" data-position-to="window" data-role="button" data-inline="true" data-transition="pop" data-icon="delete" data-theme="e">Excluir</a><a href="javascript:history.back()" data-role="button" data-inline="true" data-icon="back">Voltar</a>

<?php echo form_hidden('id', $uf->id);?>

<div data-role="popup" id="janelaExcluir" data-overlay-theme="b" data-theme="b" data-dismissible="true" style="max-width:400px;" class="ui-corner-all">
    <div data-role="header" data-theme="b" class="ui-corner-top">
        <h1>Excluir Estado?</h1>
    </div>
    <div data-role="content" data-theme="d" class="ui-corner-bottom ui-content">
        <h3 class="ui-title">Você tem certeza que deseja excluir este registro?</h3>
        <p>Esta ação não pode ser cancelada.</p>
        <a href="#" data-role="button" data-inline="true" data-rel="back" data-theme="c">Cancelar</a>
        <a href="#" id="confirma" data-role="button" data-inline="true" data-transition="flow" data-theme="b">Apagar</a>
    </div>
</div>
           
<script type="text/javascript" src="js/apply/jquery.mobile.delete.confirm.js" ></script>

<?php echo form_close();


/* End of file excluir.php */
/* Location: ./application/views/mobile/estados/excluir.php */

