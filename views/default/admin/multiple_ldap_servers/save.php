<?php

$guid = get_input('guid');

$entity = get_entity($guid);

// name => default value
$defaults = array(
	'title' => null,
	'guid' => null,
	'hostname' => null,
	'port' => null,
	'version' => null,
	'bind_dn' => null,
	'bind_password' => null,
	'basedn' => null,
	'filter_attr' => null,
	'search_attr' => null,
);

$form_vars = array();

if ($entity) {
	foreach ($defaults as $name => $value) {
		$form_vars[$name] = $entity->$name;
	}
}

echo elgg_view_form('multiple_ldap_servers/save', array(), $form_vars);
