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

class Google_Service_Reseller_SubscriptionTransferInfo extends Google_Model
{
  public $currentLegacySkuId;
  public $minimumTransferableSeats;
  public $transferabilityExpirationTime;

  public function setCurrentLegacySkuId($currentLegacySkuId)
  {
    $this->currentLegacySkuId = $currentLegacySkuId;
  }
  public function getCurrentLegacySkuId()
  {
    return $this->currentLegacySkuId;
  }
  public function setMinimumTransferableSeats($minimumTransferableSeats)
  {
    $this->minimumTransferableSeats = $minimumTransferableSeats;
  }
  public function getMinimumTransferableSeats()
  {
    return $this->minimumTransferableSeats;
  }
  public function setTransferabilityExpirationTime($transferabilityExpirationTime)
  {
    $this->transferabilityExpirationTime = $transferabilityExpirationTime;
  }
  public function getTransferabilityExpirationTime()
  {
    return $this->transferabilityExpirationTime;
  }
}
