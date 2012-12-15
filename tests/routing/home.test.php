<?php

Bundle::start('orchestra');
Bundle::start('diskus');

class RoutingHomeTest extends Diskus\Testable\TestCase {

	/**
	 * Test Request GET (diskus)
	 *
	 * @test
	 */
	public function testGetLandingPage()
	{
		$response = $this->call('diskus::home@index', array());

		$this->assertInstanceOf('Laravel\Response', $response);
		$this->assertEquals(200, $response->foundation->getStatusCode());
		$this->assertEquals('diskus::home.index', $response->content->view);
	}
}