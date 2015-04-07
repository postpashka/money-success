<h1>Add Transaction</h1>
<?php echo $this->Form->create('Transaction');?>
<fieldset>
	<?php 
		echo $this->Form->input('value'); 
		echo $this->Form->input('category');
	?>

	<?php 
		echo $this->Form->input('Transaction.Tag', array('label'=>'Tags', 'type'=>'select', 'multiple'=>true));
		echo $this->Form->input('role', array(
            'options' => array('cash' => 'Cash', 'credit' => 'Credit')
        ));		
	?>

	<?php echo $this->Form->input('created');?>

</fieldset>
<?php
echo $this->Form->end('Save Transaction');
?>

