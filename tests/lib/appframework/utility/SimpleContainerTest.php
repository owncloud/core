<?php

/**
 * ownCloud - App Framework
 *
 * @author Bernhard Posselt
 * @copyright 2012 Bernhard Posselt <dev@bernhard-posselt.com>
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
namespace OC\AppFramework\Utility;

interface TestInterface {}

class ClassEmptyConstructor {}

class ClassSimpleConstructor {
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


class SimpleContainerTest extends \Test\TestCase {


    private $container;

    public function setUp() {
        $this->container = new SimpleContainer();
    }


    public function testRegister() {
        $this->container->registerParameter('test', 'abc');
        $this->assertEquals('abc', $this->container->query('test'));
    }


    /**
     * @expectedException \OC\AppFramework\Utility\QueryException
     */
    public function testNothingRegistered() {
        $this->container->query('something really hard');
    }


    /**
     * @expectedException \OC\AppFramework\Utility\QueryException
     */
    public function testNotAClass() {
        $this->container->query('\OC\AppFramework\Utility\TestInterface');
    }


    public function testNoConstructorClass() {
        $object = $this->container->query('OC\AppFramework\Utility\ClassEmptyConstructor');
        $this->assertTrue($object instanceof ClassEmptyConstructor);
    }


    public function testNoConstructorSimple() {
        echo class_exists('ClassSimpleConstructor');
        $this->container->registerParameter('test', 'abc');
        $object = $this->container->query(
            'OC\AppFramework\Utility\ClassSimpleConstructor'
        );
        $this->assertTrue($object instanceof ClassSimpleConstructor);
        $this->assertEquals('abc', $object->test);
    }


    public function testNoConstructorComplex() {
        echo class_exists('ClassSimpleConstructor');
        $this->container->registerParameter('test', 'abc');
        $object = $this->container->query(
            'OC\AppFramework\Utility\ClassComplexConstructor'
        );
        $this->assertTrue($object instanceof ClassComplexConstructor);
        $this->assertEquals('abc', $object->class->test);
        $this->assertEquals('abc', $object->test);
    }


    /**
     * @expectedException \OC\AppFramework\Utility\QueryException
     */
    public function testNoConstructorComplexNoTestParameterFound() {
        echo class_exists('ClassSimpleConstructor');
        $object = $this->container->query(
            'OC\AppFramework\Utility\ClassComplexConstructor'
        );
    }


}
