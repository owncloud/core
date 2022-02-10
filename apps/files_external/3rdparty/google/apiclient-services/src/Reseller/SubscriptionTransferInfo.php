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

namespace Google\Service\Reseller;

class SubscriptionTransferInfo extends \Google\Model
{
  /**
   * @var string
   */
  public $currentLegacySkuId;
  /**
   * @var int
   */
  public $minimumTransferableSeats;
  /**
   * @var string
   */
  public $transferabilityExpirationTime;

  /**
   * @param string
   */
  public function setCurrentLegacySkuId($currentLegacySkuId)
  {
    $this->currentLegacySkuId = $currentLegacySkuId;
  }
  /**
   * @return string
   */
  public function getCurrentLegacySkuId()
  {
    return $this->currentLegacySkuId;
  }
  /**
   * @param int
   */
  public function setMinimumTransferableSeats($minimumTransferableSeats)
  {
    $this->minimumTransferableSeats = $minimumTransferableSeats;
  }
  /**
   * @return int
   */
  public function getMinimumTransferableSeats()
  {
    return $this->minimumTransferableSeats;
  }
  /**
   * @param string
   */
  public function setTransferabilityExpirationTime($transferabilityExpirationTime)
  {
    $this->transferabilityExpirationTime = $transferabilityExpirationTime;
  }
  /**
   * @return string
   */
  public function getTransferabilityExpirationTime()
  {
    return $this->transferabilityExpirationTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SubscriptionTransferInfo::class, 'Google_Service_Reseller_SubscriptionTransferInfo');
