<?php
/**
 * Form for entering LDAP server configuration
 */

$title_label = elgg_echo('title');
$title_descr = elgg_echo('ldap_auth:settings:help:title');
$title_input = elgg_view('input/text', array(
	'name' => "title",
	'value' => $vars['title'],
));

$hostname_label = elgg_echo('ldap_auth:settings:label:hostname');
$hostname_descr = elgg_echo('ldap_auth:settings:help:hostname');
$hostname_input = elgg_view('input/text', array(
	'name' => "hostname",
	'value' => $vars['hostname'],
));

$port_label = elgg_echo('ldap_auth:settings:label:port');
$port_descr = elgg_echo('ldap_auth:settings:help:port');
$port_input = elgg_view('input/text', array(
	'name' => "port",
	'value' => $vars['port'],
));

$version_label = elgg_echo('ldap_auth:settings:label:version');
$version_descr = elgg_echo('ldap_auth:settings:help:version');
$version_input = elgg_view('input/dropdown', array(
	'name' => "version",
	'value' => $vars['version'],
	'options' => array(1, 2, 3)
));

$bind_dn_label = elgg_echo('ldap_auth:settings:label:bind_dn');
$bind_dn_descr = elgg_echo('ldap_auth:settings:help:bind_dn');
$bind_dn_input = elgg_view('input/text', array(
	'name' => "bind_dn",
	'value' => $vars['bind_dn'],
));

$bind_password_label = elgg_echo('ldap_auth:settings:label:bind_password');
$bind_password_descr = elgg_echo('ldap_auth:settings:help:bind_password');
$bind_password_input = elgg_view('input/password', array(
	'name' => "bind_password",
	'value' => $vars['bind_password'],
));

$basedn_label = elgg_echo('ldap_auth:settings:label:basedn');
$basedn_descr = elgg_echo('ldap_auth:settings:help:basedn');
$basedn_input = elgg_view('input/text', array(
	'name' => "basedn",
	'value' => $vars['basedn'],
));

$filter_attr_label = elgg_echo('ldap_auth:settings:label:filter_attr');
$filter_attr_descr = elgg_echo('ldap_auth:settings:help:filter_attr');
$filter_attr_input = elgg_view('input/text', array(
	'name' => "filter_attr",
	'value' => $vars['filter_attr'],
));

$search_attr_label = elgg_echo('ldap_auth:settings:label:search_attr');
$search_attr_descr = elgg_echo('ldap_auth:settings:help:search_attr');
$search_attr_input = elgg_view('input/text', array(
	'name' => "search_attr",
	'value' => $vars['search_attr'],
));

$user_create_label = elgg_echo('ldap_auth:settings:label:user_create');
$user_create_descr = elgg_echo('ldap_auth:settings:help:user_create');
$user_create_input = elgg_view('input/dropdown', array(
	'name' => "user_create",
	'value' => $vars['user_create'],
	'options' => array('on', 'off'),
));

$guid_input = elgg_view('input/hidden', array(
	'name' => 'guid',
	'value' => $vars['guid'],
));

$submit_input = elgg_view('input/submit', array(
	'value' => elgg_echo('save'),
	'class' => 'elgg-button elgg-button-submit mll mtm',
));

$legend1 = elgg_echo('ldap_auth:settings:label:host');
$legend2 = elgg_echo('ldap_auth:settings:label:connection_search');;

echo <<<FORM
<div>
	<fieldset style="border: 1px solid; padding: 15px; margin: 10px">
		<legend>$legend1</legend>
		<div>
			<label>$title_label</label>
			$title_input
			$title_descr
		</div>

		<div>
			<label>$hostname_label</label>
			$hostname_input
			$hostname_descr
		</div>

		<div>
			<label>$port_label</label>
			$port_input
			$port_descr
		</div>

		<div>
			<label>$version_label</label>
			$version_input<br />
			$version_descr
		</div>
	</fieldset>

	<fieldset style="border: 1px solid; padding: 15px; margin: 0 10px 0 10px">
		<legend>$legend2</legend>
		<div>
			<label>$bind_dn_label</label>
			$bind_dn_input
			$bind_dn_descr
		</div>

		<div>
			<label>$bind_password_label</label><br />
			$bind_password_input<br />
			$bind_password_descr
		</div>

		<div>
			<label>$basedn_label</label>
			$basedn_input
			$basedn_descr
		</div>

		<div>
			<label>$filter_attr_label</label>
			$filter_attr_input<br />
			$filter_attr_descr
		</div>

		<div>
			<label>$search_attr_label</label>
			$search_attr_input<br />
			$search_attr_descr
		</div>

		<div>
			<label>$user_create_label</label>
			$user_create_input<br />
			$user_create_descr
		</div>
	</fieldset>
	$guid_input
	$submit_input
</div>
FORM;
