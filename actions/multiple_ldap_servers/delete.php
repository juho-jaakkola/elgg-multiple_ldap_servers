<?php

$guid = get_input('guid');

$ldap_config = get_entity($guid);

if ($ldap_config->delete()) {
	system_message(elgg_echo('multiple_ldap_servers:delete:success'));
} else {
	register_error(elgg_echo('multiple_ldap_servers:delete:error'));
}

forward('admin/plugin_settings/multiple_ldap_servers');
