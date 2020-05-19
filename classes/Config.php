<?php 

class Config {
    public static function get($pathDefined = null) {
        if (!$pathDefined == null) {
            $path = explode('/', $pathDefined);
            $config = $GLOBALS['config'];

            foreach ($path as $bit) {
                if (isset($config[$bit])) {
                    $config = $config[$bit];
                }
            } 
            
            return $config;
        }
    }
}
