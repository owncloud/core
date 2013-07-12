<?php
/**
 * Copyright (c) 2012 Bernhard Posselt <nukeawhale@gmail.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

class Test_App extends PHPUnit_Framework_TestCase {

	
	public function testIsAppVersionCompatibleSingleOCNumber(){
		$oc = array(4);
		$app = '4.0';

		$this->assertTrue(OC_App::isAppVersionCompatible($oc, $app));
	}

	
	public function testIsAppVersionCompatibleMultipleOCNumber(){
		$oc = array(4, 3, 1);
		$app = '4.3';

		$this->assertTrue(OC_App::isAppVersionCompatible($oc, $app));
	}


	public function testIsAppVersionCompatibleSingleNumber(){
		$oc = array(4);
		$app = '4';

		$this->assertTrue(OC_App::isAppVersionCompatible($oc, $app));
	}


	public function testIsAppVersionCompatibleSingleAppNumber(){
		$oc = array(4, 3);
		$app = '4';

		$this->assertTrue(OC_App::isAppVersionCompatible($oc, $app));
	}


	public function testIsAppVersionCompatibleComplex(){
		$oc = array(5, 0, 0);
		$app = '4.5.1';

		$this->assertTrue(OC_App::isAppVersionCompatible($oc, $app));
	}

	
	public function testIsAppVersionCompatibleShouldFail(){
		$oc = array(4, 3, 1);
		$app = '4.3.2';

		$this->assertFalse(OC_App::isAppVersionCompatible($oc, $app));
	}

	public function testIsAppVersionCompatibleShouldFailTwoVersionNumbers(){
		$oc = array(4, 3, 1);
		$app = '4.4';

		$this->assertFalse(OC_App::isAppVersionCompatible($oc, $app));
	}


	public function testIsAppVersionCompatibleShouldWorkForPreAlpha(){
		$oc = array(5, 0, 3);
		$app = '4.93';

		$this->assertTrue(OC_App::isAppVersionCompatible($oc, $app));
	}


	public function testIsAppVersionCompatibleShouldFailOneVersionNumbers(){
		$oc = array(4, 3, 1);
		$app = '5';

		$this->assertFalse(OC_App::isAppVersionCompatible($oc, $app));
	}

	public function testDependencyCheck() {
		OC_Appconfig::setValue('someapp', 'enabled', 'yes');
		OC_Appconfig::setValue('someapp', 'installed_version', '1.3.1');
		OC_Appconfig::setValue('otherapp', 'enabled', 'yes');
		OC_Appconfig::setValue('otherapp', 'installed_version', '0.3.1');
		$dependencies = array( array('someapp', '1.3.1'), array('otherapp', '0.2') );
		$this->assertNull(OC_App::appDependencyCheck($dependencies));
	}

	public function testOutdatedDependencyCheck() {
		OC_Appconfig::setValue('someapp', 'enabled', 'yes');
		OC_Appconfig::setValue('someapp', 'installed_version', '1.3.1');
		OC_Appconfig::setValue('otherapp', 'enabled', 'yes');
		OC_Appconfig::setValue('otherapp', 'installed_version', '0.2');
		$dependencies = array( array('someapp', '1.3.1'), array('otherapp', '0.1.1') );
		try {
			OC_App::appDependencyCheck($dependencies);
		} catch (\OC\App\OutdatedDependencyException $e) {
			$this->assertEquals($e->getMessage(), 'otherapp');
		}
	}

	public function testDisabledDependencyCheck() {
		OC_Appconfig::setValue('someapp', 'enabled', 'no');
		OC_Appconfig::setValue('someapp', 'installed_version', '1.3.1');
		OC_Appconfig::setValue('otherapp', 'enabled', 'yes');
		OC_Appconfig::setValue('otherapp', 'installed_version', '0.2');
		$dependencies = array( array('someapp', '1.3.1'), array('otherapp', '0.3.1') );
		try {
			OC_App::appDependencyCheck($dependencies);
		} catch (\OC\App\MissingDependencyException $e) {
			$this->assertEquals($e->getMessage(), 'someapp');
		}
	}

	public function testNonExistantDependencyCheck() {
		OC_Appconfig::setValue('someapp', 'enabled', 'yes');
		OC_Appconfig::setValue('someapp', 'installed_version', '1.3.1');
		$dependencies = array( array("someapp", "1.3.1"), array("nonexistant", "90.0.1") );
		try {
			OC_App::appDependencyCheck($dependencies);
		} catch (\OC\App\MissingDependencyException $e) {
			$this->assertEquals($e->getMessage(), "nonexistant");
		}
	}

	public function testDependsOn() {
		OC_Appconfig::setValue('dependentapp', 'enabled', 'yes');
		OC_Appconfig::setValue('dependentapp', 'depends_on', json_encode(array(array('depencyapp', '0.5.1'))));
		OC_Appconfig::setValue('otherdependentapp', 'enabled', 'yes');
		OC_Appconfig::setValue('otherdependentapp', 'depends_on', json_encode(array(array('depencyapp', '0.4'), array('otherdependencyapp', '0.1'))));
		OC_Appconfig::setValue('dependencyapp', 'enabled', 'yes');
		OC_Appconfig::setValue('otherdependencyapp', 'enabled', 'yes');
		$this->assertNull(OC_App::appDependsOnCheck('otherdependentapp'));
	}

	public function testNegativeDependsOn() {
		OC_Appconfig::setValue('dependentapp', 'enabled', 'yes');
		OC_Appconfig::setValue('dependentapp', 'depends_on', json_encode(array(array('depencyapp', '0.5.1'))));
		OC_Appconfig::setValue('otherdependentapp', 'enabled', 'yes');
		OC_Appconfig::setValue('otherdependentapp', 'depends_on', json_encode(array(array('depencyapp', '0.4'), array('otherdependencyapp', '0.1'))));
		OC_Appconfig::setValue('dependencyapp', 'enabled', 'yes');
		OC_Appconfig::setValue('otherdependencyapp', 'enabled', 'yes');
		try {
			OC_App::appDependsOnCheck('dependencyapp');
		} catch (\OC\App\DependingAppsException $e) {
			$this->assertEquals($e->getDependent, array('dependentapp', 'otherdependentapp'));
		}
	}
}
