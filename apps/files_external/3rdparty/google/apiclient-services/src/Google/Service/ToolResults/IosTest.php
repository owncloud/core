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

class Google_Service_ToolResults_IosTest extends Google_Model
{
  protected $iosAppInfoType = 'Google_Service_ToolResults_IosAppInfo';
  protected $iosAppInfoDataType = '';
  protected $iosRoboTestType = 'Google_Service_ToolResults_IosRoboTest';
  protected $iosRoboTestDataType = '';
  protected $iosTestLoopType = 'Google_Service_ToolResults_IosTestLoop';
  protected $iosTestLoopDataType = '';
  protected $iosXcTestType = 'Google_Service_ToolResults_IosXcTest';
  protected $iosXcTestDataType = '';
  protected $testTimeoutType = 'Google_Service_ToolResults_Duration';
  protected $testTimeoutDataType = '';

  /**
   * @param Google_Service_ToolResults_IosAppInfo
   */
  public function setIosAppInfo(Google_Service_ToolResults_IosAppInfo $iosAppInfo)
  {
    $this->iosAppInfo = $iosAppInfo;
  }
  /**
   * @return Google_Service_ToolResults_IosAppInfo
   */
  public function getIosAppInfo()
  {
    return $this->iosAppInfo;
  }
  /**
   * @param Google_Service_ToolResults_IosRoboTest
   */
  public function setIosRoboTest(Google_Service_ToolResults_IosRoboTest $iosRoboTest)
  {
    $this->iosRoboTest = $iosRoboTest;
  }
  /**
   * @return Google_Service_ToolResults_IosRoboTest
   */
  public function getIosRoboTest()
  {
    return $this->iosRoboTest;
  }
  /**
   * @param Google_Service_ToolResults_IosTestLoop
   */
  public function setIosTestLoop(Google_Service_ToolResults_IosTestLoop $iosTestLoop)
  {
    $this->iosTestLoop = $iosTestLoop;
  }
  /**
   * @return Google_Service_ToolResults_IosTestLoop
   */
  public function getIosTestLoop()
  {
    return $this->iosTestLoop;
  }
  /**
   * @param Google_Service_ToolResults_IosXcTest
   */
  public function setIosXcTest(Google_Service_ToolResults_IosXcTest $iosXcTest)
  {
    $this->iosXcTest = $iosXcTest;
  }
  /**
   * @return Google_Service_ToolResults_IosXcTest
   */
  public function getIosXcTest()
  {
    return $this->iosXcTest;
  }
  /**
   * @param Google_Service_ToolResults_Duration
   */
  public function setTestTimeout(Google_Service_ToolResults_Duration $testTimeout)
  {
    $this->testTimeout = $testTimeout;
  }
  /**
   * @return Google_Service_ToolResults_Duration
   */
  public function getTestTimeout()
  {
    return $this->testTimeout;
  }
}
