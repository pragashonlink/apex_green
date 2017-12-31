<?php
class Validate {
    private $_passed = false,
            $_errors = array(),
            $_db = null;

    public function __construct() {
        $this->_db = Database::getInstance();
    }

    public function check($source, $items = array()) {
        foreach ($items as $item => $rules) {
            /*if(!isset()){

            } else {

            }*/
            foreach ($rules as $rule => $rule_value) {
                $value = trim($source[$item]);

                if($items[$item]['required'] === true && $rule === 'required' && empty($value)) {
                    $this->addError("{$item} is required");
                } else if(!empty($value)) {
                    switch ($rule) {
                        case 'min':
                            if(strlen($value) < $rule_value) {
                                $this->addError("{$item} must be minimum {$rule_value} characters long.");
                            }
                        break;

                        case 'max':
                            if(strlen($value) > $rule_value) {
                                $this->addError("{$item} must be maximum {$rule_value} characters long.");
                            }
                        break;
                    }
                }
            }
        }

        if(empty($this->_errors)) {
            $this->_passed = true;
        }

        return $this;
    }

    private function addError($error) {
        $this->_errors[] = $error;
    }

    public function error() {
        return $this->_errors;
    }

    public function passed() {
        return $this->_passed;
    }
}