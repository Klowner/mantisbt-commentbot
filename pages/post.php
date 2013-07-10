<?php
require_once('core.php');
require_once('bug_api.php');
require_once('bugnote_api.php');
require_once('user_api.php');

$user_id = user_get_id_by_name(plugin_config_get('username'));
$secret_key = plugin_config_get('secret_key');

$f_bug_id = gpc_get_int('bug_id');
$f_secret_key = gpc_get_string('secret_key');
$f_message = gpc_get_string('message');

if ($secret_key == $f_secret_key) {
	$t_bug = bug_get($f_bug_id, true);
	if ($t_bug) {
		bugnote_add($f_bug_id, $f_message, '0:00', false, BUGNOTE, '', $user_id, false, false);
	}
}

exit;

?>
