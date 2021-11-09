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

namespace Google\Service\AuthorizedBuyersMarketplace;

class DeliveryControl extends \Google\Collection
{
  protected $collection_key = 'frequencyCap';
  public $companionDeliveryType;
  public $creativeRotationType;
  public $deliveryRateType;
  protected $frequencyCapType = FrequencyCap::class;
  protected $frequencyCapDataType = 'array';
  public $roadblockingType;

  public function setCompanionDeliveryType($companionDeliveryType)
  {
    $this->companionDeliveryType = $companionDeliveryType;
  }
  public function getCompanionDeliveryType()
  {
    return $this->companionDeliveryType;
  }
  public function setCreativeRotationType($creativeRotationType)
  {
    $this->creativeRotationType = $creativeRotationType;
  }
  public function getCreativeRotationType()
  {
    return $this->creativeRotationType;
  }
  public function setDeliveryRateType($deliveryRateType)
  {
    $this->deliveryRateType = $deliveryRateType;
  }
  public function getDeliveryRateType()
  {
    return $this->deliveryRateType;
  }
  /**
   * @param FrequencyCap[]
   */
  public function setFrequencyCap($frequencyCap)
  {
    $this->frequencyCap = $frequencyCap;
  }
  /**
   * @return FrequencyCap[]
   */
  public function getFrequencyCap()
  {
    return $this->frequencyCap;
  }
  public function setRoadblockingType($roadblockingType)
  {
    $this->roadblockingType = $roadblockingType;
  }
  public function getRoadblockingType()
  {
    return $this->roadblockingType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeliveryControl::class, 'Google_Service_AuthorizedBuyersMarketplace_DeliveryControl');
