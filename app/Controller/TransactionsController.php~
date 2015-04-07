<?php
App::uses('AppController', 'Controller');

class TransactionsController extends AppController {

	
	

    public function index() {
	$user = $this->Auth->user();
	if ($user) {	
		if ($this->isAuthorized($this->Auth->user())){
		
			$user_transactions = $this->Transaction->find('all');		

		}else{
			$user_transactions = $this->Transaction->find('all', array (
				'conditions' => array('user_id' =>  $this->Auth->user('id'))
			));

			}
	}
	else {
		$this->Session->setFlash(__('You must log in to access that page'));
                $this->redirect(array('controller'=> 'users','action' => 'login'));
	}
	$this->set('transactions', $user_transactions);	
	$this->set('sum_value', $this->money_summ($user_transactions));
}

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid transaction'));
        }

        $transaction = $this->Transaction->findById($id);
        if (!$transaction) {
            throw new NotFoundException(__('Invalid post'));
        }
        $this->set('transaction', $transaction);
    }
	
	public function add() {
        if ($this->request->is('post')) {
	$this->request->data['Transaction']['user_id'] = $this->Auth->user('id');
            $this->Transaction->create();
            if ($this->Transaction->save($this->request->data)) {
                $this->Session->setFlash('Your transaction has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add your transaction.');
            }
        }
  		$tags = $this->Transaction->Tag->find('list',array(
			'fields' => array('Tag.label')
		));  
		$this->set(compact('tags'));
    }
	
	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid transaction'));
		}
	
		$transaction = $this->Transaction->findById($id);
		if (!$transaction) {
			throw new NotFoundException(__('Invalid transaction'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Transaction->id = $id;
			$this->Transaction->user_id = $this->Auth->user('id');
			if ($this->Transaction->save($this->request->data)) {
				$this->Session->setFlash('Your transaction has been updated.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Unable to update your transaction.');
			}
		}
	
		if (!$this->request->data) {
			$this->request->data = $transaction;
		}
		$tags = $this->Transaction->Tag->find('list',array(
			'fields' => array('Tag.label')
		));  
		$this->set(compact('tags'));
		
	}
	
	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}

		if ($this->Transaction->delete($id)) {
			$this->redirect(array('action' => 'index'));
		}
	}
	
	public function isAuthorized($user) {
    // All registered users can add posts
		if ($this->action === 'add') {

			return true;
		}

    // The owner of a post can edit and delete it
		
		if (in_array($this->action, array('edit', 'delete'))) {
			
			$transactionId = $this->request->params['pass'][0];
			if ($this->Transaction->isOwnedBy($transactionId, $user['id'])) {
				return true;
			}
		}
		return parent::isAuthorized($user);
	}
	public function positive(){
		$user = $this->Auth->user();
		if ($this->isAuthorized($this->Auth->user())){
		$user_transactions = $this->Transaction->find('all', array (
			'conditions' => array('value >' => 0)
		));		
		}else{
		$user_transactions = $this->Transaction->find('all', array (
			'conditions' => array('user_id' =>  $this->Auth->user('id'), 'value >' => 0)
		));		
		}		
		$this->set('transactions', $user_transactions);
		$this->set('sum_value', $this->money_summ($user_transactions));
		$this->render('index');
				
	}
	public function negative(){
		$user = $this->Auth->user();
		if ($this->isAuthorized($this->Auth->user())){
		$user_transactions = $this->Transaction->find('all', array (
			'conditions' => array('value >' => 0)
		));
		}else{
		$user_transactions = $this->Transaction->find('all', array (
			'conditions' => array('user_id' =>  $this->Auth->user('id'), 'value <' => 0)
		));		
		}
		$this->set('transactions', $user_transactions);
		$this->set('sum_value', $this->money_summ($user_transactions));
		$this->render('index');
				
	}
	
	public function money_summ($transactions){
		$sum_value = 0.0;	
		foreach ($transactions as $t){
			if ($t['Transaction']['value'][0] == '-'){
				$sum_value -= (float)substr($t['Transaction']['value'], strpos($t['Transaction']['value'],"$")+1);
			}else{
				$sum_value += (float)substr($t['Transaction']['value'], strpos($t['Transaction']['value'],"$")+1);
			}
		}
		
		return strval('$'.$sum_value); 
	}
	
	public function beforeFilter() {
	        parent::beforeFilter();
	        $this->Auth->allow();
    }

}
?>
