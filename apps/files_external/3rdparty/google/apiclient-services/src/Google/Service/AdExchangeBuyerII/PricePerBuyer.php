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

class Google_Service_AdExchangeBuyerII_PricePerBuyer extends Google_Collection
{
  protected $collection_key = 'advertiserIds';
  public $advertiserIds;
  protected $buyerType = 'Google_Service_AdExchangeBuyerII_Buyer';
  protected $buyerDataType = '';
  protected $priceType = 'Google_Service_AdExchangeBuyerII_Price';
  protected $priceDataType = '';

  public function setAdvertiserIds($advertiserIds)
  {
    $this->advertiserIds = $advertiserIds;
  }
  public function getAdvertiserIds()
  {
    return $this->advertiserIds;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_Buyer
   */
  public function setBuyer(Google_Service_AdExchangeBuyerII_Buyer $buyer)
  {
    $this->buyer = $buyer;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_Buyer
   */
  public function getBuyer()
  {
    return $this->buyer;
  }
  /**
   * @param Google_Service_AdExchangeBuyerII_Price
   */
  public function setPrice(Google_Service_AdExchangeBuyerII_Price $price)
  {
    $this->price = $price;
  }
  /**
   * @return Google_Service_AdExchangeBuyerII_Price
   */
  public function getPrice()
  {
    return $this->price;
  }
}
