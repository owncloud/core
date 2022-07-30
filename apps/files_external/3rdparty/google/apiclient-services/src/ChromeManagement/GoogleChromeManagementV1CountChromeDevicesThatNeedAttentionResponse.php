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

class GoogleChromeManagementV1CountChromeDevicesThatNeedAttentionResponse extends \Google\Model
{
  /**
   * @var string
   */
  public $noRecentPolicySyncCount;
  /**
   * @var string
   */
  public $noRecentUserActivityCount;
  /**
   * @var string
   */
  public $osVersionNotCompliantCount;
  /**
   * @var string
   */
  public $pendingUpdate;
  /**
   * @var string
   */
  public $unsupportedPolicyCount;

  /**
   * @param string
   */
  public function setNoRecentPolicySyncCount($noRecentPolicySyncCount)
  {
    $this->noRecentPolicySyncCount = $noRecentPolicySyncCount;
  }
  /**
   * @return string
   */
  public function getNoRecentPolicySyncCount()
  {
    return $this->noRecentPolicySyncCount;
  }
  /**
   * @param string
   */
  public function setNoRecentUserActivityCount($noRecentUserActivityCount)
  {
    $this->noRecentUserActivityCount = $noRecentUserActivityCount;
  }
  /**
   * @return string
   */
  public function getNoRecentUserActivityCount()
  {
    return $this->noRecentUserActivityCount;
  }
  /**
   * @param string
   */
  public function setOsVersionNotCompliantCount($osVersionNotCompliantCount)
  {
    $this->osVersionNotCompliantCount = $osVersionNotCompliantCount;
  }
  /**
   * @return string
   */
  public function getOsVersionNotCompliantCount()
  {
    return $this->osVersionNotCompliantCount;
  }
  /**
   * @param string
   */
  public function setPendingUpdate($pendingUpdate)
  {
    $this->pendingUpdate = $pendingUpdate;
  }
  /**
   * @return string
   */
  public function getPendingUpdate()
  {
    return $this->pendingUpdate;
  }
  /**
   * @param string
   */
  public function setUnsupportedPolicyCount($unsupportedPolicyCount)
  {
    $this->unsupportedPolicyCount = $unsupportedPolicyCount;
  }
  /**
   * @return string
   */
  public function getUnsupportedPolicyCount()
  {
    return $this->unsupportedPolicyCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1CountChromeDevicesThatNeedAttentionResponse::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1CountChromeDevicesThatNeedAttentionResponse');
