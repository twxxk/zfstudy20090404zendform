<?php

/**
 * 単一の要素
 */
class Sample1Controller extends Zend_Controller_Action {
	public function indexAction()
	{
		$form = $this->_getForm();
		$this->view->form = $form;
	}
	
	public function submitAction()
	{
		$params = $this->_getAllParams();
		
		$form = $this->_getForm();
		$this->view->form = $form;
		
		if (!$form->isValid($params))
		{
			$this->render('index');
			return;
		}
		
		// DBに保存したりする
	}
	
	/**
	 * @return Zend_Form
	 */
	private function _getForm()
	{
		$form = new Zend_Form();
		
		$element = new Zend_Form_Element_Text('test');
		$element
			->setRequired()
			->setLabel('てすと')
			;
			
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('さぶみっと');
		 
		$form
			->addElement($element)
			->addElement($submit);
		
		$urlHelper = $this->getHelper('url');
		/* @var $urlHelper Zend_Controller_Action_Helper_Url */
		$form->setAction($urlHelper->url(array('action' => 'submit')));
		
		return $form;
	}
}
