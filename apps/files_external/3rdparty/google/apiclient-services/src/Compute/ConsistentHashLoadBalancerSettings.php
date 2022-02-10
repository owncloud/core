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

namespace Google\Service\Compute;

class ConsistentHashLoadBalancerSettings extends \Google\Model
{
  protected $httpCookieType = ConsistentHashLoadBalancerSettingsHttpCookie::class;
  protected $httpCookieDataType = '';
  /**
   * @var string
   */
  public $httpHeaderName;
  /**
   * @var string
   */
  public $minimumRingSize;

  /**
   * @param ConsistentHashLoadBalancerSettingsHttpCookie
   */
  public function setHttpCookie(ConsistentHashLoadBalancerSettingsHttpCookie $httpCookie)
  {
    $this->httpCookie = $httpCookie;
  }
  /**
   * @return ConsistentHashLoadBalancerSettingsHttpCookie
   */
  public function getHttpCookie()
  {
    return $this->httpCookie;
  }
  /**
   * @param string
   */
  public function setHttpHeaderName($httpHeaderName)
  {
    $this->httpHeaderName = $httpHeaderName;
  }
  /**
   * @return string
   */
  public function getHttpHeaderName()
  {
    return $this->httpHeaderName;
  }
  /**
   * @param string
   */
  public function setMinimumRingSize($minimumRingSize)
  {
    $this->minimumRingSize = $minimumRingSize;
  }
  /**
   * @return string
   */
  public function getMinimumRingSize()
  {
    return $this->minimumRingSize;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ConsistentHashLoadBalancerSettings::class, 'Google_Service_Compute_ConsistentHashLoadBalancerSettings');
