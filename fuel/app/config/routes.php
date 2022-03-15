<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.8.2
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

return array(
	/**
	 * -------------------------------------------------------------------------
	 *  Default route
	 * -------------------------------------------------------------------------
	 *
	 */

	'_root_' => array('top/index', 'name' => 'top_index'),

	'entry' => array('entry/index', 'name' => 'entry_index'),
	'entry/complete' => array('entry/complete', 'name' => 'entry_complete'),

	'system/login' => array('system/login/index', 'name' => 'system_login_index'),

	'system/admin' => array('system/admin/index', 'name' => 'system_admin_index'),
	'system/admin/entry' => array('system/admin/entry/index', 'name' => 'system_admin_entry_index'),
	'system/admin/entry/edit/:entry_id' => array('system/admin/entry/edit', 'name' => 'system_admin_entry_edit'),
	'system/admin/entry/delete/complete' => array('system/admin/entry/complete', 'name' => 'system_admin_entry_delete_complete'),
	'system/admin/entry/delete/:entry_id' => array('system/admin/entry/delete', 'name' => 'system_admin_entry_delete'),
	'system/admin/admin' => array('system/admin/admin/index', 'name' => 'system_admin_admin_index'),
	'system/admin/admin/edit/:admin_id' => array('system/admin/admin/edit', 'name' => 'system_admin_admin_edit'),
	'system/admin/admin/delete/complete' => array('system/admin/admin/complete', 'name' => 'system_admin_admin_delete_complete'),
	'system/admin/admin/delete/:admin_id' => array('system/admin/admin/delete', 'name' => 'system_admin_admin_delete'),
	'system/admin/config' => array('system/admin/config/index', 'name' => 'system_admin_config_index'),
	'system/admin/password' => array('system/admin/password/index', 'name' => 'system_admin_password_index'),
	'system/admin/logout' => array('system/admin/logout/index', 'name' => 'system_admin_logout_index'),
);
