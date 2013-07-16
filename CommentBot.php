<?php
require_once(config_get('class_path') . 'MantisPlugin.class.php');

class CommentBotPlugin extends MantisPlugin {
	function register() {
		$this->name = "CommentBot";
		$this->description = "Automated bugticket commenting hook";
		$this->page = 'config';

		$this->version = '1.2';
		$this->requires = array(
			'MantisCore' => '1.2.0',
		);

		$this->author = "Mark Riedesel";
		$this->contact = "mark@klowner.com";
		$this->url = "https://github.com/Klowner/mantisbt-commentbot";
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
			'secret_key' => "",
			'add_to_monitoring' => False,
			'send_mail' => False,
			'log_history' => False
		);
	}

}
?>
