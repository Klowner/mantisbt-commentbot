<?php
/*
Copyright (C) 2014  Mark Riedesel

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

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
