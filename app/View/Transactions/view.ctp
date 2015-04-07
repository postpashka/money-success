<h1>Transactions #<?php echo $transaction['Transaction']['id']; ?></h1>
<dl>
	<dt>Id:</dt>
	<dd><?php echo $transaction['Transaction']['id']; ?></dd>

	<dt>Value:</dt>
	<dd><?php echo $transaction['Transaction']['value']; ?></dd>

	<dt>Created:</dt>
	<dd><?php echo $transaction['Transaction']['created']; ?></dd>

	<dt>Category:</dt>
	<dd><?php echo $transaction['Transaction']['category']; ?></dd>

	<dt>Payment type:</dt>
	<dd><?php echo $transaction['Transaction']['payment_type']; ?></dd>

</dl>
