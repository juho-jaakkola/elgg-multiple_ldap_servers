<?php
/**
 * Displays a single ldap_config object
 *
 * @user $vars['entity']
 */

$entity = $vars['entity'];

$metadata = elgg_view('output/confirmlink', array(
	'href' => "action/multiple_ldap_servers/delete?guid={$entity->guid}",
	'text' => elgg_view_icon('delete'),
	'is_action' => 'true',
	'class' => 'float-alt',
));

$title = elgg_view('output/url', array(
	'href' => "admin/multiple_ldap_servers/save?guid={$entity->guid}",
	'text' => $entity->title,
));

$params = array(
	'entity' => $vars['entity'],
	'title' => $title,
	'metadata' => $metadata,
	'subtitle' => $entity->hostname,
);
$params = $params + $vars;
$body = elgg_view('object/elements/summary', $params);

echo elgg_view_image_block($icon, $body, $vars);
