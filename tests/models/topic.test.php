<?php

Bundle::start('orchestra');
Bundle::start('diskus');

class ModelsTopicTest extends Diskus\Testable\TestCase {
	
	/**
	 * Test constant is properly defined.
	 *
	 * @test
	 */
	public function testConstantIsProperlyDefined()
	{
		$this->assertEquals(1, Diskus\Model\Topic::ANSWERED);
		$this->assertEquals(0, Diskus\Model\Topic::NOT_ANSWERED);

		$this->assertEquals('draft', Diskus\Model\Topic::STATUS_DRAFT);
		$this->assertEquals('private', Diskus\Model\Topic::STATUS_PRIVATE);
		$this->assertEquals('deleted', Diskus\Model\Topic::STATUS_DELETED);
		$this->assertEquals('publish', Diskus\Model\Topic::STATUS_PUBLISH);
	}
}