<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Testing;

class TestSpecification extends \Google\Model
{
  protected $androidInstrumentationTestType = AndroidInstrumentationTest::class;
  protected $androidInstrumentationTestDataType = '';
  protected $androidRoboTestType = AndroidRoboTest::class;
  protected $androidRoboTestDataType = '';
  protected $androidTestLoopType = AndroidTestLoop::class;
  protected $androidTestLoopDataType = '';
  public $disablePerformanceMetrics;
  public $disableVideoRecording;
  protected $iosTestLoopType = IosTestLoop::class;
  protected $iosTestLoopDataType = '';
  protected $iosTestSetupType = IosTestSetup::class;
  protected $iosTestSetupDataType = '';
  protected $iosXcTestType = IosXcTest::class;
  protected $iosXcTestDataType = '';
  protected $testSetupType = TestSetup::class;
  protected $testSetupDataType = '';
  public $testTimeout;

  /**
   * @param AndroidInstrumentationTest
   */
  public function setAndroidInstrumentationTest(AndroidInstrumentationTest $androidInstrumentationTest)
  {
    $this->androidInstrumentationTest = $androidInstrumentationTest;
  }
  /**
   * @return AndroidInstrumentationTest
   */
  public function getAndroidInstrumentationTest()
  {
    return $this->androidInstrumentationTest;
  }
  /**
   * @param AndroidRoboTest
   */
  public function setAndroidRoboTest(AndroidRoboTest $androidRoboTest)
  {
    $this->androidRoboTest = $androidRoboTest;
  }
  /**
   * @return AndroidRoboTest
   */
  public function getAndroidRoboTest()
  {
    return $this->androidRoboTest;
  }
  /**
   * @param AndroidTestLoop
   */
  public function setAndroidTestLoop(AndroidTestLoop $androidTestLoop)
  {
    $this->androidTestLoop = $androidTestLoop;
  }
  /**
   * @return AndroidTestLoop
   */
  public function getAndroidTestLoop()
  {
    return $this->androidTestLoop;
  }
  public function setDisablePerformanceMetrics($disablePerformanceMetrics)
  {
    $this->disablePerformanceMetrics = $disablePerformanceMetrics;
  }
  public function getDisablePerformanceMetrics()
  {
    return $this->disablePerformanceMetrics;
  }
  public function setDisableVideoRecording($disableVideoRecording)
  {
    $this->disableVideoRecording = $disableVideoRecording;
  }
  public function getDisableVideoRecording()
  {
    return $this->disableVideoRecording;
  }
  /**
   * @param IosTestLoop
   */
  public function setIosTestLoop(IosTestLoop $iosTestLoop)
  {
    $this->iosTestLoop = $iosTestLoop;
  }
  /**
   * @return IosTestLoop
   */
  public function getIosTestLoop()
  {
    return $this->iosTestLoop;
  }
  /**
   * @param IosTestSetup
   */
  public function setIosTestSetup(IosTestSetup $iosTestSetup)
  {
    $this->iosTestSetup = $iosTestSetup;
  }
  /**
   * @return IosTestSetup
   */
  public function getIosTestSetup()
  {
    return $this->iosTestSetup;
  }
  /**
   * @param IosXcTest
   */
  public function setIosXcTest(IosXcTest $iosXcTest)
  {
    $this->iosXcTest = $iosXcTest;
  }
  /**
   * @return IosXcTest
   */
  public function getIosXcTest()
  {
    return $this->iosXcTest;
  }
  /**
   * @param TestSetup
   */
  public function setTestSetup(TestSetup $testSetup)
  {
    $this->testSetup = $testSetup;
  }
  /**
   * @return TestSetup
   */
  public function getTestSetup()
  {
    return $this->testSetup;
  }
  public function setTestTimeout($testTimeout)
  {
    $this->testTimeout = $testTimeout;
  }
  public function getTestTimeout()
  {
    return $this->testTimeout;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TestSpecification::class, 'Google_Service_Testing_TestSpecification');
