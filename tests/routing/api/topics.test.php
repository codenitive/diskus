<?php

Bundle::start('orchestra');
Bundle::start('diskus');

class RoutingApiTopicsTest extends Diskus\Testable\TestCase {

	/**
	 * User instance.
	 *
	 * @var Orchestra\Model\User
	 */
	private $user = null;

	/**
	 * Setup the test environment.
	 */
	public function setUp()
	{
		parent::setUp();

		$this->user = Orchestra\Model\User::find(1);
	}

	/**
	 * Teardown the test environment.
	 */
	public function tearDown()
	{
		unset($this->user);

		parent::tearDown();
	}

	/**
	 * Test Request GET (orchestra)/resources/diskus.topics is successful.
	 *
	 * @test
	 */
	public function testGetListOfTopicsSuccessful()
	{
		$this->be($this->user);

		$response = $this->call('orchestra::resources@diskus.topics');
		
		$this->assertInstanceOf('Laravel\Response', $response);
		$this->assertEquals(200, $response->foundation->getStatusCode());

		$content = $response->content->data['content'];

		$this->assertInstanceOf('Laravel\Response', $content);
		$this->assertEquals('diskus::api.topics.index', $content->content->view);
	}
}