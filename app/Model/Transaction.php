<?php
class Transaction extends AppModel {
    
	public $validate = array(
        'value' => array(
            'rule' => 'notEmpty'
        ),
        'payment_type' => array(
            'rule' => 'notEmpty'
        ),
		'Tag' => array(
			'multiple' => array(
				'rule' => array('multiple', array('min' => 1)),
				'message' => 'You need to select at least one tag',
				'required' => true,
			),
		),
    );
	public $displayField = 'id';
 
	public $hasAndBelongsToMany = array(
	'Tag' => array(
		'className' => 'Tag',
		'joinTable' => 'transactions_tags',
		'foreignKey' => 'transaction_id',
		'associationForeignKey' => 'tag_id',
		'unique' => 'keepExisting',
		)
	);
 
	public function beforeSave($options = array()){
		foreach (array_keys($this->hasAndBelongsToMany) as $model){
			if(isset($this->data[$this->name][$model])){
			$this->data[$model][$model] = $this->data[$this->name][$model];
			unset($this->data[$this->name][$model]);
			}
		}
		
    return true;
	}
	
	
	
	
	public function isOwnedBy($transaction, $user) {
		return $this->field('id', array('id' => $transaction, 'user_id' => $user)) == $transaction;
	}
}
?>
