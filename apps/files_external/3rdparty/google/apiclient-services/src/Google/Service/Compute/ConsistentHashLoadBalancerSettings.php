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

class Google_Service_Compute_ConsistentHashLoadBalancerSettings extends Google_Model
{
  protected $httpCookieType = 'Google_Service_Compute_ConsistentHashLoadBalancerSettingsHttpCookie';
  protected $httpCookieDataType = '';
  public $httpHeaderName;
  public $minimumRingSize;

  /**
   * @param Google_Service_Compute_ConsistentHashLoadBalancerSettingsHttpCookie
   */
  public function setHttpCookie(Google_Service_Compute_ConsistentHashLoadBalancerSettingsHttpCookie $httpCookie)
  {
    $this->httpCookie = $httpCookie;
  }
  /**
   * @return Google_Service_Compute_ConsistentHashLoadBalancerSettingsHttpCookie
   */
  public function getHttpCookie()
  {
    return $this->httpCookie;
  }
  public function setHttpHeaderName($httpHeaderName)
  {
    $this->httpHeaderName = $httpHeaderName;
  }
  public function getHttpHeaderName()
  {
    return $this->httpHeaderName;
  }
  public function setMinimumRingSize($minimumRingSize)
  {
    $this->minimumRingSize = $minimumRingSize;
  }
  public function getMinimumRingSize()
  {
    return $this->minimumRingSize;
  }
}
