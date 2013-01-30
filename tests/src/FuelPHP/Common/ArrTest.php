<?php

namespace FuelPHP\Common;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-01-29 at 15:39:10.
 */
class ArrTest extends \PHPUnit_Framework_TestCase
{

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
		
	}

	/**
	 * @covers FuelPHP\Common\Arr::set
	 * @group Common
	 */
	public function testSet()
	{
		$array = array();
		$key = 'key';
		$value = 'test';
		
		Arr::set($array, $key, $value);
		$this->assertArrayHasKey($key, $array);
	}
	
	/**
	 * @covers FuelPHP\Common\Arr::set
	 * @group Common
	 */
	public function testSetWithNull()
	{
		$array = array();
		$key = null;
		$value = 'test';
		
		Arr::set($array, $key, $value);
		$this->assertEquals(1, count($array));
	}
	
	/**
	 * @covers FuelPHP\Common\Arr::set
	 * @group Common
	 */
	public function testSetWithDotkey()
	{
		$array = array();
		$key = 'first.second.third';
		$value = 'test';
		
		Arr::set($array, $key, $value);
		$this->assertArrayHasKey('third', $array['first']['second']);
	}

	/**
	 * @covers FuelPHP\Common\Arr::get
	 * @group Common
	 */
	public function testGet()
	{
		$array = array('one', 'two' => array('child' => 'value'), 'last' => 'three');
		
		$this->assertEquals('one', Arr::get($array, 0));
		$this->assertEquals('three',  Arr::get($array, 'last'));
		$this->assertEquals('value',  Arr::get($array, 'two.child'));
	}

	/**
	 * @covers FuelPHP\Common\Arr::has
	 * @group Common
	 */
	public function testHas()
	{
		$array = array('one' => 1, 'two' => array('three' => 'foo'));
		
		$this->assertTrue(Arr::has($array, 'one'));
		$this->assertTrue(Arr::has($array, 'two.three'));
		$this->assertFalse(Arr::has($array, 'four'));
	}

	/**
	 * @covers FuelPHP\Common\Arr::delete
	 * @group Common
	 */
	public function testDelete()
	{
		$array = array('one' => 1, 'two' => 2);
		Arr::delete($array, 'one');
		
		$this->assertEquals(1, count($array));
	}

	/**
	 * @covers FuelPHP\Common\Arr::merge
	 * @group Common
	 */
	public function testMerge()
	{
		$array1 = array('one' => 1);
		$array2 = array('two' => 2);
		
		$expected = array('one' => 1, 'two' => 2);
		
		$this->assertEquals($expected, Arr::merge($array1, $array2));
	}

	/**
	 * @covers FuelPHP\Common\Arr::isAssoc
	 * @group Common
	 */
	public function testIsAssoc()
	{
		$assoc = array('one' => 1);
		$nonAssoc = array(1);
		
		$this->assertTrue(Arr::isAssoc($assoc));
		$this->assertFalse(Arr::isAssoc($nonAssoc));
	}

}
