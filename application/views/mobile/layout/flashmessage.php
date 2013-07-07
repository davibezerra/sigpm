<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if($this->session->flashdata('sucess')){?>
<script type="text/javascript" src="js/apply/jquery.flashmessage.js" ></script>
<div class="flashmessage ui-bar ui-bar-e">
    <h3 style="display:inline-block; width:92%; margin-top:5px;"><?php echo $this->session->flashdata('sucess');?></h3><div style="display:inline-block; width:8%; margin-top:0px; text-align:right;"><a href="#" data-role="button" class="close-message" data-icon="delete" data-inline="true" data-rel="close" data-iconpos="notext">Fechar</a></div>
</div>
<?php }?>

<?php if($this->session->flashdata('error')){?>
<script type="text/javascript" src="js/apply/jquery.flashmessage.js" ></script>
<div class="flashmessage ui-bar ui-bar-e">
    <h3 style="display:inline-block; width:92%; margin-top:5px;"><?php echo $this->session->flashdata('error');?></h3><div style="display:inline-block; width:8%; margin-top:0px; text-align:right;"><a href="#" data-role="button" class="close-message" data-icon="delete" data-inline="true" data-rel="close" data-iconpos="notext">Fechar</a></div>
</div>
<?php }?>
<?php
/* End of file flashmessage.php */
/* Location: ./application/views/mobile/layout/flashmessage.php */