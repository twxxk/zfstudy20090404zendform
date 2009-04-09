<?php

/**
 * 各種Element
 */
class Sample8Controller extends Zend_Controller_Action {
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
		
		$elementTypes = array(
			'Button', 
			// 'Captcha', 
			'Checkbox', 'File', 'Hash', 'Hidden',
			'Image', 'MultiCheckbox', 'Multiselect', 'Password',
			'Radio', 'Reset', 'Select', 'Submit', 'Text', 'Textarea',
		);
		foreach ($elementTypes as $elementType)
		{
			$className = 'Zend_Form_Element_' . $elementType;
			$element = new $className($elementType);
			/* @var $element Zend_Form_Element */
			$element->setLabel($elementType);
			
			$form->addElement($element);
		}
		
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
