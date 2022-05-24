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

namespace Google\Service\RealTimeBidding;

class Bidder extends \Google\Model
{
  /**
   * @var bool
   */
  public $bypassNonguaranteedDealsPretargeting;
  /**
   * @var string
   */
  public $cookieMatchingNetworkId;
  /**
   * @var string
   */
  public $cookieMatchingUrl;
  /**
   * @var string
   */
  public $dealsBillingId;
  /**
   * @var string
   */
  public $name;

  /**
   * @param bool
   */
  public function setBypassNonguaranteedDealsPretargeting($bypassNonguaranteedDealsPretargeting)
  {
    $this->bypassNonguaranteedDealsPretargeting = $bypassNonguaranteedDealsPretargeting;
  }
  /**
   * @return bool
   */
  public function getBypassNonguaranteedDealsPretargeting()
  {
    return $this->bypassNonguaranteedDealsPretargeting;
  }
  /**
   * @param string
   */
  public function setCookieMatchingNetworkId($cookieMatchingNetworkId)
  {
    $this->cookieMatchingNetworkId = $cookieMatchingNetworkId;
  }
  /**
   * @return string
   */
  public function getCookieMatchingNetworkId()
  {
    return $this->cookieMatchingNetworkId;
  }
  /**
   * @param string
   */
  public function setCookieMatchingUrl($cookieMatchingUrl)
  {
    $this->cookieMatchingUrl = $cookieMatchingUrl;
  }
  /**
   * @return string
   */
  public function getCookieMatchingUrl()
  {
    return $this->cookieMatchingUrl;
  }
  /**
   * @param string
   */
  public function setDealsBillingId($dealsBillingId)
  {
    $this->dealsBillingId = $dealsBillingId;
  }
  /**
   * @return string
   */
  public function getDealsBillingId()
  {
    return $this->dealsBillingId;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Bidder::class, 'Google_Service_RealTimeBidding_Bidder');
