<?php

/**
 * タグが違う
 */
class Sample3Controller extends Zend_Controller_Action {
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
		$form->setDecorators(array('FormElements', 'Form'));
		
		$textDecorators = array(
			'ViewHelper', 
			'Errors',
			array('decorator' => 'Description', 'options' => array('tag' => 'p', 'class' => 'description')),
			'Label',
			array('decorator' => array('OuterHtmlTag' => 'HtmlTag'), 'options' => array('tag' => 'div')),
        );
        
        $submitDecorators = array(
			'ViewHelper',
			array('decorator' => array('OuterHtmlTag' => 'HtmlTag'), 'options' => array('tag' => 'div')),
        );
		
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
		$submit
			->setLabel('さぶみっと')
			->setDecorators($submitDecorators)
			;
			
		$form
			->addElement($element)
			->addElement($element2)
			->addElement($submit)
			;
		
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
