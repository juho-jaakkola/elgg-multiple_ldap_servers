<?php

$guid = get_input('guid');

$ldap_config = get_entity($guid);

if (!$ldap_config) {
	$ldap_config = new ElggObject;
	$ldap_config->subtype = 'ldap_config';
	$ldap_config->access_id = ACCESS_PRIVATE;
	$ldap_config->owner_guid = elgg_get_site_entity()->guid;
}

$fields = array(
	'title',
	'hostname',
	'port',
	'version',
	'bind_dn',
	'bind_password',
	'basedn',
	'filter_attr',
	'search_attr',
);

foreach ($fields as $field) {
	$ldap_config->$field = get_input($field);
}

if ($ldap_config->save()) {
	system_message(elgg_echo('saved'));
	forward('admin/plugin_settings/multiple_ldap_servers');
} else {
	register_error(elgg_echo('failed'));
	forward(REFERER);
}

