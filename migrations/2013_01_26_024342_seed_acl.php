<?php

class Diskus_Seed_Acl {

	/**
	 * Make sure Orchestra is started.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		Bundle::start('orchestra');

		if (false === Orchestra\Installer::installed())
		{
			throw new RuntimeException("Orchestra need to be install first.");
		}
	}

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		$admin   = Orchestra\Model\Role::admin();
		$member  = Orchestra\Model\Role::member();
		$acl     = Orchestra\Acl::make('diskus', Orchestra::memory());
		
		$guest_actions  = array('View Topic');
		$member_actions = array_merge($guest_actions, array('Create Topic'));
		$actions        = array_merge($member_actions, array('Manage Diskus'));
		
		$acl->add_actions($actions);
		$acl->add_roles(array($admin->name, $member->name));
		
		$acl->allow($admin->name, $actions);
		$acl->allow($member->name, $member_actions);
		$acl->allow('guest', $guest_actions);
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		// nothing to do here.
	}

}