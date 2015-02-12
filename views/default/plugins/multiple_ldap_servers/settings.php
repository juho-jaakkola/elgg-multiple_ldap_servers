<?php

elgg_register_menu_item('title', array(
	'href' => 'admin/multiple_ldap_servers/save',
	'name' => 'ldap_server_add',
	'text' => elgg_echo('add'),
	'link_class' => 'elgg-button elgg-button-action',
));

echo elgg_list_entities(array(
	'type' => 'object',
	'subtype' => 'ldap_config',
	'no_results' => elgg_echo('multiple_ldap_servers:none'),
));
