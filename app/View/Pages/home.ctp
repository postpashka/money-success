<h1>Welcome!!1</h1>
<h4><?php echo $this->Html->link('See my transactions', array(
	'controller' => 'transactions',
	'action' => 'index'));
?></h4>
<br>
<h4><?php echo $this->Html->link('View users table', array(
	'controller' => 'users',
	'action' => 'index'));
?></h4>	
<br>
<h4><?php echo $this->Html->link('Logout', array(
		'controller' => 'users',
		'action' => 'logout'));


?></h4>
<h4><?php echo $this->Html->link('Login', array(
		'controller' => 'users',
		'action' => 'login'));


?></h4>
