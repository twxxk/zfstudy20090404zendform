<?php

/**
 */
class Sample9_Form extends Zend_Form {
	public function isValid($data)
	{
		parent::populate($data);
		
		// testに値が入っている時はtest2にも値が必要
		$test = $this->test;
		$test2 = $this->test2;
		/* @var $test Zend_Form_Element_Text */
		/* @var $test2 Zend_Form_Element_Text */
		$isTest2Required = $test->getValue() !== '';
		$test2->setRequired($isTest2Required);
		
		$isValid = parent::isValid($data);
		
		return $isValid;
	}
	
}