<?php

/**
 * @see http://phpspot.net/php/pg%90%B3%8BK%95%5C%8C%BB%81F%83%81%81%5B%83%8B%83A%83h%83%8C%83X%82%A9%82%C7%82%A4%82%A9%92%B2%82%D7%82%E9.html
 */
class Kj_Validate_EmailAddress extends Zend_Validate_Abstract
{
    const INVALID = 'invalid';

    protected $_messageTemplates = array(
        self::INVALID => "'%value%' はメールアドレスではないみたいです。間違いの指摘をしていただける方はメールでお願いします。"
    );

    public function isValid($value)
    {
        $this->_setValue($value);

        if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $value)) {
            $this->_error();
            return false;
        }

        return true;
    }
}
