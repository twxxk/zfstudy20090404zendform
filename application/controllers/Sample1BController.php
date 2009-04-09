<?php

/**
 * 複数の要素がある
 * validator付き
 */
class Sample1BController extends Zend_Controller_Action {
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
		
		$validators = array(
			new Zend_Validate_Alpha(),
			new Zend_Validate_StringLength(5, 10),
		);
		
		$element = new Zend_Form_Element_Text('test');
		$element
			->setRequired()
			->setLabel('てすと')
			->addValidators($validators)
			;
		
		$element2 = new Zend_Form_Element_Text('test2');
		$element2
			->setRequired()
			->setLabel('てすと2')
			->addValidators($validators)
			;
						
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('さぶみっと');
		 
		$form
			->addElement($element)
			->addElement($element2)
			->addElement($submit);
		
		$urlHelper = $this->getHelper('url');
		/* @var $urlHelper Zend_Controller_Action_Helper_Url */
		$form->setAction($urlHelper->url(array('action' => 'submit')));
		
		return $form;
	}
}
