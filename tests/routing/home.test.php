<?php

class RoutingHomeTest extends PHPUnit_Framework_TestCase {

	/**
	 * Test Request GET (diskus)
	 *
	 * @test
	 */
	public function testGetLandingPage()
	{
		$response = $this->call('diskus::home@test', array());

		$this->assertInstanceOf('Laravel\Response', $response);
		$this->assertEquals(200, $response->foundation->getStatusCode());
		$this->assertEquals('diskus::home.index', $response->content->view);
	}
}