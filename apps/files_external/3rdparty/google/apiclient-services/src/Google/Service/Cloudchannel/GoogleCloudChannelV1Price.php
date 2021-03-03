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

class Google_Service_Cloudchannel_GoogleCloudChannelV1Price extends Google_Model
{
  protected $basePriceType = 'Google_Service_Cloudchannel_GoogleTypeMoney';
  protected $basePriceDataType = '';
  public $discount;
  protected $effectivePriceType = 'Google_Service_Cloudchannel_GoogleTypeMoney';
  protected $effectivePriceDataType = '';
  public $externalPriceUri;

  /**
   * @param Google_Service_Cloudchannel_GoogleTypeMoney
   */
  public function setBasePrice(Google_Service_Cloudchannel_GoogleTypeMoney $basePrice)
  {
    $this->basePrice = $basePrice;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleTypeMoney
   */
  public function getBasePrice()
  {
    return $this->basePrice;
  }
  public function setDiscount($discount)
  {
    $this->discount = $discount;
  }
  public function getDiscount()
  {
    return $this->discount;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleTypeMoney
   */
  public function setEffectivePrice(Google_Service_Cloudchannel_GoogleTypeMoney $effectivePrice)
  {
    $this->effectivePrice = $effectivePrice;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleTypeMoney
   */
  public function getEffectivePrice()
  {
    return $this->effectivePrice;
  }
  public function setExternalPriceUri($externalPriceUri)
  {
    $this->externalPriceUri = $externalPriceUri;
  }
  public function getExternalPriceUri()
  {
    return $this->externalPriceUri;
  }
}
