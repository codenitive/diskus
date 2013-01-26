<?php

Bundle::start('orchestra');
Bundle::start('diskus');

class PresentersTopicTest extends Diskus\Testable\TestCase {

	/**
	 * Test Diskus\Presenter\Topic::table()
	 *
	 * @test
	 */
	public function testTableGenerator()
	{
		$topics = Diskus\Model\Topic::with(array('user'))->paginate(5);
		$stub   = Diskus\Presenter\Topic::table($topics);

		$refl = new \ReflectionObject($stub);
		$grid = $refl->getProperty('grid');
		$grid->setAccessible(true);
		$grid = $grid->getValue($stub);

		$this->assertInstanceOf('Orchestra\Table', $stub);
		$this->assertInstanceOf('Hybrid\Table\Grid', $grid);
		$this->assertEquals(Orchestra\Table::of('diskus.topics'), $stub);
	}
}