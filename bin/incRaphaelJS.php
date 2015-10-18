<?php
if (!defined("CMS_VERSION")) { header("HTTP/1.0 404 Not Found"); die(""); }

if (!class_exists("commandIncRaphaelJS")) {
    class commandIncRaphaelJS extends driverCommand {

        public static function runMe(&$params, $debug = true) {
            $path = driverCommand::run('modGetPath', array(
                'name' => 'raphael_js'
            ));
            $path = $path['path'];
//            if ($path == '') {
//                return array('ok' => false, 'msg' => __("Module 'raphael_js' is required."));
//            }
            echo '<link href="'.CMS_DEFAULT_URL_BASE.$path.'morrisjs/morris.css" rel="stylesheet">';
            echo '<script src="'.CMS_DEFAULT_URL_BASE.$path.'raphael-min.js" type="text/javascript"></script>';
            echo '<script src="'.CMS_DEFAULT_URL_BASE.$path.'morrisjs/morris.min.js" type="text/javascript"></script>';
        }

        public static function getHelp() {
            return array(
                "package" => "raphael_js",
                "description" => __("Print HTML includes to Raphael JS."), 
                "parameters" => array(), 
                "response" => array(),
                "type" => array(
                    "parameters" => array(), 
                    "response" => array(),
                ),
                "echo" => true
            );
        }
        
        public static function getAccess($ignore = "") {
            $me = __FILE__;
            return parent::getAccess($me);
        }
        
        public static function getAccessFlags() {
            return driverUser::PERMISSION_FILE_ALL_EXECUTE;
        }
    }
}
return new commandIncRaphaelJS();