<?php
auth_reauthenticate();
access_ensure_global_level(config_get('manage_plugin_threshold'));

html_page_top('CommentBot');

print_manage_menu();
?>

<form action="<?php echo plugin_page('config_edit')?>" method="post">
<?php echo form_security_field('plugin_commentbot_config_edit')?>
<table align="center" class="width75" cellspacing="1">

<tr <?php echo helper_alternate_class() ?>>
	<td class="category">Username</td>
	<td class="center">
		<input type="text" name="username" value="<?php echo plugin_config_get("username")?>" />
	</td>
</tr>

<tr <?php echo helper_alternate_class() ?>>
	<td class="category">Secret Key</td>
	<td class="center">
		<input type="text" name="secret_key" value="<?php echo plugin_config_get("secret_key")?>" />
	</td>
</tr>

<tr <?php echo helper_alternate_class() ?>>
	<td class="category">Access URL</td>
	<td class="center">
		 <?php echo ($_SERVER['HTTPS'] ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . "?page=CommentBot/post" ?>
	</td>
</tr>


<tr>
	<td class="center" colspan="3">
		<input type="submit" class="button" value="<?php echo lang_get('change_configuration')?>"/>
	</td>
</tr>


</table>
</form>


<?php
html_page_bottom();
?>
