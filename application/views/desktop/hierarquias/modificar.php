<?php echo form_open('hierarquias/modificar/'.$hierarquia->id);?>
<?php echo form_hidden('id', $hierarquia->id);?>  
<table>
    <tr>
        <td><?php echo form_label('Código', 'id');?></td>
        <td><?php echo form_input(array('name'=>'id','id'=>'id','maxlength'=>'5','size'=>'4'),$hierarquia->id);?><?php echo form_error('id'); ?></td>
    </tr>
    <tr>
        <td><?php echo form_label('Posto/Grad', 'nome');?></td>
        <td><?php echo form_input(array('name'=>'nome','id'=>'nome','maxlength'=>'50','size'=>'27'),$hierarquia->nome);?><?php echo form_error('nome'); ?></td>
    </tr>
    <tr>
        <td colspan="2"><?php echo form_submit(NULL,'Modificar', 'class="botao"');?><a href="javascript:history.back()" class="botao">voltar</a></td>
    </tr>
</table>
<input type="hidden" name="id_old" id="id_old" value="<?php echo $hierarquia->id; ?>" />

<?php echo form_close();


/* End of file modificar.php */
/* Location: ./application/views/desktop/hiearquias/modificar.php */

