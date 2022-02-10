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

namespace Google\Service\ChromeManagement;

class GoogleChromeManagementV1DisplayInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $deviceId;
  /**
   * @var bool
   */
  public $isInternal;
  /**
   * @var int
   */
  public $refreshRate;
  /**
   * @var int
   */
  public $resolutionHeight;
  /**
   * @var int
   */
  public $resolutionWidth;

  /**
   * @param string
   */
  public function setDeviceId($deviceId)
  {
    $this->deviceId = $deviceId;
  }
  /**
   * @return string
   */
  public function getDeviceId()
  {
    return $this->deviceId;
  }
  /**
   * @param bool
   */
  public function setIsInternal($isInternal)
  {
    $this->isInternal = $isInternal;
  }
  /**
   * @return bool
   */
  public function getIsInternal()
  {
    return $this->isInternal;
  }
  /**
   * @param int
   */
  public function setRefreshRate($refreshRate)
  {
    $this->refreshRate = $refreshRate;
  }
  /**
   * @return int
   */
  public function getRefreshRate()
  {
    return $this->refreshRate;
  }
  /**
   * @param int
   */
  public function setResolutionHeight($resolutionHeight)
  {
    $this->resolutionHeight = $resolutionHeight;
  }
  /**
   * @return int
   */
  public function getResolutionHeight()
  {
    return $this->resolutionHeight;
  }
  /**
   * @param int
   */
  public function setResolutionWidth($resolutionWidth)
  {
    $this->resolutionWidth = $resolutionWidth;
  }
  /**
   * @return int
   */
  public function getResolutionWidth()
  {
    return $this->resolutionWidth;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1DisplayInfo::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1DisplayInfo');
