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

namespace Google\Service\Cloudchannel;

class GoogleCloudChannelV1PricePhase extends \Google\Collection
{
  protected $collection_key = 'priceTiers';
  public $firstPeriod;
  public $lastPeriod;
  public $periodType;
  protected $priceType = GoogleCloudChannelV1Price::class;
  protected $priceDataType = '';
  protected $priceTiersType = GoogleCloudChannelV1PriceTier::class;
  protected $priceTiersDataType = 'array';

  public function setFirstPeriod($firstPeriod)
  {
    $this->firstPeriod = $firstPeriod;
  }
  public function getFirstPeriod()
  {
    return $this->firstPeriod;
  }
  public function setLastPeriod($lastPeriod)
  {
    $this->lastPeriod = $lastPeriod;
  }
  public function getLastPeriod()
  {
    return $this->lastPeriod;
  }
  public function setPeriodType($periodType)
  {
    $this->periodType = $periodType;
  }
  public function getPeriodType()
  {
    return $this->periodType;
  }
  /**
   * @param GoogleCloudChannelV1Price
   */
  public function setPrice(GoogleCloudChannelV1Price $price)
  {
    $this->price = $price;
  }
  /**
   * @return GoogleCloudChannelV1Price
   */
  public function getPrice()
  {
    return $this->price;
  }
  /**
   * @param GoogleCloudChannelV1PriceTier[]
   */
  public function setPriceTiers($priceTiers)
  {
    $this->priceTiers = $priceTiers;
  }
  /**
   * @return GoogleCloudChannelV1PriceTier[]
   */
  public function getPriceTiers()
  {
    return $this->priceTiers;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudChannelV1PricePhase::class, 'Google_Service_Cloudchannel_GoogleCloudChannelV1PricePhase');
