<?php

/**
 * 自前のvalidator
 */
class Sample7Controller extends Zend_Controller_Action {
	public function preDispatch()
	{
		parent::preDispatch();
		
		// for Zend_Form
		$adapter = Twk_Translate_Ja::getInstance();
		Zend_Registry::set('Zend_Translate', $adapter);
	}
	
	public function indexAction()
	{
		$session = $this->_getSession();
		$session->unsetAll();
		
		$form = $this->_getForm();
		$this->view->form = $form;
		
		$form->test->setValue('dankogai+kogaidan@gmail.com');
		$form->test2->setValue('dankogai+kogaidan@gmail.com');
	}
	
	public function confirmAction()
	{
		$params = $this->_getAllParams();
		
		$form = $this->_getForm();
		$this->view->form = $form;
		
		if (!$form->isValid($params))
		{
			$this->render('index');
			return;
		}
		
		$session = $this->_getSession();
		$session->values = $form->getValues();
	}
	
	public function submitAction()
	{
		$session = $this->_getSession();
		$params = @$session->values;
		
		$form = $this->_getForm();
		$this->view->form = $form;
		
		if (!is_array($params) || !$form->isValid($params))
		{
			$this->render('index');
			return;
		}
		
		$session = $this->_getSession();
		$session->unsetAll();
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
			->setLabel('Zend_Validate_EmailAddress')
			->setAttrib('style', 'width: 200px;')
			->addValidator(new Zend_Validate_EmailAddress())
			;
		
		$element2 = new Zend_Form_Element_Text('test2');
		$element2
			->setRequired()
			->setLabel('Kj_Validate_EmailAddress')
			->setAttrib('style', 'width: 200px;')
			->addValidator(new Kj_Validate_EmailAddress())
			;
						
		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('さぶみっと');
		 
		$form
			->addElement($element)
			->addElement($element2)
			->addElement($submit);
		
		$urlHelper = $this->getHelper('url');
		/* @var $urlHelper Zend_Controller_Action_Helper_Url */
		$form->setAction($urlHelper->url(array('action' => 'confirm')));
			
		return $form;
	}
	
	/**
	 * @return Zend_Session_Namespace
	 */
	private function _getSession()
	{
		$session = new Zend_Session_Namespace('sample');
		return $session;
	}
}
