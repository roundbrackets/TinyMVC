<?
/**
 * BodyConstructor 
 * 
 * @package 
 * @version $id$
 * @copyright 2011 roundbrackets
 * @author roundbrackets <queen@roundbrackets.com> 
 * @license 
 */
class BodyConstructor {
    /**
     * construct 
     * 
     * @param mixed $data 
     * @static
     * @access public
     * @return void
     */
    static function construct  ($data) {
        foreach ($data as $type => $value) {
            if (method_exists ($this, $type)) {
                $this->$type($value, $body);
            }
        }
        array_unshift($body, '<body>');
        array_push($body, '</body>');
        return implode("\n", $body);
    }

    /**
     * body 
     * 
     * @param mixed $data 
     * @param mixed $store 
     * @static
     * @access public
     * @return void
     */
    static function body ($data, &$store) {
        $store[] = implode("\n", $data);
    }

    /**
     * script  
     * 
     * @param mixed $data 
     * @param mixed $store 
     * @static
     * @access public
     * @return void
     */
    static function script ($data, &$store) {
        HeadConstructor::script($data, $store);
    }
}
