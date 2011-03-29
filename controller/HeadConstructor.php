<?
class HeadConstructor {

    static function construct  ($data) {
        $head = array ( "<head>\n" );
        foreach ($data as $type => $value) {
            if (method_exists ($this, $type)) {
                $this->$type($value, $head);
            }
        }
        $head[] = "</head>\n";
        return implode("\n", $head);
    }

    static function multi_value_tag ($tag, $data, &$store) {
        foreach ($data as $meta) {
            $str = "<{$tag} ";
            foreach ($meta as $key => $val) {
                $str .= $key.'="'.$val.'" ';
            }
            $store[] = trim($str).'>';
        }
    }

    static function meta ($data, &$store) {
        foreach ($data as $d) {
            $this->multi_value_tag('meta', $d, $store);
        }
    }

    static function title ($data, &$store) {
        $store[] = "<title>{$data[0]}</title>";
    }

    static function link ($data, &$store) {
        foreach ($data as $d) {
            self::multi_value_tag('link', $d, $store);
        }
    }

    static function style ($data, &$store) {
        $str = '<style type="text/css">'; 
        foreach ($data as $d) {
            $str .= "\n\t@import url(\"".$d."\");";
        }
        $str .= "\n</style>\n"; 
        $store[] = $str;
    }

    static function script ($data, &$store) {
        $istr = $str = '';
        foreach ($data as $d) {
            if (strstr($d, 'js.inline')) {
                $istr = "\n".file_get_contents($data)."\n".
            } else {
                $str = 
                    '<script type="text/javascript" src="'.$data.'"></script>'."\n";
            }
        }
        if ($istr)
            $istr = 
                '<script type="text/javascript">'.$istr.'</script>'."\n";
        $store[] = $str.$istr; 
    }
}
