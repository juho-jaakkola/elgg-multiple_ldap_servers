<?php
/**
 * LDAP authentication with multiple servers
 */

elgg_register_event_handler('init', 'system', 'multiple_ldap_servers_init');

/**
 * Initialize the plugin
 */
function multiple_ldap_servers_init() {
	// Unregister the ldap_auth authentication handler
	unregister_pam_handler('ldap_auth_authenticate');

	// Register authentication handler that supports multiple servers
	register_pam_handler('ldap_auth_multiple');

	elgg_register_action('multiple_ldap_servers/save', __DIR__ . '/actions/multiple_ldap_servers/save.php', 'admin');
	elgg_register_action('multiple_ldap_servers/delete', __DIR__ . '/actions/multiple_ldap_servers/delete.php', 'admin');
}

/**
 * Authenticate user against the credentials
 *
 * @param array $credentials
 * @return boolean
 */
function ldap_auth_multiple($credentials) {
	$username = elgg_extract('username', $credentials);
	$password = elgg_extract('password', $credentials);

	// Configuration of each LDAP server is saved as entity
	$ia = elgg_set_ignore_access(true);
	$config = elgg_get_entities(array(
		'type' => 'object',
		'subtype' => 'ldap_config',
	));

	$return = false;

	foreach ($config as $settings) {
		try {
			$server = new LdapServer($settings);

			if (!$server->bind()) {
				elgg_add_admin_notice($settings->guid, elgg_echo('multiple_ldap_servers:connection_error', array($settings->title)));
				continue;
			}

			$filter = "({$settings->filter_attr}={$username})";

			$result = $server->search($filter);

			if (empty($result)) {
				// User was not found
				continue;
			}

			// Bind using user's distinguished name and password
			$success = $server->bind($result['dn'], $password);

			if (!$success) {
				// dn/password combination doesn't exist
				continue;
			}

			$user = get_user_by_username($username);

			if ($user) {
				$return = login($user);
				break;
			}

			// Get this setting from the default ldap_auth plugin
			if ($settings->user_create !== 'off') {
				$return = ldap_auth_create_user($username, $password, $result);
				break;
			}

			// User was authenticated but automatic account creation is disabled
			register_error(elgg_echo("ldap_auth:no_account"));
			break;
		} catch (Exception $e) {
			elgg_add_admin_notice($settings->guid, $e->getMessage());
			elgg_log($e->getMessage(), 'ERROR');
			continue;
		}
	}

	// The settings are private so we need to ignore access to the very end
	elgg_set_ignore_access($ia);

	return $return;
}
