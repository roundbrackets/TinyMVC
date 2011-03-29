<?
/**
 * HTMLConstructor 
 * 
 * @package 
 * @version $id$
 * @copyright 2011 roundbrackets
 * @author roundbrackets <queen@roundbrackets.com> 
 * @license 
 */
class HTMLConstructor {
    /**
     * elements 
     * 
     * @var array
     * @access private
     */
    private $elements = array (
            'head',
            'body',
        );

    /**
     * data 
     * 
     * @var mixed
     * @access private
     */
    private $data;

    /**
     * __construct 
     * 
     * @access protected
     * @return void
     */
    function __construct () {
    }

    /**
     * constructPage 
     * 
     * @access public
     * @return void
     */
    function constructPage () {
        $output = 
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
';
        foreach ($this->elements as $elm) {
            if (isset($data['elm'])) {
                $class = ucwords($eml).'Constructor';  
                $output .= call_user_func(array($class, 'construct'), $data[$elm]);
            }
        }
        return $output.'</html>';
    }

    /**
     * __set 
     * 
     * @param mixed $elm 
     * @param mixed $value 
     * @access protected
     * @return void
     */
    function __set ($elm, $value) {
        if (!isset($this->data[$elm])) $this->data[$elm] = array ();
        list($tag, $data) = $value;
        if (!isset($this->data[$elm][$tag]) $this->data[$elm][$tag] = array();
        $this->data[$elm][$tag][] = $data;
    }

    function setMeta ($args) {
        $this->head = array ('meta', $args);
    }

    function setTitle ($arg) {
        $this->head = array ('title', $arg);
    }

    function setJS ($arg, $body = false) {
        if ($body) {
            $this->body = array ('script', $arg);
        } else {
            $this->head = array ('script', $arg);
        }
    }

    function setCSS ($arg) {
        $this->head = array ('style', $arg);
    }

    function setBody ($arg) {
        $this->body = array ('body', $arg);
    }

    function setDefaults () {
        $this->setMeta(array('http-equiv'=>"Content-Type", 'content'=>"text/html; charset=utf-8"));
        $this->setMeta(array('http-equiv'=>"Content-language" 'value'=>"en"));
        $this->setJS('http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js');
        $this->setJS('http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js');
    }
}
