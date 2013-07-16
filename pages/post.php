<?php
require_once('core.php');
require_once('authentication_api.php');
require_once('bug_api.php');
require_once('bugnote_api.php');
require_once('user_api.php');

$user_id = user_get_id_by_name(plugin_config_get('username'));
$secret_key = plugin_config_get('secret_key');
$add_to_monitoring = plugin_config_get('add_to_monitoring');
$send_mail = plugin_config_get('send_mail');
$log_history = plugin_config_get('log_history');

$f_bug_id = gpc_get_int('bug_id');
$f_secret_key = gpc_get_string('secret_key');
$f_monitor = gpc_get_string('monitor', '');
$f_message = gpc_get_string('message');

if ($f_monitor) {
	$t_user_id = user_get_id_by_email( $f_monitor );
}

if ($secret_key == $f_secret_key) {
	$t_bug = bug_get($f_bug_id, true);

	if ($t_bug) {
		// Mantis will abort after adding the bug note (but before updating history or sending an e-mail)
		// if the script is not authenticated like this.
		auth_attempt_script_login(plugin_config_get('username'));

		// Add the specified user to the monitoring list, if applicable
		if ($add_to_monitoring && $t_user_id) {
			bug_monitor($f_bug_id, $t_user_id);
		}

		bugnote_add($f_bug_id, $f_message, '0:00', false, BUGNOTE, '', $user_id, $send_mail, $log_history);
	}
}

exit;

?>
