<?php

/**
 * theme.class.php
 *
 * The theme class generates theme code by inspecting a theme bundle.
 * @autho Anthony Decena <anthony@mindelusions.com>
 * @version 0.1.1
 * @package theme
 */

class theme {
	var $theme_name;
	var $theme_path;
	var $icons_path;

	var $theme_dir = "themes/";
	var $icons_dir = "Icons/";

	var $icons = array();

	function theme($name) {
		if (!$name) { return false; }

		$this->theme_name = $name;
		$this->theme_path = ABSPATH . $this->theme_dir . $this->theme_name . "/";
		$this->icons_path = $this->theme_path . $this->icons_dir;

		$this->inspect();
	}

	function inspect() {
	    if ($handle = opendir($this->icons_path)) {
	        while (false !== ($file = readdir($handle))) {
	            if (!preg_match("/^\./", $file)) {
	                $this->icons[] = $file;
	            }
	        }
	    }
	    closedir($handle);
	}


}

?>
