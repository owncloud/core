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

namespace Google\Service\ToolResults;

class IosTest extends \Google\Model
{
  protected $iosAppInfoType = IosAppInfo::class;
  protected $iosAppInfoDataType = '';
  protected $iosRoboTestType = IosRoboTest::class;
  protected $iosRoboTestDataType = '';
  protected $iosTestLoopType = IosTestLoop::class;
  protected $iosTestLoopDataType = '';
  protected $iosXcTestType = IosXcTest::class;
  protected $iosXcTestDataType = '';
  protected $testTimeoutType = Duration::class;
  protected $testTimeoutDataType = '';

  /**
   * @param IosAppInfo
   */
  public function setIosAppInfo(IosAppInfo $iosAppInfo)
  {
    $this->iosAppInfo = $iosAppInfo;
  }
  /**
   * @return IosAppInfo
   */
  public function getIosAppInfo()
  {
    return $this->iosAppInfo;
  }
  /**
   * @param IosRoboTest
   */
  public function setIosRoboTest(IosRoboTest $iosRoboTest)
  {
    $this->iosRoboTest = $iosRoboTest;
  }
  /**
   * @return IosRoboTest
   */
  public function getIosRoboTest()
  {
    return $this->iosRoboTest;
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
   * @param Duration
   */
  public function setTestTimeout(Duration $testTimeout)
  {
    $this->testTimeout = $testTimeout;
  }
  /**
   * @return Duration
   */
  public function getTestTimeout()
  {
    return $this->testTimeout;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IosTest::class, 'Google_Service_ToolResults_IosTest');
