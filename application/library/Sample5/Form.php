<?php

/**
 * testとtest2の照合
 */
class Sample5_Form extends Zend_Form {
	public function isValid($data)
	{
		$isValid = parent::isValid($data);
		
		$test = $this->test;
		$test2 = $this->test2;
		/* @var $test Zend_Form_Element_Text */
		/* @var test2 Zend_Form_Element_Text */
		if (!$test->hasErrors() && !$test2->hasErrors())
		{
			if ($test2->getValue() != str_repeat($test->getValue(), 2))
			{
				$test2->addError('test2はstr_repeat(test, 2)じゃないとだめだよ');
				$isValid = false;
			}
		}
		
		return $isValid;
	}
	
}