<?php

form_security_validate('plugin_commentbot_config_edit');
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );

$f_username = gpc_get_string('username', '');
$f_secret_key = gpc_get_string('secret_key', '');
$f_add_to_monitoring = gpc_get_bool('add_to_monitoring', FALSE);
$f_log_history = gpc_get_bool('log_history', FALSE);
$f_send_mail = gpc_get_bool('send_mail', FALSE);

if (plugin_config_get('username') != $f_username) {
	plugin_config_set('username', $f_username);
}

if (strlen($f_secret_key) == 0) {
	$f_secret_key = sha1(uniqid('', true));
}

if (plugin_config_get('secret_key') != $f_secret_key) {
	plugin_config_set('secret_key', $f_secret_key);
}

plugin_config_set('add_to_monitoring', $f_add_to_monitoring);
plugin_config_set('log_history', $f_log_history);
plugin_config_set('send_mail', $f_send_mail);

form_security_purge('plugin_commentbot_config_edit');

print_successful_redirect(plugin_page('config', true));
?>

