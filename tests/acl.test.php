<?php 

Bundle::start('orchestra');
Bundle::start('diskus');

class AclTest extends Diskus\Testable\TestCase {

	/**
	 * Test ACL is properly configured.
	 *
	 * @test
	 */
	public function testAclIsProperlyConfigured()
	{
		$acl    = Orchestra\Acl::make('diskus');
		$member = Orchestra\Model\Role::member();
		$admin  = Orchestra\Model\Role::admin(); 

		$this->assertTrue($acl->has_action('manage diskus'));
		$this->assertTrue($acl->has_action('create topic'));
		$this->assertTrue($acl->has_action('view topic'));

		$this->assertTrue($acl->check($member->name, 'view topic'));
		$this->assertTrue($acl->check($member->name, 'create topic'));
		$this->assertFalse($acl->check($member->name, 'manage diskus'));

		$this->assertTrue($acl->check($admin->name, 'view topic'));
		$this->assertTrue($acl->check($admin->name, 'create topic'));
		$this->assertTrue($acl->check($admin->name, 'manage diskus'));
	}
	
}