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

class Google_Service_RealTimeBidding_Bidder extends Google_Model
{
  public $bypassNonguaranteedDealsPretargeting;
  public $cookieMatchingNetworkId;
  public $cookieMatchingUrl;
  public $dealsBillingId;
  public $name;

  public function setBypassNonguaranteedDealsPretargeting($bypassNonguaranteedDealsPretargeting)
  {
    $this->bypassNonguaranteedDealsPretargeting = $bypassNonguaranteedDealsPretargeting;
  }
  public function getBypassNonguaranteedDealsPretargeting()
  {
    return $this->bypassNonguaranteedDealsPretargeting;
  }
  public function setCookieMatchingNetworkId($cookieMatchingNetworkId)
  {
    $this->cookieMatchingNetworkId = $cookieMatchingNetworkId;
  }
  public function getCookieMatchingNetworkId()
  {
    return $this->cookieMatchingNetworkId;
  }
  public function setCookieMatchingUrl($cookieMatchingUrl)
  {
    $this->cookieMatchingUrl = $cookieMatchingUrl;
  }
  public function getCookieMatchingUrl()
  {
    return $this->cookieMatchingUrl;
  }
  public function setDealsBillingId($dealsBillingId)
  {
    $this->dealsBillingId = $dealsBillingId;
  }
  public function getDealsBillingId()
  {
    return $this->dealsBillingId;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}
