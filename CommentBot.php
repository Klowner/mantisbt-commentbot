<?php
require_once(config_get('class_path') . 'MantisPlugin.class.php');

class CommentBotPlugin extends MantisPlugin {
	function register() {
		$this->name = "CommentBot";
		$this->description = "Robot that comments on things";
		$this->page = 'config';

		$this->version = '0.1';
		$this->requires = array(
			'MantisCore' => '1.2.0',
		);

		$this->author = "Mark Riedesel";
		$this->contact = "mark@klowner.com";
		$this->url = "";
	}

	function events() {
		return array();
	}

	function hooks() {
		return array();
	}

	function config() {
		return array(
			'username' => '',
			'secret_key' => ""
		);
	}

}
?>
