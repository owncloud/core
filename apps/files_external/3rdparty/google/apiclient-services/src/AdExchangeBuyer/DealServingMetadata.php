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

namespace Google\Service\AdExchangeBuyer;

class DealServingMetadata extends \Google\Model
{
  public $alcoholAdsAllowed;
  protected $dealPauseStatusType = DealServingMetadataDealPauseStatus::class;
  protected $dealPauseStatusDataType = '';

  public function setAlcoholAdsAllowed($alcoholAdsAllowed)
  {
    $this->alcoholAdsAllowed = $alcoholAdsAllowed;
  }
  public function getAlcoholAdsAllowed()
  {
    return $this->alcoholAdsAllowed;
  }
  /**
   * @param DealServingMetadataDealPauseStatus
   */
  public function setDealPauseStatus(DealServingMetadataDealPauseStatus $dealPauseStatus)
  {
    $this->dealPauseStatus = $dealPauseStatus;
  }
  /**
   * @return DealServingMetadataDealPauseStatus
   */
  public function getDealPauseStatus()
  {
    return $this->dealPauseStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DealServingMetadata::class, 'Google_Service_AdExchangeBuyer_DealServingMetadata');
