<?php

/**
 * ownCloud - App Framework
 *
 * @author Bernhard Posselt
 * @copyright Copyright (c) 2014 Bernhard Posselt <dev@bernhard-posselt.com>
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE
 * License as published by the Free Software Foundation; either
 * version 3 of the License, or any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU AFFERO GENERAL PUBLIC LICENSE for more details.
 *
 * You should have received a copy of the GNU Affero General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
namespace Test\AppFramework\Utility;

use OC\AppFramework\Utility\SimpleContainer;

interface TestInterface {
}

class ClassEmptyConstructor implements IInterfaceConstructor {
}

class ClassSimpleConstructor implements IInterfaceConstructor {
	public $test;
	public function __construct($test) {
		$this->test = $test;
	}
}

class ClassComplexConstructor {
	public $class;
	public $test;
	public function __construct(ClassSimpleConstructor $class, $test) {
		$this->class = $class;
		$this->test = $test;
	}
}

interface IInterfaceConstructor {
}
class ClassInterfaceConstructor {
	public $class;
	public $test;
	public function __construct(IInterfaceConstructor $class, $test) {
		$this->class = $class;
		$this->test = $test;
	}
}

class SimpleContainerTest extends \Test\TestCase {
	private \OC\AppFramework\Utility\SimpleContainer $container;

	public function setUp(): void {
		$this->container = new SimpleContainer();
	}

	public function testRegister() {
		$this->container->registerParameter('test', 'abc');
		$this->assertEquals('abc', $this->container->query('test'));
	}

	/**
	 */
	public function testNothingRegistered() {
		$this->expectException(\OCP\AppFramework\QueryException::class);

		$this->container->query('something really hard');
	}

	/**
	 */
	public function testNotAClass() {
		$this->expectException(\OCP\AppFramework\QueryException::class);

		$this->container->query(\Test\AppFramework\Utility\TestInterface::class);
	}

	public function testNoConstructorClass() {
		$object = $this->container->query(\Test\AppFramework\Utility\ClassEmptyConstructor::class);
		$this->assertInstanceOf(ClassEmptyConstructor::class, $object);
	}

	public function testInstancesOnlyOnce() {
		$object = $this->container->query(\Test\AppFramework\Utility\ClassEmptyConstructor::class);
		$object2 = $this->container->query(\Test\AppFramework\Utility\ClassEmptyConstructor::class);
		$this->assertSame($object, $object2);
	}

	public function testConstructorSimple() {
		$this->container->registerParameter('test', 'abc');
		$object = $this->container->query(
			\Test\AppFramework\Utility\ClassSimpleConstructor::class
		);
		$this->assertInstanceOf(ClassSimpleConstructor::class, $object);
		$this->assertEquals('abc', $object->test);
	}

	public function testConstructorComplex() {
		$this->container->registerParameter('test', 'abc');
		$object = $this->container->query(
			\Test\AppFramework\Utility\ClassComplexConstructor::class
		);
		$this->assertInstanceOf(ClassComplexConstructor::class, $object);
		$this->assertEquals('abc', $object->class->test);
		$this->assertEquals('abc', $object->test);
	}

	public function testConstructorComplexInterface() {
		$this->container->registerParameter('test', 'abc');
		$this->container->registerService(
			\Test\AppFramework\Utility\IInterfaceConstructor::class,
			fn ($c) => $c->query(\Test\AppFramework\Utility\ClassSimpleConstructor::class)
		);
		$object = $this->container->query(
			\Test\AppFramework\Utility\ClassInterfaceConstructor::class
		);
		$this->assertInstanceOf(ClassInterfaceConstructor::class, $object);
		$this->assertEquals('abc', $object->class->test);
		$this->assertEquals('abc', $object->test);
	}

	public function testOverrideService() {
		$this->container->registerService(
			\Test\AppFramework\Utility\IInterfaceConstructor::class,
			fn ($c) => $c->query(\Test\AppFramework\Utility\ClassSimpleConstructor::class)
		);
		$this->container->registerService(
			\Test\AppFramework\Utility\IInterfaceConstructor::class,
			fn ($c) => $c->query(\Test\AppFramework\Utility\ClassEmptyConstructor::class)
		);
		$object = $this->container->query(
			\Test\AppFramework\Utility\IInterfaceConstructor::class
		);
		$this->assertInstanceOf(ClassEmptyConstructor::class, $object);
	}

	public function testRegisterAliasParameter() {
		$this->container->registerParameter('test', 'abc');
		$this->container->registerAlias('test1', 'test');
		$this->assertEquals('abc', $this->container->query('test1'));
	}

	public function testRegisterAliasService() {
		$this->container->registerService('test', fn () => new \StdClass, true);
		$this->container->registerAlias('test1', 'test');
		$this->assertSame(
			$this->container->query('test'),
			$this->container->query('test')
		);
		$this->assertSame(
			$this->container->query('test1'),
			$this->container->query('test1')
		);
		$this->assertSame(
			$this->container->query('test'),
			$this->container->query('test1')
		);
	}

	public function sanitizeNameProvider() {
		return [
			['ABC\\Foo', 'ABC\\Foo'],
			['\\ABC\\Foo', '\\ABC\\Foo'],
			['\\ABC\\Foo', 'ABC\\Foo'],
			['ABC\\Foo', '\\ABC\\Foo'],
		];
	}

	/**
	 * @dataProvider sanitizeNameProvider
	 */
	public function testSanitizeName($register, $query) {
		$this->container->registerService($register, fn () => 'abc');
		$this->assertEquals('abc', $this->container->query($query));
	}

	/**
	 */
	public function testConstructorComplexNoTestParameterFound() {
		$this->expectException(\OCP\AppFramework\QueryException::class);

		$object = $this->container->query(
			\Test\AppFramework\Utility\ClassComplexConstructor::class
		);
	}

	public function testRegisterFactory() {
		$this->container->registerService('test', fn () => new \StdClass(), false);
		$this->assertNotSame(
			$this->container->query('test'),
			$this->container->query('test')
		);
	}

	public function testRegisterAliasFactory() {
		$this->container->registerService('test', fn () => new \StdClass(), false);
		$this->container->registerAlias('test1', 'test');
		$this->assertNotSame(
			$this->container->query('test'),
			$this->container->query('test')
		);
		$this->assertNotSame(
			$this->container->query('test1'),
			$this->container->query('test1')
		);
		$this->assertNotSame(
			$this->container->query('test'),
			$this->container->query('test1')
		);
	}
}
