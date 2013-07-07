<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<?php if($this->session->flashdata('sucess')){?>
<script type="text/javascript" src="js/apply/jquery.flashmessage.js" ></script>
<div class="flashmessage sucess">
    <p><?php echo $this->session->flashdata('sucess');?></p>
</div>
<?php }?>

<?php if($this->session->flashdata('error')){?>
<script type="text/javascript" src="js/apply/jquery.flashmessage.js" ></script>
<div class="flashmessage error">
    <p><?php echo $this->session->flashdata('error');?></p>
</div>
<?php }?>

<?php
/* End of file flashmessage.php */
/* Location: ./application/views/desktop/layout/flashmessage.php */