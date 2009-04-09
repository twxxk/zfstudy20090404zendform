<?php

class IndexController extends Zend_Controller_Action {
	public function indexAction()
	{
		$this->view->magic = 'world';
		
		$this->view->samples = array(
			'sample1', 'sample1b', 'sample1c', 'sample2', 'sample3', 'sample4',
			'sample5', 'sample6', 'sample6b', 'sample7', 'sample8', 'sample9',
		);
	}
}
