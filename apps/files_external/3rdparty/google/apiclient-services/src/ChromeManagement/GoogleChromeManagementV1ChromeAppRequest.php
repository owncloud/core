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
  public $appDetails;
  public $appId;
  public $detailUri;
  public $displayName;
  public $iconUri;
  public $latestRequestTime;
  public $requestCount;

  public function setAppDetails($appDetails)
  {
    $this->appDetails = $appDetails;
  }
  public function getAppDetails()
  {
    return $this->appDetails;
  }
  public function setAppId($appId)
  {
    $this->appId = $appId;
  }
  public function getAppId()
  {
    return $this->appId;
  }
  public function setDetailUri($detailUri)
  {
    $this->detailUri = $detailUri;
  }
  public function getDetailUri()
  {
    return $this->detailUri;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setIconUri($iconUri)
  {
    $this->iconUri = $iconUri;
  }
  public function getIconUri()
  {
    return $this->iconUri;
  }
  public function setLatestRequestTime($latestRequestTime)
  {
    $this->latestRequestTime = $latestRequestTime;
  }
  public function getLatestRequestTime()
  {
    return $this->latestRequestTime;
  }
  public function setRequestCount($requestCount)
  {
    $this->requestCount = $requestCount;
  }
  public function getRequestCount()
  {
    return $this->requestCount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromeManagementV1ChromeAppRequest::class, 'Google_Service_ChromeManagement_GoogleChromeManagementV1ChromeAppRequest');
