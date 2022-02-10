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

class GoogleChromeManagementV1ChromeAppRequest extends \Google\Model
{
  /**
   * @var string
   */
  public $appDetails;
  /**
   * @var string
   */
  public $appId;
  /**
   * @var string
   */
  public $detailUri;
  /**
   * @var string
   */
  public $displayName;
  /**
   * @var string
   */
  public $iconUri;
  /**
   * @var string
   */
  public $latestRequestTime;
  /**
   * @var string
   */
  public $requestCount;

  /**
   * @param string
   */
  public function setAppDetails($appDetails)
  {
    $this->appDetails = $appDetails;
  }
  /**
   * @return string
   */
  public function getAppDetails()
  {
    return $this->appDetails;
  }
  /**
   * @param string
   */
  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  /**
   * @return string
   */
  public function getAppId()
  {
    return $this->appId;
  }
  /**
   * @param string
   */
  public function setDetailUri($detailUri)
  {
    $this->detailUri = $detailUri;
  }
  /**
   * @return string
   */
  public function getDetailUri()
  {
    return $this->detailUri;
  }
  /**
   * @param string
   */
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  /**
   * @return string
   */
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param string
   */
  public function setIconUri($iconUri)
  {
    $this->iconUri = $iconUri;
  }
  /**
   * @return string
   */
  public function getIconUri()
  {
    return $this->iconUri;
  }
  /**
   * @param string
   */
  public function setLatestRequestTime($latestRequestTime)
  {
    $this->latestRequestTime = $latestRequestTime;
  }
  /**
   * @return string
   */
  public function getLatestRequestTime()
  {
    return $this->latestRequestTime;
  }
  /**
   * @param string
   */
  public function setRequestCount($requestCount)
  {
    $this->requestCount = $requestCount;
  }
  /**
   * @return string
   */
  public function getRequestCount()
  {
    return $this->requestCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1ChromeAppRequest::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1ChromeAppRequest');
