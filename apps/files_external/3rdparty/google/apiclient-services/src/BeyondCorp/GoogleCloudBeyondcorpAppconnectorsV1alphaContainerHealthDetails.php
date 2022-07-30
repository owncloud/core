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

namespace Google\Service\BeyondCorp;

class GoogleCloudBeyondcorpAppconnectorsV1alphaContainerHealthDetails extends \Google\Model
{
  /**
   * @var string
   */
  public $currentConfigVersion;
  /**
   * @var string
   */
  public $errorMsg;
  /**
   * @var string
   */
  public $expectedConfigVersion;
  /**
   * @var string[]
   */
  public $extendedStatus;

  /**
   * @param string
   */
  public function setCurrentConfigVersion($currentConfigVersion)
  {
    $this->currentConfigVersion = $currentConfigVersion;
  }
  /**
   * @return string
   */
  public function getCurrentConfigVersion()
  {
    return $this->currentConfigVersion;
  }
  /**
   * @param string
   */
  public function setErrorMsg($errorMsg)
  {
    $this->errorMsg = $errorMsg;
  }
  /**
   * @return string
   */
  public function getErrorMsg()
  {
    return $this->errorMsg;
  }
  /**
   * @param string
   */
  public function setExpectedConfigVersion($expectedConfigVersion)
  {
    $this->expectedConfigVersion = $expectedConfigVersion;
  }
  /**
   * @return string
   */
  public function getExpectedConfigVersion()
  {
    return $this->expectedConfigVersion;
  }
  /**
   * @param string[]
   */
  public function setExtendedStatus($extendedStatus)
  {
    $this->extendedStatus = $extendedStatus;
  }
  /**
   * @return string[]
   */
  public function getExtendedStatus()
  {
    return $this->extendedStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudBeyondcorpAppconnectorsV1alphaContainerHealthDetails::class, 'Google_Service_BeyondCorp_GoogleCloudBeyondcorpAppconnectorsV1alphaContainerHealthDetails');
